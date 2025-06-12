<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemografiController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/demografi', [DemografiController::class, 'index']);
