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

Route::get('/{id}', function ($id) {
    return view($id);
});

/*
Route::post('/formdelete', function () {
    return view('formdelete ');
});
Route::get('/demo/name={name}&pass={pass}', function ($name) {
    return view('demo');
})->middleware('checklogin');
Route::get('/',[MyController::class,'index']);
Route::post('signup', [MyController::class,'signup']);
Route::resource('product',ProductController::class);
*/