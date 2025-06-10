<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\UkuranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('balita', BalitaController::class);
Route::resource('balita.imunisasi', ImunisasiController::class);
Route::resource('balita.pengukuran', UkuranController::class);