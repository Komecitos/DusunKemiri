<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DemografiController;
use App\Http\Controllers\Public\JadwalController as PublicJadwalController;

use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;


use App\Http\Controllers\Public\BeritaController as PublicBeritaController;




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

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

Route::get('/demografi', [DemografiController::class, 'index'])->name('demografi.index');

Route::get('/jadwal', [PublicJadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/data', [PublicJadwalController::class, 'getData'])->name('jadwal.data');
Route::get('/jadwal/{id}', [PublicJadwalController::class, 'show'])->name('jadwal.show');

require __DIR__ . '/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Public
use App\Http\Controllers\Public\JadwalController as PublicJadwal;

Route::get('/jadwal', [PublicJadwal::class, 'index'])->name('jadwal.public');
Route::get('/jadwal/{id}', [PublicJadwal::class, 'show'])->name('jadwal.show');

// Admin
use App\Http\Controllers\Admin\JadwalController as AdminJadwal;

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/jadwal', [AdminJadwal::class, 'index'])->name('admin.jadwal.index');
    Route::get('/jadwal/create', [AdminJadwal::class, 'create'])->name('admin.jadwal.create');
    Route::post('/jadwal', [AdminJadwal::class, 'store'])->name('admin.jadwal.store');
    Route::get('/jadwal/{id}/edit', [AdminJadwal::class, 'edit'])->name('admin.jadwal.edit');
    Route::put('/jadwal/{id}', [AdminJadwal::class, 'update'])->name('admin.jadwal.update');
    Route::delete('/jadwal/{id}', [AdminJadwal::class, 'destroy'])->name('admin.jadwal.destroy');
});

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

    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::resource('berita', BeritaController::class, [
            'as' => 'admin' // route name = admin.berita.index, admin.berita.create, dll
        ]);
    });


    // Data Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
});

Route::get('/login-admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login-admin', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin.logout');
