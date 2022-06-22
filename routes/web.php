<?php

use App\Http\Controllers\AdminDashboard\CategoryController;
use App\Http\Controllers\AdminDashboard\HomeController as AdminDashboardHomeController;
use App\Http\Controllers\AdminDashboard\ProductController;
use App\Http\Controllers\AdminDashboard\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard\HomeController as UserDashboardHomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaypalController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::post('/add_to_cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/',  [HomeController::class, 'index'])->name('home_page');
Route::get('add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('add.to.cart');
Route::get('remove-cart/{id}', [HomeController::class, 'cartDestroy'])->name('cart.destroy');
Route::get('/view-cart', [CartController::class, 'index'])->name('view_cart');

Route::get('payment', [PaypalController::class, 'index'])->name('payment');
Route::post('charge', [PaypalController::class, 'charge'])->name('charge');
Route::get('success', [PaypalController::class, 'success'])->name('success');
Route::get('error', [PaypalController::class, 'error'])->name('error');

Route::middleware('auth')->group(function () {
    Route::get('/user-dashboard',  [UserDashboardHomeController::class, 'index'])->name('user_dashboard');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('stripe', [StripeController::class, 'postStripe'])->name('stripe_post');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard', [AdminDashboardHomeController::class, 'admin_dashboard'])->name('dashboard');
    Route::resources([
        '/product'=> ProductController::class,
        '/category'=> CategoryController::class,
        '/user'=> UserController::class

    ]);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('logout', function () {
    auth()->logout();
    return redirect('/login');
});

Auth::routes();
