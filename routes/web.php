<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ReportController;

// Auth
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Umum
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/actionregister', [RegisterController::class, 'actionRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Admin
    Route::resource('/admin', AdminController::class);

    // CRUD Petugas
    Route::resource('/petugas', PetugasController::class);

    // CRUD Pengguna
    Route::resource('/pengguna', PenggunaController::class);

    // CRUD Barang
    Route::resource('/barang', BarangController::class);

    // Data Lelang
    Route::resource('/lelang', LelangController::class);

    // Penawaran
    Route::post('/penawaran', [HistoriController::class, 'store'])->name('penawaran');

    // History
    Route::post('/pemenang/{id_history}', [HistoriController::class, 'status'])->name('pemenang');
    // Route::post('/pemenang/{id_history}', [HistoriController::class, 'selectAuto'])->name('auto');
    // Route::get('/select', [HistoriController::class, 'edit']);
    // Route::get('/detail/{lelang}', [LelangController::class, 'view'])->name('autoselect');
    // Route::get('/select/{lelang}', [LelangController::class, 'show2'])->name('auto');
    Route::get('/pemenang/{id_history}', [HistoriController::class, 'selectAuto'])->name('auto');

    // Single report
    Route::get('/report/{id_lelang}', [ReportController::class, 'report'])->name('report');

    // All Report
    Route::get('/cetak', [ReportController::class, 'index'])->name('cetak-Laporan');
    Route::get('/cetak/lelang', [ReportController::class, 'cetak'])->name('cetak.tgl-lelang');
});