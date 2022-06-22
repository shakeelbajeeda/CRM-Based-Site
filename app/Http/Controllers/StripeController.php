<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\StripePayment;
use Illuminate\Http\Request;
use Stripe;
use Session;
use Stripe_Error;
class StripeController extends Controller
{
    private function orderTotal(){
        if(session('cart')) {
            $discountArray = array();
            foreach (session('cart') as $id => $cart) {
                if ($cart['discount_type'] == 'Flat') {
                    array_push($discountArray, $cart['discount'] * $cart['qty']);
                } else {
                    $discountArray[] = ($cart['discount'] / 100 * $cart['price']) * $cart['qty'];
                }
            }
            $subTotal = 0;
            foreach ((array)session('cart') as $id => $cart) {
                $subTotal += $cart['price'] * $cart['qty'];
            }
            $finalDiscount = array_sum($discountArray);
            $total = $subTotal - $finalDiscount;
            return ['total' => $total, 'subtotal' => $subTotal, 'discount' => $finalDiscount];
        }
    }
    public function postStripe(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = auth()->user();

        try {
            $customer = \Stripe\Customer::create(array(
                'name' => $user->name,
                'description' => 'Order Paid',
                'email' => $user->email,
                'source' => $request->input('stripeToken'),
//            'address' => $user->address,

            ));
            $calculations = $this->orderTotal();
            $res =  \Stripe\Charge::create(array(
                "amount" => $calculations['total'] * 100,
                "currency" => "usd",
                "customer" => $customer["id"],
                "description" => "Test payment."
            ));
            if($res->status == 'succeeded' and $res->paid) {
                $payment = $this->saveStripePayment($res);
                $order =  $this->saveOrder($payment, $calculations);
                $this->saveOrderDetail($order);
                session()->put('cart', null);

            }
            return redirect()->route('home_page')->with('success-message', 'Order has been placed successfully!');
        }
        catch(\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
//            echo 'Status is:' . $e->getHttpStatus() . '\n';
//            echo 'Type is:' . $e->getError()->type . '\n';
//            echo 'Code is:' . $e->getError()->code . '\n';
//            // param is '' in this case
//            echo 'Param is:' . $e->getError()->param . '\n';
//            echo 'Message is:' . $e->getError()->message . '\n';
            Session::flash('fail-message', $e->getError()->message);
            return back();
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            Session::flash('fail-message', $e->getError()->message);
            return back();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            Session::flash('fail-message', $e->getError()->message);
            return back();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            Session::flash('fail-message', $e->getError()->message);
            return back();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            Session::flash('fail-message', $e->getMessage());
            return back();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            Session::flash('fail-message', $e->getError()->message);
            return back();
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            Session::flash('fail-message', $e->getError()->message);
            return back();
        }
    }
    private function  saveStripePayment($res){
        $res = $res->toArray();
        $data['brand'] = $res['payment_method_details']['card']['brand'];
        $data['last4'] = $res['payment_method_details']['card']['last4'];
        $data['transaction_id'] = $res['id'];
        $data['amount'] = $res['amount']/100;
        $data['receipt_url'] = $res['receipt_url'];
        return StripePayment::create($data);
    }
    private function saveOrder($payment, $calculations){



        $data['subtotal'] = $calculations['subtotal'];
        $data['discount'] = $calculations['discount'];
        $data['total'] = $calculations['total'];
        $data['payment_method'] = 'Stripe';
        $data['payment_method_id'] = $payment->id;
        return Order::create($data);
    }
    private function saveOrderDetail($order){
        $data['user_id'] = auth()->user()->id;
        $data['order_id'] = $order->id;
        foreach ((array) session('cart') as $id => $cart){
            $data['product_id'] = $cart['id'];
            $data['qty'] = $cart['qty'];
            if($cart['discount_type']=='Percent'){
                $discount = $cart['discount'] /   100 * $cart['price'] * $cart['qty'];
            }
            else{
                $discount = $cart['discount'] * $cart['qty'];
            }
            $data['discount'] = $discount;
            $data['total'] = $cart['price'] - $discount;
            OrderProduct::create($data);
        }

    }
}
