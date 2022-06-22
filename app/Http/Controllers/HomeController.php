<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['products'] = Product::get();
        return view('website.index')->with($data);
    }
    public function about()
    {
        return view('website.about');
    }
    public function services()
    {
        return view('website.services');
    }
    public function login()
    {
        return view('website.login');
    }
    public function sign_up()
    {
        return view('website.register');
    }
    public function userdashboard()
    {
        return view('userDashboard.index');
    }

    public function addToCart($id)
    {
        // dd(($id));
        $product = Product::findOrFail($id);
        // dd($product);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                "title" => $product->title,
                "qty" => 1,
                "discount" => $product->discount,
                "discount_type" => $product->discount_type,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Product added to cart successfully!');
    }
    public function cartDestroy(Request $request)
    {

        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('message', 'Product removed from cart successfully');
        }
    }
}
