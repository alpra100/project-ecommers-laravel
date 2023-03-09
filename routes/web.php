<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'LandingPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ShopController@index');

Route::get('/cart', 'CartController@index');

Route::get('/shop/detail/{id}', 'ShopController@show');

Route::get('/shop/category/{id}', 'ShopController@category');

Route::post('/cart/store', 'CartController@store');

Route::patch('/cart/{id}', 'CartController@update');

Route::post('/checkout', 'CheckoutController@store');