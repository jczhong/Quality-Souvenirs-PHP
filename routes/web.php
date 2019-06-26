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


Route::get('/product', 'ProductController@index');
Route::get('/product/detail', 'ProductController@detail');
Route::post('/ShoppingCart/AddPOST', 'ShoppingCartController@AddPOST');
Route::get('/ShoppingCart/show', 'ShoppingCartController@show');
Route::get('/ShoppingCart/AddGet', 'ShoppingCartController@AddGet');
Route::get('/ShoppingCart/Remove', 'ShoppingCartController@Remove');
Route::get('ShoppingCart/ClearCart', 'ShoppingCartController@ClearCart');
Route::get('ShoppingCart/GetCount', 'ShoppingCartController@GetCount');

Auth::routes();
Route::get('/profile', 'ProfileController@index')->name('profile');
