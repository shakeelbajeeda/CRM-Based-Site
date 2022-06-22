<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('website.checkout2')->with($this->orderTotal());
    }
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

}
