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

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/products/edit/{id}',[
    'uses' => 'ProductsController@edit',
    'as' => 'products.edit'
]);

Route::post('/products/store',[
    'uses' => 'ProductsController@store',
    'as' => 'products.store'
]);

Route::get('/products',[
    'uses' => 'ProductsController@index',
    'as' => 'products.index'
]);

Route::post('/products/update/{id}',[
    'uses' => 'PostsController@update',
    'as' => 'products.update'
]);

Route::get('/products/delete/{id}',[
    'uses' => 'ProductsController@destroy',
    'as' => 'products.delete'
]);

Route::get('/products/create',[
    'uses' => 'ProductsController@create',
    'as' => 'products.create'
]);

Route::get('/product/{id}',[
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

Route::post('/card/add',[
    'uses' => 'ShoppingController@add_to_card',
    'as' => 'cart.add'
]);

Route::get('/cart',[
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

Route::get('/cart/delete/{id}',[
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

Route::get('/cart/incr/{id}/{qty}',[
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

Route::get('/cart/decr/{id}/{qty}',[
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

Route::get('/cart/rapid/add/{id}',[
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/checkout',[
    'uses' => 'CheckoutController@index',
    'as' => 'cart.checkout'
]);

Route::post('/cart/checkout',[
    'uses' => 'CheckoutController@pay',
    'as' => 'cart.checkout'
]);

//Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index');