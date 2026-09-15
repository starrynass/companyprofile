@extends('layouts.admin')

@section('title', 'Dashboard Main - Admin')

@section('content')
<div class="mb-4">
    <h3 class="fw-bold text-dark mb-1">Overview System</h3>
    <p class="text-muted small">Ringkasan data konten website profil perusahaan Anda saat ini.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 hover-lift hover-rotate-icon position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Total Produk</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalProduk }}</h3>
                </div>
                <div class="bg-indigo text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm icon-box-animate" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-box-archive fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 hover-lift hover-rotate-icon position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Status Profil</span>
                    <h3 class="fw-bold {{ $profil ? 'text-success' : 'text-warning' }} mb-0 mt-1 fs-5">
                        {{ $profil ? 'Terkonfigurasi' : 'Belum Diisi' }}
                    </h3>
                </div>
                <div class="{{ $profil ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }} rounded-4 d-flex align-items-center justify-content-center icon-box-animate" style="width: 50px; height: 50px;">
                    <i class="fa-solid {{ $profil ? 'fa-circle-check' : 'fa-triangle-exclamation' }} fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 hover-lift hover-rotate-icon position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Total Artikel</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalArtikel }}</h3>
                </div>
                <div class="bg-indigo text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm icon-box-animate" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-newspaper fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100 hover-lift hover-rotate-icon position-relative overflow-hidden">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small fw-semibold">Total Foto Galeri</span>
                    <h3 class="fw-bold text-dark mb-0 mt-1">{{ $totalGaleri }}</h3>
                </div>
                <div class="bg-indigo text-white rounded-4 d-flex align-items-center justify-content-center shadow-sm icon-box-animate" style="width: 50px; height: 50px;">
                    <i class="fa-solid fa-images fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <a href="{{ route('admin.produk-admin.store') }}" class="card border-0 shadow-sm rounded-4 p-3 bg-white text-decoration-none hover-lift h-100 d-flex flex-row align-items-center gap-3">
            <div class="bg-indigo-subtle text-indigo rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; flex-shrink: 0;">
                <i class="fa-solid fa-plus fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold text-dark mb-1">Tambah Produk</h6>
                <p class="text-muted small mb-0">Input produk baru ke katalog</p>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.artikel-admin.store') }}" class="card border-0 shadow-sm rounded-4 p-3 bg-white text-decoration-none hover-lift h-100 d-flex flex-row align-items-center gap-3">
            <div class="bg-indigo-subtle text-indigo rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; flex-shrink: 0;">
                <i class="fa-solid fa-pen-nib fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold text-dark mb-1">Tulis Artikel</h6>
                <p class="text-muted small mb-0">Publikasikan informasi terbaru</p>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.kontak-pesan-admin') }}" class="card border-0 shadow-sm rounded-4 p-3 bg-white text-decoration-none hover-lift h-100 d-flex flex-row align-items-center gap-3">
            <div class="bg-indigo-subtle text-indigo rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; flex-shrink: 0;">
                <i class="fa-solid fa-envelope fs-5"></i>
            </div>
            <div>
                <h6 class="fw-bold text-dark mb-1">Cek Pesan Masuk</h6>
                <p class="text-muted small mb-0">Kelola pesan dari pengunjung</p>
            </div>
        </a>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4 p-4 bg-white hover-lift">
    <div class="d-flex align-items-center gap-3 mb-2">
        <div class="bg-indigo-subtle text-indigo rounded-3 d-flex align-items-center justify-content-center floating-element" style="width: 40px; height: 40px;">
            <i class="fa-solid fa-laptop-code fs-5 text-indigo"></i>
        </div>
        <h5 class="fw-bold text-dark mb-0">Selamat Datang di Dashboard Admin!</h5>
    </div>
    <p class="text-secondary small mb-3">Gunakan menu navigasi di sebelah kiri untuk mengelola data Profil, Produk, Artikel, dan Galeri secara real-time dengan standar kualitas terbaik.</p>
    <div>
        <a href="{{ route('dashboard') }}" target="_blank" class="btn btn-indigo rounded-3 btn-sm px-3 py-2 shadow-sm transition-all hover-arrow">
            <span class="d-inline-flex align-items-center gap-2">
                Lihat Live Website 
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </span>
        </a>
    </div>
</div>
@endsection