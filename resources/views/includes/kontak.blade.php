@extends('layouts.app')

@section('content')
<!-- HERO SECTION KONTAK -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 27, 75, 0.90) 100%), url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 45vh;">
    
    <div class="container py-5 text-center position-relative mb-4" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-headset me-1"></i> Layanan Bantuan & Konsultasi
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Hubungi Tim Kami
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Kami siap mendiskusikan kebutuhan sistem, jaringan, dan solusi digital perusahaan Anda kapan saja.
        </p>
    </div>

    <!-- Gelombang SVG Smooth -->
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: 100%; height: 45px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<!-- MAIN SECTION DETAIL & FORM -->
<div class="position-relative bg-slate-50 py-5 overflow-hidden">
    
    <div class="container position-relative py-4" style="z-index: 1;">
        <div class="row g-4 align-items-stretch">
            
            <!-- INFORMASI KONTAK & SOSMED LENGKAP -->
            <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                <div class="card border-0 shadow-lg rounded-4 p-4 p-md-4 h-100 bg-white d-flex flex-column justify-content-between">
                    <div>
                        <!-- Header Kantor Pusat (Icon Bulat & Animasi Hover) -->
                        <div class="d-flex align-items-center mb-4 p-2 rounded-3">
                            <div class="icon-circle bg-indigo text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 shadow-sm" style="width: 55px; height: 55px;">
                                <i class="fa-solid fa-building-shield fs-5"></i>
                            </div>
                            <div>
                                <span class="text-indigo fw-bold small text-uppercase tracking-wider">Kantor Pusat</span>
                                <h4 class="fw-bold text-dark mb-0">{{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }}</h4>
                            </div>
                        </div>
                        
                        <!-- Alamat (Icon Bulat) -->
                        <div class="d-flex align-items-start mb-3 p-3 rounded-3 contact-item-hover">
                            <div class="icon-circle bg-indigo text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-location-dot fs-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Alamat Lengkap</h6>
                                <p class="text-muted small mb-0">{{ $kontak->alamat ?? 'Jl. BKR No. 212, Pasirluyu, Kec. Regol, Kota Bandung, Jawa Barat 40254' }}</p>
                            </div>
                        </div>

                        <!-- Telepon (Icon Bulat) -->
                        <div class="d-flex align-items-start mb-3 p-3 rounded-3 contact-item-hover">
                            <div class="icon-circle bg-indigo text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-phone fs-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Telepon Perusahaan</h6>
                                <p class="text-muted small mb-0">{{ $kontak->telepon ?? '+62 821-1234-5678' }}</p>
                            </div>
                        </div>

                        <!-- Email (Icon Bulat) -->
                        <div class="d-flex align-items-start mb-4 p-3 rounded-3 contact-item-hover">
                            <div class="icon-circle bg-indigo text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0 shadow-sm" style="width: 45px; height: 45px;">
                                <i class="fa-solid fa-envelope fs-6"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Email Resmi</h6>
                                <p class="text-muted small mb-0">{{ $kontak->email ?? 'info@digitalsolusi.co.id' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL SOSIAL MEDIA (Bulat & Animasi Hover) -->
                    <div class="mt-2 pt-3 border-top">
                        <p class="fw-bold text-dark small mb-3"><i class="fa-solid fa-bolt text-warning me-1"></i> Terhubung dengan Kami:</p>
                        
                        <div class="d-flex justify-content-around align-items-center text-center px-2">
                            <!-- WhatsApp -->
                            <a href="https://wa.me/{{ $kontak->whatsapp ?? '6282112345678' }}" target="_blank" class="social-icon-btn text-success" title="WhatsApp">
                                <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center bg-success-subtle mx-auto mb-1" style="width: 50px; height: 50px;">
                                    <i class="fa-brands fa-whatsapp fs-4 text-success"></i>
                                </div>
                                <span class="d-block text-muted" style="font-size: 11px; font-weight: 500;">WhatsApp</span>
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com/{{ $kontak->instagram ?? 'digitalsolusi' }}" target="_blank" class="social-icon-btn text-danger" title="Instagram">
                                <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center mx-auto mb-1 text-white" style="width: 50px; height: 50px; background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">
                                    <i class="fa-brands fa-instagram fs-4"></i>
                                </div>
                                <span class="d-block text-muted" style="font-size: 11px; font-weight: 500;">Instagram</span>
                            </a>

                            <!-- X (Twitter) -->
                            <a href="https://twitter.com/{{ $kontak->x ?? 'digitalsolusi' }}" target="_blank" class="social-icon-btn text-dark" title="X (Twitter)">
                                <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center bg-dark text-white mx-auto mb-1" style="width: 50px; height: 50px;">
                                    <i class="fa-brands fa-x-twitter fs-4"></i>
                                </div>
                                <span class="d-block text-muted" style="font-size: 11px; font-weight: 500;">X / Twitter</span>
                            </a>

                            <!-- Facebook -->
                            <a href="https://facebook.com/{{ $kontak->facebook ?? 'digitalsolusi' }}" target="_blank" class="social-icon-btn text-primary" title="Facebook">
                                <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center text-white mx-auto mb-1" style="width: 50px; height: 50px; background-color: #1877f2;">
                                    <i class="fa-brands fa-facebook fs-4"></i>
                                </div>
                                <span class="d-block text-muted" style="font-size: 11px; font-weight: 500;">Facebook</span>
                            </a>

                            <!-- Telepon -->
                            <a href="tel:{{ $kontak->telepon ?? '+6282112345678' }}" class="social-icon-btn text-secondary" title="Telepon">
                                <div class="rounded-circle shadow-sm d-flex align-items-center justify-content-center bg-secondary text-white mx-auto mb-1" style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-phone-volume fs-5"></i>
                                </div>
                                <span class="d-block text-muted" style="font-size: 11px; font-weight: 500;">Telepon</span>
                            </a>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <div class="rounded-4 overflow-hidden shadow-sm mt-4 border" style="height: 180px;">
                        <iframe 
                            src="{{ $kontak->google_maps_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.627341381363!2d107.6186326!3d-6.9350352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e882b53f65b3%3A0xb35a7b746d88b48b!2sSMK%20Negeri%204%20Bandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid' }}" 
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- FORM HUBUNGI KAMI -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                <form action="{{ route('pesan.store') }}" method="POST" class="card p-4 p-md-5 border-0 shadow-lg rounded-4 bg-white h-100 justify-content-between">
                    @csrf
                    <div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-indigo-subtle text-indigo px-3 py-1.5 rounded-pill fw-semibold small">
                                <i class="fa-solid fa-paper-plane me-1"></i> Kirim Pesan Langsung
                            </span>
                        </div>
                        <h3 class="fw-bold text-dark mb-2">Diskusikan Proyek Anda</h3>
                        <p class="text-muted small mb-4">Isi form di bawah ini dan tim engineer kami akan segera menghubungi Anda kembali dalam waktu 1x24 jam.</p>
                        
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark small">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control form-control-lg border-1 bg-light shadow-none rounded-3 fs-6 @error('nama') is-invalid @enderror" placeholder="Masukkan nama Anda" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark small">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control form-control-lg border-1 bg-light shadow-none rounded-3 fs-6 @error('email') is-invalid @enderror" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Pesan / Requirement Proyek <span class="text-danger">*</span></label>
                            <textarea name="pesan" class="form-control form-control-lg border-1 bg-light shadow-none rounded-3 fs-6 @error('pesan') is-invalid @enderror" rows="6" placeholder="Ceritakan singkat kebutuhan sistem, web application, atau jaringan Anda..." required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-indigo btn-lg w-100 shadow-sm fw-semibold rounded-3 hover-lift py-3 hover-paper-plane">
                        <i class="fa-solid fa-paper-plane me-2 transition-all"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- MODAL SUKSES -->
@if(session('success'))
<div class="modal fade show" id="modalSuksesPesan" tabindex="-1" aria-labelledby="modalSuksesPesanLabel" aria-modal="true" role="dialog" style="display: block; background: rgba(0,0,0,0.5); backdrop-filter: blur(5px);">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 p-3 animate-zoom">
            <div class="modal-body text-center py-4">
                <div class="bg-success-subtle text-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 75px; height: 75px;">
                    <i class="fa-solid fa-circle-check fs-1"></i>
                </div>
                <h4 class="fw-bold text-dark mb-2">Pesan Berhasil Terkirim!</h4>
                <p class="text-muted mb-4 small">{{ session('success') }}</p>
                <button type="button" class="btn btn-indigo btn-lg w-100 rounded-3 fw-semibold shadow-sm" onclick="this.closest('.modal').style.display='none'">
                    Oke, Mengerti
                </button>
            </div>
        </div>
    </div>
</div>
@endif

<style>
    .hover-shadow { transition: all 0.3s ease; }
    .hover-shadow:hover { background: #ffffff !important; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.08) !important; transform: translateY(-2px); }
    .hover-lift { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 1rem 1.5rem rgba(99, 102, 241, 0.2) !important; }

    /* Efek Hover Kontak Item */
    .contact-item-hover {
        transition: all 0.3s ease;
    }
    .contact-item-hover:hover {
        background-color: #f8fafc !important;
        transform: translateX(5px);
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.04);
    }
    .contact-item-hover:hover .icon-circle {
        transform: scale(1.1) rotate(6deg);
        background-color: #4f46e5 !important;
        box-shadow: 0 0.5rem 1rem rgba(79, 70, 229, 0.3) !important;
    }
    .icon-circle {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    /* Efek Hover Logo Sosmed Bulat */
    .social-icon-btn {
        text-decoration: none;
        transition: transform 0.2s ease;
    }
    .social-icon-btn:hover {
        transform: translateY(-4px);
    }
    .social-icon-btn:hover div {
        transform: scale(1.12);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .social-icon-btn div {
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }
</style>
@endsection