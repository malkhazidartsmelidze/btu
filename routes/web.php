<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', '\App\Http\Controllers\ProductController@index');
Route::get('/products/read', '\App\Http\Controllers\ProductController@read');
Route::get('/products/update', '\App\Http\Controllers\ProductController@update');
Route::get('/products/delete', '\App\Http\Controllers\ProductController@delete');
Route::get('/products/create', '\App\Http\Controllers\ProductController@create');
Route::post('/products/store', '\App\Http\Controllers\ProductController@store');
