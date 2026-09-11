@extends('layouts.app')

@section('content')
<!-- HERO SECTION PAGE PRODUK -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.90) 0%, rgba(30, 27, 75, 0.85) 100%), url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 45vh;">
    
    <div class="container py-5 mt-4 text-center position-relative" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-cubes me-1"></i> Layanan & Solusi Digital
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Katalog Produk & Layanan
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Eksplorasi seluruh penawaran solusi IT, fitur lengkap, dan rincian harga transparan kami secara langsung.
        </p>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 50px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- MAIN CONTENT PRODUK (FULL DETAIL CARD) -->
<div class="position-relative bg-slate-50 py-5" style="overflow-x: clip;">
    <div class="container py-4">
        
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-indigo fw-bold text-uppercase tracking-wider small">Rincian Lengkap</span>
            <h2 class="fw-bold text-dark display-6">Daftar Layanan & Transparansi Harga</h2>
            <p class="text-muted">Semua informasi detail produk dan paket harga tersedia lengkap di bawah ini</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($produks as $item)
                {{-- KITA BERI ID SPESIFIK AGAR BISA DI-SCROLL DARI DASHBOARD --}}
                <div class="col-lg-4 col-md-6 id-target-produk" id="produk-{{ $item->id }}" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-lift hover-glow-border position-relative overflow-hidden bg-white transition-all">
                        
                        @if($item->is_populer)
                            <div class="position-absolute top-0 end-0 m-3" style="z-index: 5;">
                                <span class="badge bg-indigo text-white px-3 py-2 rounded-pill shadow-sm small">
                                    <i class="fa-solid fa-fire me-1"></i> Populer
                                </span>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column">
                            <!-- Visual Ikon / Gambar -->
                            <div class="mb-3">
                                @if(str_contains($item->gambar, 'fa-'))
                                    <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center" style="width: 65px; height: 65px;">
                                        <i class="{{ $item->gambar }} fs-2"></i>
                                    </div>
                                @elseif(!empty($item->gambar))
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" class="img-fluid rounded-3 w-100 object-fit-cover" style="height: 180px;">
                                @else
                                    <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center" style="width: 65px; height: 65px;">
                                        <i class="fa-solid fa-box-open fs-2"></i>
                                    </div>
                                @endif
                            </div>

                            <span class="text-indigo fw-bold small mb-1 text-uppercase tracking-wider">{{ $item->kategori }}</span>
                            <h3 class="fw-bold text-dark mb-3 fs-4">{{ $item->nama_produk }}</h3>
                            
                            <!-- Penjelasan / Deskripsi Lengkap -->
                            <div class="text-secondary small mb-4 lh-relaxed">
                                {!! nl2br(e($item->deskripsi)) !!}
                            </div>

                            <!-- Harga Produk -->
                            <div class="p-3 bg-slate-subtle rounded-3 mb-4 mt-auto">
                                <span class="d-block text-muted small mb-1">Estimasi Biaya:</span>
                                <div class="d-flex align-items-baseline">
                                    <span class="fs-6 fw-bold text-secondary me-1">Rp</span>
                                    <span class="fs-3 fw-bold text-indigo font-monospace me-1">
                                        {{ number_format($item->harga, 0, ',', '.') }}
                                    </span>
                                    <span class="text-muted small">{{ $item->satuan_harga }}</span>
                                </div>
                            </div>

                            <!-- Rincian Fitur / Cakupan Kerjanya -->
                            @if(!empty($item->fitur))
                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark small mb-2">Cakupan Fitur Layanan:</h6>
                                    <ul class="list-unstyled mb-0 small text-secondary">
                                        @foreach($item->fitur as $fitur)
                                            <li class="mb-2 d-flex align-items-start">
                                                <i class="fa-solid fa-circle-check text-indigo me-2 mt-1 fs-6"></i>
                                                <span>{{ $fitur }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Tombol Aksi Konsultasi -->
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20dengan%20layanan%20{{ urlencode($item->nama_produk) }}" 
                               target="_blank" 
                               class="btn btn-indigo w-100 rounded-3 fw-semibold py-2 d-flex align-items-center justify-content-center gap-2">
                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                <span>Pesan / Konsultasi</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fst-italic">Belum ada layanan / produk yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- SCRIPT OTOMATIS HIGHLIGHT & SMOOTH SCROLL DARI DASHBOARD -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.location.hash) {
            const targetId = window.location.hash.substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                setTimeout(() => {
                    targetElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 300);
            }
        }
    });
</script>
@endsection