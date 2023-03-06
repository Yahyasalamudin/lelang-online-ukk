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

// Landing
Route::get('/', [LoginController::class, 'index'])->name('welcome');

// Auth
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Masyarakat
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/actionregister', [RegisterController::class, 'actionRegister'])->name('register');

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Edit Profile
    Route::get('/edit/profile/{id}', [RegisterController::class, 'editProfile'])->name('editprofile');
    Route::put('/update/profile/{id}', [RegisterController::class, 'updateProfile'])->name('updateprofile');

    // Edit Password
    Route::get('/edit/password/{id}', [RegisterController::class, 'editPassword'])->name('editpassword');
    Route::put('/update/password/{id}', [RegisterController::class, 'updatePassword'])->name('updatepassword');

    // CRUD Admin
    Route::resource('/admin', AdminController::class);

    // CRUD Petugas
    Route::resource('/petugas', PetugasController::class);

    // CRUD Pengguna
    Route::resource('/pengguna', PenggunaController::class);

    // Tampilkan data lelang yang dimenangkan user
    Route::get('/winner/lelang', [PenggunaController::class, 'win'])->name('winner');

    // CRUD Barang
    Route::resource('/barang', BarangController::class);

    // CRUD Lelang
    Route::resource('/lelang', LelangController::class);

    // Penawaran
    Route::post('/penawaran/{id}', [HistoriController::class, 'store'])->name('penawaran');

    // History
    Route::post('/pemenang/{id_history}', [HistoriController::class, 'status'])->name('pemenang');

    // Pemilihan Pemenang
    Route::get('/winner/detail/{id}', [DashboardController::class, 'show'])->name('winner-detail');
    Route::put('/winner/update/{id}', [DashboardController::class, 'update'])->name('winner-update');

    // History Lelang
    Route::get('/history/lelang', [DashboardController::class, 'historyLelang'])->name('history');

    // Report Lelang sesuai ID
    Route::get('/report/{id_lelang}', [ReportController::class, 'report'])->name('report');

    // All Report
    Route::get('/cetak', [ReportController::class, 'index'])->name('cetak-Laporan');
    Route::get('/cetak/admin', [ReportController::class, 'cetakadmin'])->name('cetak-admin');
    Route::get('/cetak/petugas', [ReportController::class, 'cetakpetugas'])->name('cetak-petugas');
    Route::get('/cetak/pengguna', [ReportController::class, 'cetakpengguna'])->name('cetak-pengguna');
    Route::get('/cetak/tanggal', [ReportController::class, 'cetaklelang'])->name('cetak-lelang');
    Route::get('/cetak/lelang', [ReportController::class, 'reportTgl'])->name('cetak.tgl-lelang');
    Route::get('/cetak/pemenang/{id_lelang}', [ReportController::class, 'reportPemenang'])->name('cetak-pemenang');

});
