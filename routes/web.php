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
    Route::get('/product/manage/show', 'ProductController@show');
    Route::get('/product/manage/edit', 'ProductController@edit');
    Route::post('/product/manage/update/{id}', 'ProductController@update');
    Route::get('/product/manage/create', 'ProductController@create');
    Route::post('/product/manage/store', 'ProductController@store');
    Route::get('/product/manage/delete', 'ProductController@destroy');
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
Route::get('/order/show', 'OrderController@show');
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/order/edit', 'OrderController@edit');
    Route::post('/order/update/{id}', 'OrderController@update');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/customer', 'CustomerController@index');
    Route::get('/customer/edit', 'CustomerController@edit');
    Route::post('/customer/update/{id}', 'CustomerController@update');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/supplier', 'SupplierController@index');
    Route::get('/supplier/edit', 'SupplierController@edit');
    Route::post('/supplier/update/{id}', 'SupplierController@update');
    Route::get('/supplier/create', 'SupplierController@create');
    Route::post('/supplier/store', 'SupplierController@store');
    Route::get('/supplier/delete', 'SupplierController@destroy');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/category', 'CategoryController@index');
    Route::get('/category/edit', 'CategoryController@edit');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/category/create', 'CategoryController@create');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/delete', 'CategoryController@destroy');
});
