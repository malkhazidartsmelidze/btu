<?php

use Illuminate\Support\Facades\Route;


Route::get('/product/create', '\App\Http\Controllers\ProductController@createproduct');
Route::get('/product/all', '\App\Http\Controllers\ProductController@viewProducts');
