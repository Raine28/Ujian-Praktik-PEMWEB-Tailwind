<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//route resource for products
Route::resource('/products', \App\Http\Controllers\ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



