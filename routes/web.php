<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\PesanController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminKontakPesanController;

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');
Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

Route::get('/kontak', [App\Http\Controllers\KontakController::class, 'index'])->name('kontak');
Route::post('/pesan/kirim', [PesanController::class, 'store'])->name('pesan.store');


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Manajemen Pesan (Index & Delete)
    Route::get('/pesan', [AdminPesanController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan/{id}', [AdminPesanController::class, 'destroy'])->name('pesan.destroy');

    // Manajemen Profil (Index & Update)
    Route::get('/profil-admin', [AdminProfilController::class, 'index'])->name('profil-admin');
    Route::put('/profil/update', [AdminProfilController::class, 'update'])->name('profil-admin.update');

    Route::get('/produk', [AdminProdukController::class, 'index'])->name('produk-admin');
    Route::post('/produk', [AdminProdukController::class, 'store'])->name('produk-admin.store');
    Route::put('/produk/{id}', [AdminProdukController::class, 'update'])->name('produk-admin.update');
    Route::delete('/produk/{id}', [AdminProdukController::class, 'destroy'])->name('produk-admin.destroy');

    Route::get('/artikel', [AdminArtikelController::class, 'index'])->name('artikel-admin');
    Route::post('/artikel', [AdminArtikelController::class, 'store'])->name('artikel-admin.store');
    Route::put('/artikel/{id}', [AdminArtikelController::class, 'update'])->name('artikel-admin.update');
    Route::delete('/artikel/{id}', [AdminArtikelController::class, 'destroy'])->name('artikel-admin.destroy');

    Route::get('/galeri', [AdminGaleriController::class, 'index'])->name('galeri-admin');
    Route::post('/galeri', [AdminGaleriController::class, 'store'])->name('galeri-admin.store');
    Route::put('/galeri/{id}', [AdminGaleriController::class, 'update'])->name('galeri-admin.update');
    Route::delete('/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('galeri-admin.destroy');

    Route::get('/kontak-pesan', [AdminKontakPesanController::class, 'index'])->name('kontak-pesan-admin');
    Route::put('/kontak/update', [AdminKontakPesanController::class, 'updateKontak'])->name('kontak-admin.update');
    Route::patch('/pesan/{id}/read', [AdminKontakPesanController::class, 'markAsRead'])->name('pesan-admin.read');
    Route::delete('/pesan/{id}', [AdminKontakPesanController::class, 'destroyPesan'])->name('pesan-admin.destroy');
});
