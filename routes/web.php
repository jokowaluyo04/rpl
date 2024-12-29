<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanPerkembanganController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('siswas', SiswaController::class);
Route::get('siswas/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswas.edit');

Route::resource('absensi', AbsensiController::class);

Route::resource('laporan_perkembangan', LaporanPerkembanganController::class);
Route::get('laporan_perkembangan/{laporan_perkembangan}', [LaporanPerkembanganController::class, 'show'])->name('laporan_perkembangan.show');
Route::get('laporan_perkembangan/{laporan_perkembangan}/cetak', [LaporanPerkembanganController::class, 'cetak'])->name('laporan_perkembangan.cetak');

Route::resource('manajemen_pengguna', UserController::class);
Route::delete('/manajemen_pengguna/{manajemen_pengguna}', [UserController::class, 'destroy'])->name('manajemen_pengguna.destroy');

require __DIR__ . '/auth.php';
