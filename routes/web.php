<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLaptopController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/notifikasi', fn () => view('notifikasi.index'))
    ->name('notifikasi.index');

Route::get('/setting', [SettingController::class, 'index'])
    ->name('setting.index');

Route::resource('product-laptop', ProductLaptopController::class);
