@extends('layouts.admin')

@section('title', 'Dashboard Main - Admin')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Overview System</h3>
    <p class="text-muted small">Ringkasan data konten website profil perusahaan Anda saat ini.</p>
</div>

<!-- GRID CARDS RINGKASAN DATA DINAMIS -->
<div class="row g-3 mb-4">
    <!-- Card Total Produk -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Total Produk</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalProduk }}</h3>
                </div>
                <div class="bg-primary-subtle text-primary rounded-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-box-archive fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Status Profil -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Status Profil</span>
                    <h3 class="fw-bold {{ $profil ? 'text-success' : 'text-warning' }} mb-0 mt-1 fs-5">
                        {{ $profil ? 'Terkonfigurasi' : 'Belum Diisi' }}
                    </h3>
                </div>
                <div class="{{ $profil ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} rounded-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fa-solid {{ $profil ? 'fa-circle-check' : 'fa-triangle-exclamation' }} fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Artikel -->
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Total Artikel</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalArtikel }}</h3>
                </div>
                <div class="bg-warning-subtle text-warning rounded-4 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-newspaper fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Boks Sambutan -->
<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
    <h5 class="fw-bold text-dark mb-2">Selamat Datang di Admin CMS Portal!</h5>
    <p class="text-secondary mb-3">Gunakan menu navigasi di sebelah kiri untuk mengelola data Profil, Produk, dan Artikel secara real-time.</p>
    <div>
        <a href="{{ route('admin.dashboard') }}" target="_blank" class="btn btn-outline-indigo rounded-3 text-indigo border-indigo btn-sm">
            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Lihat Live Website
        </a>
    </div>
</div>
@endsection