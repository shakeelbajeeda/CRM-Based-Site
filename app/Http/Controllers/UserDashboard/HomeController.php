<?php

namespace App\Http\Controllers\userDashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    public function index()
    {
        return view('userDashboard.index');
    }
    public function add_product()
    {
        return view('userDashboard.add_product');
    }
    public function view_all()
    {
        $data['products'] = Product::get();
        return view('userDashboard.view_all_products')->with($data);
    }
    public function save(Request $request)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string'

        ]);

        Product::create($request->all());
        session()->flash('message', 'Product has added successfully');
        return redirect(route('view_all_products'));
    }
    public function edit($id)
    {
        $data['product'] = Product::findOrFail($id);
        return view('userDashboard.add_product')->with($data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string',
            'title' => 'required|string'

        ]);

        Product::where('id', $id)->update($request->only('icon', 'title'));
        return redirect(route('view_all_products'))->with('message', 'Product updated successfully');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->route('view_all_products', compact('product'))->with('message', 'Product removed successfully');
    }
}
