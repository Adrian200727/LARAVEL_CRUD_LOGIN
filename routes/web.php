<?php

// routes/web.php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Rute untuk ProductController
Route::controller(ProductController::class)->group(function(){
    Route::get('/','index')->name('products.index')->middleware('auth');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit','edit')->name('products.edit');
    Route::put('/products/{product}','update')->name('products.update');
    Route::delete('/products/{product}','destroy')->name('products.destroy');
});

// Rute login terpisah
Route::get('/login', [LoginController::class, 'index'])->name('login'); // Menampilkan form login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit'); // Menangani proses otentikasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');