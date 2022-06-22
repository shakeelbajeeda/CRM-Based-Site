<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index(){
        return view('website.view_cart');
    }
    public function add_to_cart(Request $request)
    {
        if($request->operation == 'add') {
            $message = "Product added to Cart";
            $this->add_item_to_cart($request);
        } else {
            $this->remove_cart($request);
            $message = "Product remove from Cart";
        }
        $count =  count((array) session('cart'));
        $cart_section = view('website.partials.cart')->render();
        return response()->json(['message'=> $message, 'cart_section' => $cart_section , 'count' => $count]);
    }

    private function remove_cart($request) {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }
    private function add_item_to_cart($request) {
        $id = $request->id;
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($id);
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $id,
                "title" => $product->title,
                "qty" => 1,
                "discount" => $product->discount,
                "discount_type" => $product->discount_type,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
    }
}
