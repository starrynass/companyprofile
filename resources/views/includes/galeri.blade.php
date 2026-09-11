@extends('layouts.app')

@section('content')
<!-- HERO SECTION GALERI -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 27, 75, 0.90) 100%), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 40vh;">
    
    <div class="container py-5 text-center position-relative mb-4" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-images me-1"></i> Dokumentasi Perusahaan
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Galeri Kegiatan & Aktivitas
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Momen kebersamaan, inovasi tim, dan dokumentasi proyek yang berjalan di lingkungan kerja kami.
        </p>
    </div>

    <!-- Gelombang SVG Smooth -->
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;" data-aos="fade-up" data-aos-duration="800">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: 100%; height: 45px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- MAIN CONTAINER -->
<div class="position-relative bg-slate-50 py-5">
    <div class="container position-relative py-3">
        
        @if($galeris->count() > 0)
            <!-- GRID GALERI (Hanya Berisi Kartu Saja) -->
            <div class="row g-4">
                @foreach($galeris as $galeri)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card bg-white rounded-4 border-0 shadow-sm h-100 hover-lift overflow-hidden d-flex flex-column card-galeri-item">
                            
                            <!-- Foto Dokumentasi dengan Efek Zoom -->
                            <div class="position-relative overflow-hidden" style="height: 250px;">
                                <img src="{{ Str::startsWith($galeri->foto, 'http') ? $galeri->foto : asset('storage/' . $galeri->foto) }}" 
                                     alt="{{ $galeri->judul }}" 
                                     class="w-100 h-100 object-fit-cover transition-transform duration-500 hover-zoom cursor-pointer"
                                     data-bs-toggle="modal" data-bs-target="#imageModal{{ $galeri->id }}">
                                
                                <!-- Badge Tanggal di atas gambar -->
                                <span class="badge bg-dark bg-opacity-75 text-light position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill small">
                                    <i class="fa-regular fa-calendar-days me-1"></i> {{ date('d M Y', strtotime($galeri->created_at)) }}
                                </span>
                            </div>

                            <!-- Body Content -->
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <h5 class="fw-bold text-dark mb-0 fs-6">
                                    {{ $galeri->judul }}
                                </h5>
                                <div class="mt-3 pt-2 border-top d-flex align-items-center justify-content-between text-muted small">
                                    <span><i class="fa-solid fa-camera-retro text-indigo me-1"></i> Dokumentasi Tim</span>
                                    <button type="button" class="btn btn-sm btn-light text-indigo rounded-pill px-3 shadow-sm border fw-semibold" data-bs-toggle="modal" data-bs-target="#imageModal{{ $galeri->id }}">
                                        <i class="fa-solid fa-expand me-1"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <!-- State Jika Galeri Kosong -->
            <div class="col-12 text-center py-5" data-aos="fade-up">
                <div class="p-5 bg-white rounded-4 border shadow-sm d-inline-block">
                    <i class="fa-solid fa-images display-3 text-muted opacity-50 mb-3 d-block"></i>
                    <h4 class="fw-bold text-dark mb-1">Belum Ada Dokumentasi Galeri</h4>
                    <p class="text-muted mb-0">Foto kegiatan perusahaan akan segera ditambahkan ke database.</p>
                </div>
            </div>
        @endif

        <!-- PAGINATION BERSIH -->
        <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
            {{ $galeris->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

<!-- SEMUA MODAL (LEBIH BESAR & LUAS) -->
@foreach($galeris as $galeri)
    <div class="modal fade" id="imageModal{{ $galeri->id }}" tabindex="-1" aria-hidden="true">
        <!-- Ubah dari modal-md ke modal-lg atau modal-xl di sini -->
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-white rounded-4 overflow-hidden border-0 shadow-lg">
                
                <!-- Bagian Foto -->
                <div class="position-relative bg-dark">
                    <!-- Tombol Close -->
                    <button type="button" class="btn position-absolute top-0 end-0 m-3 text-white rounded-circle d-flex align-items-center justify-content-center shadow" data-bs-dismiss="modal" aria-label="Close" style="width: 38px; height: 38px; background: rgba(0, 0, 0, 0.6); z-index: 1050;">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    
                    <!-- Gambar Full Pas Menyesuaikan -->
                    <img src="{{ Str::startsWith($galeri->foto, 'http') ? $galeri->foto : asset('storage/' . $galeri->foto) }}" 
                         alt="{{ $galeri->judul }}" 
                         class="w-100 h-auto d-block" style="max-height: 80vh; object-fit: cover;">
                </div>

                <!-- Bagian Keterangan Sederhana -->
                <div class="modal-body p-4">
                    <h4 class="fw-bold text-dark mb-1 fs-5">{{ $galeri->judul }}</h4>
                    <p class="text-muted small mb-0">
                        <i class="fa-regular fa-calendar-days me-1"></i> 
                        Diunggah pada {{ date('d F Y', strtotime($galeri->created_at)) }}
                    </p>
                </div>

            </div>
        </div>
    </div>
@endforeach

<!-- STYLING CSS -->
<style>
    .card-galeri-item {
        transition: all 0.3s ease-in-out;
    }
    .card-galeri-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(99, 102, 241, 0.12) !important;
    }
    .card-galeri-item:hover .hover-zoom {
        transform: scale(1.08);
    }
    .transition-transform {
        transition: transform 0.5s ease;
    }

    /* Styling Pagination Minimalis */
    .pagination {
        gap: 6px;
    }
    .page-item .page-link {
        border-radius: 8px !important;
        padding: 8px 14px;
        font-weight: 600;
        color: #4f46e5;
        border: 1px solid #e2e8f0;
        background-color: #ffffff;
        transition: all 0.2s ease;
    }
    .page-item.active .page-link {
        background-color: #4f46e5;
        border-color: #4f46e5;
        color: #ffffff;
    }
    .page-item .page-link:hover {
        background-color: #f1f5f9;
        color: #4f46e5;
    }
</style>
@endsection