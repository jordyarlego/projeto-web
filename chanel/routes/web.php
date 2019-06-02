<?php

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

Route::get('/', 'controller@index');

Route::prefix('/product')->group(function () {

    Route::get('/create', 'productController@create');

    Route::get('/{url}', 'productController@show');

    Route::post('/store', 'productController@store');

});

Route::post('/addToCart', 'SessionController@addToCart')->name('addToCart');
Route::post('/rmToCast', 'SessionController@removeToCart')->name('rmToCart');
Route::post('/cleanAllCart', 'SessionController@cleanAllCart')->name('cleanAllCart');
Route::get('/cleanAllCart', 'SessionController@cleanAllCart')->name('cleanAllCart');

route::post('/checkout/confirm', 'productController@storeCheckout')->name('storeCheckout');
Route::get('/cart', 'SessionController@cart');
Route::get('/deletedBuy/{id}', 'productController@deletedBuy');

Route::get('/checkout', 'SessionController@checkout');

route::get('/search', 'productController@searchProduct')->name('search');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
