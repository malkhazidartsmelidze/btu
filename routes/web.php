<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/home', '\App\Http\Controllers\PageController@getHomePage');
Route::get('/contact', '\App\Http\Controllers\PageController@getContactPage');
Route::get('/about', '\App\Http\Controllers\PageController@getAboutPage');
// Route::get('/home', [PageController::class, 'getHomePage']);
