<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', '\App\Http\Controllers\PageController@getHomePage');
Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');
