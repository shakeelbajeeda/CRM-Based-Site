<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin_dashboard() {
        $count['users'] = User::get()->count();
        $count['products'] = Product::get()->count();
        $count['categories'] = Category::get()->count();
        return view('adminDashboard.index')->with($count);
    }
}
