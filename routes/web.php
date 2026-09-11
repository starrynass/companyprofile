<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesanController;

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Nanti route CRUD Profil, Produk, dan Artikel diletakkan di bawah ini:
    // Route::resource('profil', AdminProfilController::class);
    // Route::resource('produk', AdminProdukController::class);
});

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');

Route::get('/kontak', [App\Http\Controllers\KontakController::class, 'index'])->name('kontak');
Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('pesan.store');

// Route untuk Admin (Gunakan middleware auth jika ada)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/pesan', [PesanController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
});

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

// Route untuk Halaman Detail Artikel (Baca Selengkapnya)
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');