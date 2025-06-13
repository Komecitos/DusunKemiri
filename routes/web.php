<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

//admin

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;



Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/warga', [WargaController::class, 'index'])->name('admin.warga');
        Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
        Route::put('/warga/{id}', [WargaController::class, 'update'])->name('admin.warga.update');

        // Tambah Warga
        Route::get('/warga/create', [WargaController::class, 'create'])->name('admin.warga.create');
        Route::post('/warga', [WargaController::class, 'store'])->name('admin.warga.store');

        // Hapus Warga
        Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('admin.warga.destroy');
    });

    // Data Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
});

Route::get('/login-admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login-admin', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin.logout');
