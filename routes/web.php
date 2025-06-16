<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Public Controllers
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\BeritaController as PublicBeritaController;
use App\Http\Controllers\Public\DemografiController as PublicDemografiController;
use App\Http\Controllers\Public\JadwalController as PublicJadwalController;
use App\Http\Controllers\Public\PetaDusunController;
use App\Http\Controllers\Public\PerangkatDusunController as PublicPerangkatDusunController;
use App\Http\Controllers\Public\ProfilDusunController as PublicProfilDusunController;
use App\Http\Controllers\Public\WargaController;

// Admin Controllers
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwalController;
use App\Http\Controllers\Admin\PetaDusunController as AdminPetaDusunController;
use App\Http\Controllers\Admin\PerangkatDusunController as AdminPerangkatDusunController;
use App\Http\Controllers\Admin\ProfilDusunController as AdminProfilDusunController;

Route::get('/', fn() => view('home'));

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', fn() => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// === Public Routes ===
Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

Route::get('/demografi', [PublicDemografiController::class, 'index'])->name('demografi.index');

Route::get('/jadwal', [PublicJadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/data', [PublicJadwalController::class, 'getData'])->name('jadwal.data');
Route::get('/jadwal/{id}', [PublicJadwalController::class, 'show'])->name('jadwal.show');

Route::get('/peta-dusun', [PetaDusunController::class, 'index'])->name('peta.index');

Route::get('/profil', [PublicProfilDusunController::class, 'index']);
Route::get('/profil/perangkat', [PublicPerangkatDusunController::class, 'index']);

// === Auth Routes ===
require __DIR__ . '/auth.php';
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// === Admin Routes ===
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    // Warga
    Route::get('/warga', [WargaController::class, 'index'])->name('warga');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

    // CRUD Resources
    Route::resource('berita', AdminBeritaController::class);
    Route::resource('jadwal', AdminJadwalController::class);
    Route::resource('petadusun', AdminPetaDusunController::class);
    Route::resource('perangkat', AdminPerangkatDusunController::class);

    // Profil Dusun (custom route)
    Route::get('/profil', [AdminProfilDusunController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [AdminProfilDusunController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [AdminProfilDusunController::class, 'update'])->name('profil.update');
});

// === Admin Auth ===
Route::get('/login-admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login-admin', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin.logout');
