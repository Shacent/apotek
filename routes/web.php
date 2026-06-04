<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriObatController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\ObatKeluarController;
use App\Http\Controllers\KatalogController;

Route::get('/', [KatalogController::class, 'index'])
    ->name('katalog');

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('kategori', KategoriObatController::class)->names('kategori');
    Route::resource('supplier', SupplierController::class)->names('supplier');
    Route::resource('obat', ObatController::class)->names('obat');
    Route::resource('obat-masuk', ObatMasukController::class)->names('obat-masuk');
    Route::resource('obat-keluar', ObatKeluarController::class)->names('obat-keluar');
});