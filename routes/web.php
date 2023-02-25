<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\ProductController::class, 'main'])->name('main');
Route::get('/where', function () {
    return view('where');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'index'])->name('catalog');
Route::get('/product/article={id}', [App\Http\Controllers\ProductController::class, 'detail'])->name('product');

Route::get('/catalog={code}', [App\Http\Controllers\ProductController::class, 'category'])->name('category');
Route::group(['middleware'=> 'admin'], function ()
{
    Route::get('/admin/addproduct', function () {
        return view('admin.create-product');
    });
    Route::post('/admin/createproduct', [App\Http\Controllers\ProductController::class, 'create'])->name('createproduct');
});