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

Route::get('/', function () {
    return view('Index');
});
Route::get('/where', function () {
    return view('where');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catalog', [App\Http\Controllers\ProductController::class, 'index'])->name('catalog');
Route::group(['middleware'=> 'admin'], function ()
{
Route::get('/update/post/{id}','NewsController@updatePost')->name('updatePost');
Route::get('/admin/add','NewsController@add')->name('add');
Route::post('/update/{id}','NewsController@update')->name('update');
Route::post('/admin/create','NewsController@create')->name('create');
Route::get('/admin/del/{id}','NewsController@del')->name('del');
Route::post('/admin/update/price/{id}','PriceController@update')->name('priceupdate');
Route::get('/admin/update-price/{id}','PriceController@updateprice')->name('priceup');
/*Route::get('/admin/addprice','PriceController@indexadd')->name('priceaddin');
Route::post('/admin/priceadd','PriceController@add')->name('priceadd');*/
});