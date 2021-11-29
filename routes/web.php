<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\PaymentController;
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
Route::view('/','customerlayout.login')->name('login');
Route::post('customerlogin',[CustomerController::class,'login']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});
Route::get('products',[ProductController::class,'customerproduct']);
Route::get("productDetails/{id}",[ProductController::class,'productDetails']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('removecart/{id}',[ProductController::class,'RemoveCartItem']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[ProductController::class,'myOrders']);
Route::get('customerprofile',[CustomerController::class,'customerProfile']);
Route::resource('customerProfile',CustomerController::class);






//// admin
Route::prefix('admin')->group(function () {
    Route::post('/custom-signin', [AuthController::class, 'createSignin'])->name('login.admin');
    Route::get('/dashboard', [AuthController::class, 'dashboardView'])->name('dashboard');
    Route::get('/register', [AuthController::class, 'signup'])->name('register');
    Route::post('/create-user', [AuthController::class, 'adminSignup'])->name('admin.registration');
    Route::get('Profile',[AuthController::class,'Profile']);  
    Route::resource('profile',AuthController::class);
    Route::resource('product',ProductController::class);
    Route::get('displayuser',[AuthController::class,'joins']);
    Route::get('adminOrder',[AuthController::class,'joins']);
    
});
Route::view('adminlogin','login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/stripe', [StripeController::class,'call'])->name("stripe.post");
Route::view('stripeform','stripe');


Route::view('payment', 'payment');
Route::post('charge', [PaymentController::class,'charge']);
Route::get('confirm', [PaymentController::class,'confirm']);