<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', '\App\Http\Controllers\PageController@getHomePage');
Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');


Route::get('/products/create', '\App\Http\Controllers\ProductController@createProduct');
Route::get('/products/all', '\App\Http\Controllers\ProductController@getAllProducts');
