<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllers;
use App\Http\Controllers\InsertController;
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


// Route::get('/{id}', function ($id) {
//     return view($id);
// });

Route::get('/admin/product', function () {
    return view('/admin/product');
});

Route::get('/admin/add-product', function () {
    return view('/admin/add-product');
});

Route::get('/admin', function () {
    return view('admin');
});


Route::group(['prefix' => ''], function () {
    Route::get('/', [Controllers::class,'index']);
    Route::get('/shop', [Controllers::class,'shop']);
    Route::get('/add-to-cart/{id}', [Controllers::class,'addCart'])->name('addToCart');
    Route::get('/cart', [Controllers::class,'showCart'])->name('showCart');
    Route::get('/detail/{id}', [Controllers::class,'product'])->name('detail');
    Route::get('/dashboard', [Controllers::class,'show_dashboard']);
    Route::get('/admin/product', [ProductController::class,'index'])->name('product');
});

Route::match(['get','post'],'/admin/add-product',[ProductController::class ,'addProduct']);
Route::match(['get','post'],'/admin/edit-product/{id}',[ProductController::class ,'editProduct']);
Route::match(['get','post'],'/admin/delete-product/{id}',[ProductController::class ,'deleteProduct']);

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('/admin/dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/product', function () {
//     return view('/admin/product');
// })->middleware(['auth'])->name('product');


require __DIR__.'/auth.php';
