@extends('layouts.app')

@section('content')
<!-- HEADER DETAIL ARTIKEL (HERO) -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 27, 75, 0.90) 100%), url('{{ Str::startsWith($artikel->thumbnail, 'http') ? $artikel->thumbnail : asset('storage/' . $artikel->thumbnail) }}') center/cover no-repeat; min-height: 50vh;">
    
    <div class="container py-5 mt-3 position-relative" style="z-index: 2; max-width: 900px;" data-aos="fade-down">
        <!-- Tombol Kembali -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('artikel') }}" class="text-light text-decoration-none fw-semibold small px-3 py-2 rounded-pill bg-white bg-opacity-10 backdrop-blur d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Artikel
                    </a>
                </li>
            </ol>
        </nav>

        <!-- Tanggal & Kategori -->
        <div class="mb-3">
            <span class="badge bg-indigo text-white fw-semibold px-3 py-2 rounded-pill shadow-sm">
                <i class="fa-regular fa-calendar-days me-1"></i> {{ \Carbon\Carbon::parse($artikel->tanggal)->format('d M Y') }}
            </span>
        </div>

        <!-- Judul Artikel -->
        <h1 class="display-5 fw-bold text-white mb-4" style="text-shadow: 0 3px 10px rgba(0,0,0,0.7); line-height: 1.3;">
            {{ $artikel->judul }}
        </h1>
    </div>

    <!-- Gelombang SVG Smooth -->
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;" data-aos="fade-up" data-aos-duration="800">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: 100%; height: 40px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- MAIN CONTAINER & KONTEN ARTIKEL -->
<div class="position-relative bg-slate-50 overflow-hidden py-5">

    <!-- Background Glow Orbs Global -->
    <div class="position-absolute top-0 start-0 w-100 h-100 pointer-events-none" style="z-index: 0;">
        <div class="glow-orb position-absolute rounded-circle" style="width: 550px; height: 550px; background: #6366f1; opacity: 0.12; filter: blur(120px); top: 10%; left: -10%;"></div>
        <div class="glow-orb position-absolute rounded-circle" style="width: 600px; height: 600px; background: #6366f1; opacity: 0.12; filter: blur(130px); bottom: 10%; right: -10%;"></div>
    </div>

    <div class="container position-relative py-3" style="z-index: 1;">
        <div class="row justify-content-center">
            <div class="col-lg-9" data-aos="fade-up">
                
                <!-- Card Konten Utama -->
                <div class="bg-white p-4 p-md-5 rounded-4 border-0 shadow-sm mt-n5 position-relative" style="z-index: 3;">
                    
                    <!-- Thumbnail Utama di dalam Artikel -->
                    <div class="mb-4 rounded-4 overflow-hidden shadow-sm" style="max-height: 450px;">
                        <img src="{{ Str::startsWith($artikel->thumbnail, 'http') ? $artikel->thumbnail : asset('storage/' . $artikel->thumbnail) }}" 
                             alt="{{ $artikel->judul }}" 
                             class="w-100 h-100 object-fit-cover">
                    </div>

                    <!-- Ringkasan / Lead Paragraph -->
                    <p class="lead fw-medium text-dark mb-4 border-start border-4 border-indigo ps-3 py-1 fst-italic lh-base">
                        {{ $artikel->ringkasan }}
                    </p>

                    <!-- Isi Konten Lengkap -->
                    <div class="text-secondary leading-relaxed article-content fs-6 py-2" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! $artikel->konten !!}
                    </div>

                    <!-- Bagian Tombol Aksi & Share (Diperbaiki agar rapi dan ikon X muncul dengan aman menggunakan class alternatif twitter/x) -->
                    <div class="mt-5 pt-4 border-top d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <a href="{{ route('artikel') }}" class="btn btn-outline-indigo rounded-pill px-4 fw-semibold">
                            <i class="fa-solid fa-arrow-left me-2"></i> Kembali ke Daftar Artikel
                        </a>
                        
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <span class="fw-semibold me-1">Bagikan:</span>
                            <!-- Tombol WhatsApp -->
                            <a href="https://wa.me/?text={{ urlencode($artikel->judul . ' - ' . request()->url()) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-success rounded-circle shadow-sm share-btn-social" 
                               title="Bagikan ke WhatsApp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <!-- Tombol Twitter / X (Menggunakan class fallback yang kompatibel) -->
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($artikel->judul . ' ' . request()->url()) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-dark rounded-circle shadow-sm share-btn-social" 
                               title="Bagikan ke X (Twitter)">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- REKOMENDASI ARTIKEL LAIN -->
                @if(isset($artikelLain) && $artikelLain->count() > 0)
                    <div class="mt-5 pt-3" data-aos="fade-up">
                        <h4 class="fw-bold text-dark mb-4"><i class="fa-solid fa-book-open-reader text-indigo me-2"></i> Baca Juga Artikel Lainnya</h4>
                        <div class="row g-4">
                            @foreach($artikelLain as $item)
                                <div class="col-md-4">
                                    <div class="card bg-white border-0 rounded-4 shadow-sm h-100 hover-lift overflow-hidden d-flex flex-column">
                                        <div style="height: 150px; overflow: hidden;">
                                            <img src="{{ Str::startsWith($item->thumbnail, 'http') ? $item->thumbnail : asset('storage/' . $item->thumbnail) }}" 
                                                 alt="{{ $item->judul }}" 
                                                 class="w-100 h-100 object-fit-cover">
                                        </div>
                                        <div class="card-body p-3 d-flex flex-column flex-grow-1">
                                            <h6 class="fw-bold text-dark mb-2 line-clamp-2" style="font-size: 0.95rem;">
                                                {{ $item->judul }}
                                            </h6>
                                            <div class="mt-auto pt-2">
                                                <a href="{{ route('artikel.show', $item->id) }}" class="text-indigo text-decoration-none small fw-semibold d-flex align-items-center gap-1 hover-arrow">
                                                    <span>Baca artikel</span> <i class="fa-solid fa-arrow-right small transition-all"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style CSS Khusus Tombol Share agar Presisi di Tengah -->
<style>
    .share-btn-social {
        width: 38px !important;
        height: 38px !important;
        min-width: 38px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.2s ease-in-out;
    }
    .share-btn-social:hover {
        transform: translateY(-2px);
    }
</style>
@endsection