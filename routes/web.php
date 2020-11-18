<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::get('/product', [ProductController::class, 'index'])->name('products.all');

Route::get('/product/editsomeproduct', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/product/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/product/delete', [ProductController::class, 'delete'])->name('products.delete');
Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/custom/login', [AuthController::class, 'customLogin'])->name('custom.login');
Route::post('/custom/register', [AuthController::class, 'customRegister'])->name('custom.register');
Route::post('/custom/logout', [AuthController::class, 'customLogout'])->name('custom.logout');

Auth::routes();
