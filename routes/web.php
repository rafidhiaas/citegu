<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rute untuk halaman utama (landing page)
Route::get('/', function () {
    return view('home'); // Tetap menunjuk ke home.blade.php
})->name('home');

// Rute untuk halaman produk terpisah
Route::get('/products', function () {
    return view('products.products'); // <-- PERUBAHAN DI SINI!
})->name('products.index'); // Nama rutenya ('products.index') TIDAK BERUBAH