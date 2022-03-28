<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\ProductController;

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

Route::get('/dn', function () {
    return view('dn');
});
Route::get('/shop', function () {
    return view('shop');
});
Route::get('/shop-detail', function () {
    return view('shop-detail');
});
Route::get('/master', function () {
    return view('master');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/wishlist', function () {
    return view('wishlist');
});
Route::get('/index', function () {
    return view('my-account');
});
Route::post('/formdelete', function () {
    return view('formdelete ');
});
Route::get('/demo/name={name}&pass={pass}', function ($name) {
    return view('demo');
})->middleware('checklogin');
Route::get('/',[MyController::class,'index']);
Route::post('signup', [MyController::class,'signup']);
Route::resource('product',ProductController::class);