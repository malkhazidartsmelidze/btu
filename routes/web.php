<?php

use Illuminate\Support\Facades\Route;

Route::get('/product/all', '\App\Http\Controllers\ProductController@getAllProducts');
Route::get('/product/create', '\App\Http\Controllers\ProductController@createNewProduct');
Route::get('/product/edit', '\App\Http\Controllers\ProductController@editProduct');
Route::get('/product/update', '\App\Http\Controllers\ProductController@updateProduct');
Route::get('/product/delete', '\App\Http\Controllers\ProductController@deleteProduct');
