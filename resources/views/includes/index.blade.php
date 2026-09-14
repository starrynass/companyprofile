@extends('layouts.app')

@section('content')
<!-- HERO SECTION -->
<section id="home" class="min-vh-100 d-flex align-items-center position-relative text-white"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(15, 23, 42, 0.35) 100%), url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;">

    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;"
         data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 60px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>

    <div class="container py-5 mt-5">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000">
                <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
                    <i class="fa-solid fa-rocket me-1 animate-bounce"></i> Solusi IT Terpercaya
                </span>
                <h1 class="display-3 fw-bold mb-3 text-white" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7); letter-spacing: -1px;">
                    Akselerasi Digitalisasi Bisnis Anda Bersama Kami
                </h1>
                <p class="lead text-light mb-4" style="text-shadow: 0 2px 5px rgba(0,0,0,0.7); max-width: 650px;">
                    {{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }} menyediakan layanan pengembangan software, infrastruktur jaringan, dan konsultasi IT secara profesional.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#produk" class="btn btn-indigo btn-lg px-4 shadow-lg fw-semibold btn-hover-grow">
                        <i class="fa-solid fa-layer-group me-2"></i> Lihat Layanan
                    </a>
                    <a href="#kontak" class="btn btn-outline-light btn-lg px-4 fw-semibold backdrop-blur btn-hover-grow">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="position-relative bg-slate-50" style="overflow-x: clip;">
    <!-- Background Glow Orbs -->
    <div class="glow-orb position-absolute top-50 start-0 rounded-circle pointer-events-none" 
         style="width: 500px; height: 500px; background: #06b6d4; opacity: 0.20; filter: blur(110px); transform: translate(-30%, -50%); z-index: 0;"></div>
    
    <div class="glow-orb position-absolute bottom-0 end-0 rounded-circle pointer-events-none" 
         style="width: 400px; height: 400px; background: #6366f1; opacity: 0.20; filter: blur(90px); transform: translate(20%, 20%); z-index: 0;"></div>

    <!-- SECTION PROFIL -->
    <section id="profil" class="py-5 border-bottom position-relative" style="z-index: 1;">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-indigo fw-bold text-uppercase tracking-wider small">Profil Perusahaan</span>
                <h2 class="fw-bold text-dark display-6">Membangun Masa Depan Digital</h2>
                <p class="text-muted">Dedikasi kami untuk efisiensi dan keamanan teknologi perusahaan Anda</p>
            </div>
            
            <div class="row mb-4" data-aos="fade-up">
                <div class="col-12">
                    <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm hover-lift hover-glow-border hover-rotate-icon">
                        <div class="row align-items-start gy-4">
                            <!-- KOLOM KIRI: TEKS SEJARAH -->
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center gap-3 mb-4">
                                    <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 d-inline-flex align-items-center justify-content-center flex-shrink-0" style="width: 50px; height: 50px;">
                                        <i class="fa-solid fa-clock-rotate-left fs-4"></i>
                                    </div>
                                    <h4 class="fw-bold text-dark mb-0">Sejarah Perusahaan</h4>
                                </div>
                                <p class="text-secondary fs-5 lh-base mb-0" style="max-width: 90%;">
                                    {{ $profils->sejarah ?? 'Sejarah perusahaan belum diisi.' }}
                                </p>
                            </div>

                            <!-- KOLOM KANAN: GAMBAR PERUSAHAAN (FIXED BUG VARIABLE) -->
                            <div class="col-lg-6 text-center">
                                <div class="position-relative overflow-hidden rounded-4 shadow-sm border">
                                    @if(isset($profils->gambar_sejarah) && $profils->gambar_sejarah)
                                        <img src="{{ asset('storage/' . $profils->gambar_sejarah) }}" 
                                             alt="Sejarah Perusahaan" 
                                             class="img-fluid w-100 object-fit-cover" 
                                             style="max-height: 320px;">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=800&auto=format&fit=crop" 
                                             alt="Kantor Perusahaan" 
                                             class="img-fluid w-100 object-fit-cover" 
                                             style="max-height: 320px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BARIS 2: VISI & MISI -->
            <div class="row gy-4 align-items-stretch mb-4">
                <div class="col-md-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm h-100 hover-lift hover-glow-border hover-rotate-icon">
                        <div class="icon-box-animate mb-4 text-indigo bg-indigo-subtle rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-eye fs-4"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Visi</h4>
                        <p class="text-secondary leading-relaxed mb-0">
                            {{ $profils->visi ?? 'Visi perusahaan belum diisi.' }}
                        </p>
                    </div>
                </div>

                <div class="col-md-6" data-aos="fade-left" data-aos-delay="100">
                    <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm h-100 hover-lift hover-glow-border hover-rotate-icon">
                        <div class="icon-box-animate mb-4 text-indigo bg-indigo-subtle rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-bullseye fs-4"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-3">Misi</h4>
                        <p class="text-secondary leading-relaxed mb-0">
                             @if(!empty($profils->misi))
                                {!! nl2br(e($profils->misi)) !!}
                            @else
                                <span class="text-muted">Belum ada data misi.</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION PRODUK -->
    <section id="produk" class="py-5 position-relative" style="z-index: 1;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="text-indigo fw-bold text-uppercase tracking-wider small">Layanan Kami</span>
            <h2 class="fw-bold text-dark display-6">Produk & Layanan</h2>
            <p class="text-muted">Solusi teknologi unggulan yang dirancang khusus untuk skala bisnis Anda</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($produks as $item)
                <div class="{{ $loop->index < 2 ? 'col-lg-6' : 'col-lg-4 col-md-6' }}" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $loop->iteration * 100 }}">
                     
                    <!-- TAMBAHKAN ID UNIK DI CARD INI -->
                    <div id="produk-{{ $item->id }}" class="card border-0 rounded-4 p-4 p-md-5 h-100 shadow-sm hover-lift hover-rotate-icon position-relative overflow-hidden bg-white d-flex flex-column justify-content-between">
                        <div>
                            <span class="card-number-badge" style="z-index: 2;">{{ sprintf('%02d', $loop->iteration) }}</span>
                            
                            <div class="{{ $loop->index < 2 ? 'd-flex align-items-start gap-4' : '' }}">
                                <div class="mb-4 flex-shrink-0" style="width: 65px; height: 65px;">
                                    @if(Str::startsWith($item->gambar, 'fa-'))
                                        <div class="icon-box-animate bg-indigo-subtle text-indigo rounded-4 d-flex align-items-center justify-content-center w-100 h-100">
                                            <i class="{{ $item->gambar }} fs-2"></i>
                                        </div>
                                    @else
                                        <img src="{{ $item->gambar_url }}" 
                                             alt="{{ $item->nama_produk }}" 
                                             class="w-100 h-100 object-fit-cover rounded-4 shadow-sm">
                                    @endif
                                </div>

                                <div>
                                    @if($loop->index < 2)
                                        <span class="badge bg-indigo-subtle text-indigo rounded-pill px-3 py-1 mb-3 fw-semibold small">Unggulan</span>
                                    @endif
                                    <h5 class="fw-bold text-dark mb-3">{{ $item->nama_produk }}</h5>
                                    <p class="text-muted small mb-0">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 pt-2">
                            <!-- UBAH HREF DENGAN ANCHOR ID PRODUK -->
                            <a href="{{ route('produk') }}#produk-{{ $item->id }}" class="text-indigo text-decoration-none fw-semibold small hover-arrow">
                                Selengkapnya<i class="fa-solid fa-arrow-right ms-1 transition-all"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">Belum ada produk atau layanan yang ditambahkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

    <!-- SECTION ARTIKEL -->
    <section id="artikel" class="py-5 bg-white border-bottom">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-indigo fw-bold text-uppercase small tracking-wider">Artikel & Berita</span>
                <h2 class="fw-bold text-dark display-6">Wawasan Seputar Perusahaan</h2>
                <p class="text-muted">Kumpulan berita resmi, liputan kegiatan, dan informasi teknologi dari {{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }}</p>
            </div>

            <div class="row g-4">
                @forelse($artikels as $item)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden card-hover hover-lift">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <img src="{{ $item->thumbnail_url }}" 
                                     class="card-img-top w-100 h-100 object-fit-cover" 
                                     alt="{{ $item->judul }}">
                            </div>

                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="text-muted small mb-2">
                                        <i class="fa-regular fa-calendar me-1"></i> 
                                        {{ \Carbon\Carbon::parse($item->tanggal ?? $item->created_at)->translatedFormat('d F Y') }}
                                    </div>
                                    <h5 class="card-title fw-bold text-dark mb-2 line-clamp-2">
                                        {{ $item->judul }}
                                    </h5>
                                    <p class="card-text text-muted small mb-3 line-clamp-3">
                                        {{ $item->ringkasan }}
                                    </p>
                                    <div class="pt-3 border-top mt-auto hover-arrow">
                                        <a href="{{ route('artikel', $item->id) }}" class="btn btn-outline-indigo btn-sm rounded-pill w-100 fw-semibold">
                                        Baca Selengkapnya <i class="fa-solid fa-arrow-right ms-1 transition-all"></i>
                                        </a>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada artikel yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section> 

    <!-- SECTION GALERI -->
    <section id="galeri" class="py-5 bg-slate-subtle border-bottom">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-indigo fw-bold text-uppercase tracking-wider small">Dokumentasi</span>
                <h2 class="fw-bold text-dark display-6">Galeri Kegiatan</h2>
                <p class="text-muted">Aktivitas, budaya kerja, dan pengerjaan proyek tim kami</p>
            </div>
            
            <div class="row g-4">
                @forelse($galeris as $item)
                    <div class="{{ $loop->index < 2 ? 'col-lg-6' : 'col-lg-4 col-md-6' }}" data-aos="flip-left" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="galeri-card shadow-sm border-0 rounded-4 overflow-hidden position-relative" style="height: {{ $loop->index < 2 ? '340px' : '260px' }};">
                            <img src="{{ Str::startsWith($item->foto, 'http') ? $item->foto : asset('storage/' . $item->foto) }}" class="galeri-img w-100 h-100 object-fit-cover" alt="{{ $item->judul }}">
                            <div class="galeri-overlay p-4 d-flex align-items-end">
                                <div>
                                    @if($loop->index < 2)
                                        <span class="badge bg-indigo mb-2 fw-semibold">Kegiatan Utama</span>
                                    @else
                                        <span class="badge bg-indigo mb-2 fw-semibold">Dokumentasi</span>
                                    @endif
                                    <!-- FIXED TAG MISMATCH -->
                                    <h5 class="{{ $loop->index < 2 ? 'h5' : 'h6' }} galeri-title text-white fw-bold mb-0 line-clamp-2">
                                        {{ $item->judul }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">Belum ada dokumentasi galeri yang dipublikasikan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- SECTION KONTAK -->
<section id="kontak" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-indigo fw-bold text-uppercase tracking-wider small">Hubungi Kami</span>
                <h2 class="fw-bold text-dark display-6">Mulai Konsultasi</h2>
                <p class="text-muted">Punya pertanyaan atau ingin mendiskusikan kebutuhan proyek Anda?</p>
            </div>

            <div class="row g-4 align-items-stretch">
                <!-- INFORMASI KONTAK & MAPS -->
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="card border-0 shadow-lg rounded-4 p-4 h-100 bg-slate-subtle d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="fw-bold text-dark mb-4">Informasi Perusahaan</h4>
                            
                            <!-- Alamat Kantor -->
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-indigo-subtle text-indigo rounded-3 p-3 me-3 flex-shrink-0">
                                    <i class="fa-solid fa-location-dot fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Alamat Kantor</h6>
                                    <p class="text-muted small mb-0">{{ $kontak->alamat ?? 'Jl. BKR No. 212, Pasirluyu, Kec. Regol, Kota Bandung, Jawa Barat 40254' }}</p>
                                </div>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-indigo-subtle text-indigo rounded-3 p-3 me-3 flex-shrink-0">
                                    <i class="fa-solid fa-phone fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Nomor Telepon</h6>
                                    <p class="text-muted small mb-0">{{ $kontak->telepon ?? '+62 821-1234-5678' }}</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="icon-box bg-indigo-subtle text-indigo rounded-3 p-3 me-3 flex-shrink-0">
                                    <i class="fa-solid fa-envelope fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-dark">Email Resmi</h6>
                                    <p class="text-muted small mb-0">{{ $kontak->email ?? 'info@digitalsolusi.co.id' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps Embed -->
                        <div class="rounded-3 overflow-hidden shadow-sm mt-3" style="height: 200px;">
                            <iframe 
                                src="{{ $kontak->google_maps_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.627341381363!2d107.6186326!3d-6.9350352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e882b53f65b3%3A0xb35a7b746d88b48b!2sSMK%20Negeri%204%20Bandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid' }}" 
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                    <form action="{{ route('pesan.store') }}" method="POST" class="card p-4 p-md-5 border-0 shadow-lg rounded-4 bg-slate-subtle h-100 justify-content-center">
                        @csrf
                        <h4 class="fw-bold text-dark mb-4">Kirim Pesan</h4>
                        
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control form-control-lg border-0 shadow-sm rounded-3 fs-6 custom-input @error('nama') is-invalid @enderror" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-lg border-0 shadow-sm rounded-3 fs-6 custom-input @error('email') is-invalid @enderror" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Pesan / Requirement <span class="text-danger">*</span></label>
                            <textarea name="pesan" class="form-control form-control-lg border-0 shadow-sm rounded-3 fs-6 custom-input @error('pesan') is-invalid @enderror" rows="5" placeholder="Ceritakan singkat kebutuhan sistem atau jaringan Anda..." required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-indigo btn-lg w-100 shadow-sm fw-semibold rounded-3 hover-lift hover-paper-plane">
                            <i class="fa-solid fa-paper-plane me-2 transition-all"></i> Kirim Pesan Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- MODAL SUKSES -->
<div class="modal fade" id="modalSuksesPesan" tabindex="-1" aria-labelledby="modalSuksesPesanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3">
            <div class="modal-body text-center py-4">
                <div class="icon-box bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                    <i class="fa-solid fa-circle-check fs-1"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Pesan Berhasil Terkirim!</h4>
                <p class="text-muted mb-4">{{ session('success') }}</p>
                <button type="button" class="btn btn-indigo btn-lg w-100 rounded-3 fw-semibold shadow-sm" data-bs-dismiss="modal">
                    Oke, Mengerti
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tampilkanModalSukses('modalSuksesPesan', 'kontak');
    });
</script>
@endif
@endpush

@endsection