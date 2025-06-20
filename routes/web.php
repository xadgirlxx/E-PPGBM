<?php

use App\Http\Controllers\BalitaController;
use App\Http\Controllers\BumilController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\UserController;
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

Route::get('/log',[App\Http\Controllers\LogsController::class , 'index']);
Route::get('/', [GuestController::class, 'landing']);
Route::get('/cek-gizi', [GuestController::class, 'cek'])->name('cek.gizi');
Route::get('/laporan/balita', [LaporanController::class, 'balita'])->name('laporan.balita');
Route::get('/laporan/balita/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.balita.pdf');
Route::get('/laporan/balita/excel', [LaporanController::class, 'exportExcel'])->name('laporan.balita.excel');
Route::get('/laporan/gizi', [LaporanController::class, 'gizi'])->name('laporan.gizi');
Route::get('/laporan/gizi-excel', [LaporanController::class, 'exportGiziExcel'])->name('laporan.gizi.excel');
Route::get('/laporan/gizi-pdf', [LaporanController::class, 'exportGiziPDF'])->name('laporan.gizi.pdf');
Route::get('/laporan/bmi', [LaporanController::class, 'bmi'])->name('laporan.bmi');
Route::get('/laporan/bmi-excel', [LaporanController::class, 'exportBmiExcel'])->name('laporan.bmi.excel');
Route::get('/laporan/bmi-pdf', [LaporanController::class, 'exportBmiPDF'])->name('laporan.bmi.pdf');


Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('balita', BalitaController::class);
Route::resource('balita.imunisasi', ImunisasiController::class);
Route::resource('balita.pengukuran', UkuranController::class);
Route::resource('bumil', BumilController::class);
