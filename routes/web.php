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

Route::get('/', 'HomeController@index');
Route::view('/about', 'about');
Route::view('/contact', 'contact');


Route::get('/product', 'ProductController@list');
Route::get('/product/detail/{id}', 'ProductController@listDetail');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/product/manage', 'ProductController@index');
    Route::get('/product/manage/edit', 'ProductController@edit');
    Route::post('/product/manage/update/{id}', 'ProductController@update');
    Route::get('/product/manage/create', 'ProductController@create');
    Route::post('/product/manage/store', 'ProductController@store');
});


Route::post('/cart/add', 'ShoppingCartController@add');
Route::get('/cart/show', 'ShoppingCartController@show');
Route::get('/cart/add', 'ShoppingCartController@add');
Route::get('/cart/remove', 'ShoppingCartController@remove');
Route::get('/cart/clean', 'ShoppingCartController@clean');
Route::get('/cart/count', 'ShoppingCartController@count');

Auth::routes();
Route::get('/profile', 'ProfileController@index');
Route::post('/profile/store', 'ProfileController@store');

Route::get('/order', 'OrderController@index');
Route::get('/order/create', 'OrderController@create');
Route::post('/order/store', 'OrderController@store');
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/order/edit', 'OrderController@edit');
    Route::post('/order/update/{id}', 'OrderController@update');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/customer', 'CustomerController@index');
    Route::get('/customer/edit', 'CustomerController@edit');
    Route::post('/customer/update/{id}', 'CustomerController@update');
});
