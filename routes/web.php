<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemografiController;
use APP\Http\Controllers\AdminController;



Route::get('/', [HomeController::class, 'index']);
Route::get('/demografi', [DemografiController::class, 'index']);
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Auth bawaan
Auth::routes();

// Dashboard admin (hanya bisa diakses setelah login)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
