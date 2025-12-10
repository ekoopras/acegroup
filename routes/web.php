<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/app', function () {
    return view('appp');
})->name('appp');

Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
