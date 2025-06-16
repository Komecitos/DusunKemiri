<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

use App\Http\Controllers\Public\WargaController;
use App\Http\Controllers\Public\BeritaController;
use App\Http\Controllers\Public\DemografiController as PublicDemografiController;
use App\Http\Controllers\Public\ProfilDusunController as PublicProfilDusunController;
use App\Http\Controllers\Public\JadwalController as PublicJadwalController;
use App\Http\Controllers\Public\PetaDusunController;
use App\Http\Controllers\Public\PerangkatDusunController as PublicPerangkatDusunController;
use App\Http\Controllers\Public\BeritaController as PublicBeritaController;

use App\Http\Controllers\Public\JadwalController as PublicJadwal;
// 
use App\Http\Controllers\Admin\AdminController as AdminController;
use App\Http\Controllers\Admin\ProfilDusunController as AdminProfilDusunController;
use App\Http\Controllers\Admin\PerangkatDusunController as AdminPerangkatDusunController;
use App\Http\Controllers\Admin\PetaDusunController as AdminPetaDusunController;
use App\Http\Controllers\Admin\JadwalController as AdminJadwal;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;




Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/berita', [PublicBeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [PublicBeritaController::class, 'show'])->name('berita.show');

Route::get('/demografi', [PublicDemografiController::class, 'index'])->name('demografi.index');

Route::get('/jadwal', [PublicJadwalController::class, 'index'])->name('jadwal.index');
Route::get('/jadwal/data', [PublicJadwalController::class, 'getData'])->name('jadwal.data');
Route::get('/jadwal/{id}', [PublicJadwalController::class, 'show'])->name('jadwal.show');

Route::get('/peta-dusun', [PetaDusunController::class, 'index'])->name('peta.index');

require __DIR__ . '/auth.php';

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/profil', [PublicProfilDusunController::class, 'index']);
Route::get('/profil/perangkat', [PublicPerangkatDusunController::class, 'index']);

// Public

Route::get('/jadwal', [PublicJadwal::class, 'index'])->name('jadwal.public');
Route::get('/jadwal/{id}', [PublicJadwal::class, 'show'])->name('jadwal.show');

// Admin

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('jadwal', AdminJadwal::class);
    Route::resource('petadusun', AdminPetadusunController::class);

    Route::get('/profil', [AdminProfilDusunController::class, 'index'])->name('admin.profil.index');
    Route::get('/profil/edit', [AdminProfilDusunController::class, 'edit'])->name('admin.profil.edit');
    Route::put('/profil/update', [AdminProfilDusunController::class, 'update'])->name('admin.profil.update');

    Route::get('/perangkat', [AdminPerangkatDusunController::class, 'index'])->name('admin.perangkat.index');
    Route::get('/perangkat/create', [AdminPerangkatDusunController::class, 'create'])->name('admin.perangkat.create');
    Route::post('/perangkat', [AdminPerangkatDusunController::class, 'store'])->name('admin.perangkat.store');
    Route::get('/perangkat/{id}/edit', [AdminPerangkatDusunController::class, 'edit'])->name('admin.perangkat.edit');
    Route::put('/perangkat/{id}', [AdminPerangkatDusunController::class, 'update'])->name('admin.perangkat.update');
    Route::delete('/perangkat/{id}', [AdminPerangkatDusunController::class, 'destroy'])->name('admin.perangkat.destroy');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/warga', [WargaController::class, 'index'])->name('warga');
    Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
    Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
    Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
    Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
    Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');

    Route::resource('berita', AdminBeritaController::class);
    Route::resource('jadwal', AdminJadwal::class);
    Route::resource('petadusun', AdminPetaDusunController::class);

    Route::get('/profil', [AdminProfilDusunController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [AdminProfilDusunController::class, 'edit'])->name('profil.edit');
    Route::put('/profil/update', [AdminProfilDusunController::class, 'update'])->name('profil.update');

    Route::resource('perangkat', AdminPerangkatDusunController::class);
});


Route::get('/login-admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login-admin', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/logout-admin', [AdminController::class, 'logout'])->name('admin.logout');
