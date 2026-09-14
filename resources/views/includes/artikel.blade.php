@extends('layouts.app')

@section('content')
<!-- HERO SECTION PAGE ARTIKEL -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 27, 75, 0.90) 100%), url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 40vh;">
    
    <div class="container py-5 text-center position-relative mb-4" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-newspaper me-1"></i> Informasi & Berita Terkini
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Artikel & Wawasan IT
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Pusat artikel, inovasi teknologi, dan wawasan mendalam untuk akselerasi digital bisnis Anda.
        </p>
    </div>

    <!-- Gelombang SVG Smooth -->
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;" data-aos="fade-up" data-aos-duration="800">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: 100%; height: 45px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- MAIN CONTENT ARTIKEL (FULL DETAIL CARD) -->
<div class="position-relative bg-slate-50 overflow-hidden py-5">

    <div class="position-absolute top-0 start-0 w-100 h-100 pointer-events-none" style="z-index: 0;">
        <div class="glow-orb position-absolute rounded-circle" style="width: 550px; height: 550px; background: #6366f1; opacity: 0.12; filter: blur(120px); top: 10%; left: -10%;"></div>
        <div class="glow-orb position-absolute rounded-circle" style="width: 600px; height: 600px; background: #6366f1; opacity: 0.12; filter: blur(130px); bottom: 10%; right: -10%;"></div>
    </div>

    <div class="container position-relative py-3" style="z-index: 1;">
        
        @if($artikels->count() > 0)
            @php 
                $featured = $artikels->first();
            @endphp

            <!-- Artikel Utama (Featured) -->
            <div class="card bg-white border-0 rounded-4 shadow-sm mb-5 overflow-hidden hover-lift" data-aos="fade-up">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-7 position-relative overflow-hidden" style="min-height: 320px;">
                        <img src="{{ Str::startsWith($featured->thumbnail, 'http') ? $featured->thumbnail : asset('storage/' . $featured->thumbnail) }}" 
                             alt="{{ $featured->judul }}" 
                             class="w-100 h-100 object-fit-cover position-absolute top-0 start-0 transition-transform duration-500 hover-zoom">
                        <span class="badge bg-indigo text-white position-absolute top-0 start-0 m-4 px-3 py-2 rounded-pill shadow">
                            <i class="fa-solid fa-star me-1"></i> Artikel Utama
                        </span>
                    </div>
                    <div class="col-lg-5">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-center">
                            <div class="d-flex align-items-center text-muted small mb-2 gap-2">
                                <span><i class="fa-regular fa-calendar-days text-indigo me-1"></i> {{ $featured->tanggal }}</span>
                            </div>
                            <h3 class="fw-bold text-dark mb-3 fs-3">
                                {{ $featured->judul }}
                            </h3>
                            <p class="text-secondary mb-4 leading-relaxed">
                                {{ Str::limit($featured->ringkasan, 140) }}
                            </p>
                            <div>
                                <a href="{{ route('artikel.show', $featured->id) }}" class="btn btn-indigo rounded-pill px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                                    <span>Baca Selengkapnya</span>
                                    <i class="fa-solid fa-arrow-right small"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Section Artikel Lainnya -->
            <div class="d-flex align-items-center justify-content-between mb-4 mt-5" data-aos="fade-up">
                <h4 class="fw-bold text-dark m-0"><i class="fa-solid fa-list-ul text-indigo me-2"></i> Artikel Lainnya</h4>
                <span class="text-muted small">Menampilkan wawasan teknologi terpilih</span>
            </div>

            <!-- Grid Artikel Lainnya -->
            <div class="row g-4">
                @foreach($artikels->skip(1) as $artikel)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card bg-white rounded-4 border-0 shadow-sm h-100 hover-lift overflow-hidden d-flex flex-column card-article-item">
                            
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img src="{{ Str::startsWith($artikel->thumbnail, 'http') ? $artikel->thumbnail : asset('storage/' . $artikel->thumbnail) }}" 
                                     alt="{{ $artikel->judul }}" 
                                     class="w-100 h-100 object-fit-cover transition-transform duration-500 hover-zoom">
                                <div class="position-absolute bottom-0 start-0 w-100 h-50 bg-gradient-to-t opacity-75"></div>
                                <span class="badge bg-dark bg-opacity-75 backdrop-blur text-light position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill small">
                                    {{ date('d M Y', strtotime($artikel->tanggal)) }}
                                </span>
                            </div>

                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold text-dark mb-2 fs-6 line-clamp-2 article-title-link">
                                    {{ $artikel->judul }}
                                </h5>
                                <p class="text-secondary small mb-4 flex-grow-1 leading-relaxed">
                                    {{ Str::limit($artikel->ringkasan, 90) }}
                                </p>
                                
                                <!-- Tombol Aksi Minimalis -->
                                <div class="mt-auto pt-2 border-top d-flex align-items-center justify-content-between">
                                    <span class="text-indigo small fw-semibold">Eksplorasi Wawasan</span>
                                    <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-sm btn-light rounded-circle text-indigo shadow-sm border d-flex align-items-center justify-content-center action-arrow-btn" style="width: 38px; height: 38px; min-width: 38px;">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <!-- State Jika Kosong -->
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <div class="p-5 bg-white rounded-4 border shadow-sm d-inline-block">
                    <i class="fa-solid fa-folder-open display-3 text-muted opacity-50 mb-3 d-block"></i>
                    <h4 class="fw-bold text-dark mb-1">Belum Ada Artikel</h4>
                    <p class="text-muted mb-0">Silakan tambahkan data artikel melalui panel admin.</p>
                </div>
            </div>
        @endif

        <!-- Pagination Links -->
        <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
            {{ $artikels->links() }}
        </div>
    </div>
</div>

@endsection