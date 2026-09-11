@extends('layouts.app')

@section('content')
<!-- HERO SECTION PAGE PROFIL -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.90) 0%, rgba(30, 27, 75, 0.85) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 45vh;">
    
    <div class="container py-5 mt-4 text-center position-relative" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-building me-1"></i> Mengenal Kami Lebih Dekat
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Profil Perusahaan
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Komitmen kami dalam menghadirkan inovasi teknologi berkinerja tinggi serta memberikan solusi IT terbaik untuk perkembangan bisnis Anda.
        </p>
    </div>

    <!-- Gelombang SVG Smooth -->
    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;" data-aos="fade-up" data-aos-duration="800" >
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: 100%; height: 45px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,60 C650,160 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

<div class="position-relative bg-slate-50 overflow-hidden">

    <div class="position-absolute top-0 start-0 w-100 h-100 pointer-events-none" style="z-index: 0;">

        <div class="glow-orb position-absolute rounded-circle" 
             style="width: 550px; height: 550px; background: #6366f1; opacity: 0.12; filter: blur(120px); top: 2%; left: -10%;"></div>

        <div class="glow-orb position-absolute rounded-circle" 
             style="width: 600px; height: 600px; background: #6366f1; opacity: 0.12; filter: blur(130px); top: 25%; right: -10%;"></div>

        <div class="glow-orb position-absolute rounded-circle" 
             style="width: 600px; height: 600px; background: #6366f1; opacity: 0.12; filter: blur(130px); top: 55%; left: -12%;"></div>

        <div class="glow-orb position-absolute rounded-circle" 
             style="width: 550px; height: 550px; background: #6366f1; opacity: 0.12; filter: blur(120px); top: 82%; right: -8%;"></div>
    </div>
    <div class="position-relative" style="z-index: 1;">

        <!-- SEJARAH PERUSAHAAN -->
        <section class="py-5">
            <div class="container py-4">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="pe-lg-3">
                            <span class="text-indigo fw-bold text-uppercase tracking-wider small d-block mb-2">Perjalanan Kami</span>
                            <h2 class="fw-bold text-dark display-6 mb-4">Sejarah & Rekam Jejak</h2>
                            <div class="text-secondary lh-lg mb-4 fs-6">
                                @if(!empty($profil->sejarah))
                                    {!! nl2br(e($profil->sejarah)) !!}
                                @else
                                    <p class="text-muted fst-italic">Belum ada data sejarah perusahaan yang ditambahkan.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="position-relative">
                            <div class="p-2 bg-white rounded-4 shadow-lg border">
                                @if(!empty($profil->gambar_sejarah))
                                    <img src="{{ asset('storage/' . $profil->gambar_sejarah) }}" 
                                         alt="Gambar Sejarah Perusahaan" 
                                         class="img-fluid rounded-3 w-100 object-fit-cover" 
                                         style="max-height: 420px;">
                                @else
                                    <div class="bg-white rounded-3 d-flex align-items-center justify-content-center text-muted border" style="height: 320px;">
                                        <div class="text-center">
                                            <i class="fa-regular fa-image fs-1 mb-2 d-block opacity-50"></i>
                                            <span>Belum Ada Foto Sejarah</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SAMBUTAN & PROFIL CEO -->
        <section class="py-5 border-top border-bottom">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="text-indigo fw-bold text-uppercase tracking-wider small">Pimpinan Perusahaan</span>
                    <h2 class="fw-bold text-dark display-6">Pesan dari CEO</h2>
                </div>

                <div class="row align-items-center gy-4 justify-content-center">
                    <div class="col-lg-4 text-center" data-aos="zoom-in">
                        <div class="p-3 bg-white rounded-4 shadow-sm d-inline-block position-relative hover-lift border">
                            @if(!empty($profil->foto_ceo))
                                <img src="{{ asset('storage/' . $profil->foto_ceo) }}" 
                                     alt="Foto CEO" 
                                     class="img-fluid rounded-4 object-fit-cover" 
                                     style="width: 280px; height: 340px;">
                            @else
                                <div class="bg-white border rounded-4 d-flex align-items-center justify-content-center text-muted" style="width: 280px; height: 340px;">
                                    <div class="text-center">
                                        <i class="fa-solid fa-user-tie fs-1 mb-2 d-block opacity-50"></i>
                                        <span>Belum Ada Foto CEO</span>
                                    </div>
                                </div>
                            @endif

                            <div class="mt-3">
                                <h5 class="fw-bold text-dark mb-0">
                                    {{ $profil->nama_ceo ?? 'Belum ada nama CEO' }}
                                </h5>
                                <span class="badge bg-indigo-subtle text-indigo rounded-pill px-3 py-1 mt-1 font-monospace">
                                    {{ $profil->jabatan_ceo ?? 'Chief Executive Officer' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-left">
                        <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm position-relative">
                            <i class="fa-solid fa-quote-left display-5 text-indigo opacity-25 position-absolute top-0 start-0 ms-4 mt-3"></i>
                            <div class="position-relative z-1 pt-3">
                                <h4 class="fw-bold text-dark mb-3">Sambutan Pimpinan</h4>
                                <p class="text-secondary fs-6 leading-relaxed fst-italic">
                                    @if(!empty($profil->sambutan_ceo))
                                        "{!! nl2br(e($profil->sambutan_ceo)) !!}"
                                    @else
                                        <span class="text-muted">Belum ada sambutan dari CEO.</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VISI & MISI -->
        <section class="py-5">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="text-indigo fw-bold text-uppercase tracking-wider small">Fondasi Utama</span>
                    <h2 class="fw-bold text-dark display-6">Visi & Misi</h2>
                </div>

                <div class="row gy-4 align-items-stretch">
                    <div class="col-md-6" data-aos="fade-right">
                        <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm h-100 hover-lift hover-glow-border">
                            <div class="icon-box-animate mb-4 text-indigo bg-indigo-subtle rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-eye fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-3">Visi Kami</h3>
                            <p class="text-secondary fs-6 leading-relaxed mb-0">
                                {{ $profil->visi ?? 'Belum ada data visi.' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-left">
                        <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm h-100 hover-lift hover-glow-border">
                            <div class="icon-box-animate mb-4 text-indigo bg-indigo-subtle rounded-4 d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fa-solid fa-bullseye fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-dark mb-3">Misi Kami</h3>
                            <div class="text-secondary fs-6 leading-relaxed mb-0">
                                @if(!empty($profil->misi))
                                    {!! nl2br(e($profil->misi)) !!}
                                @else
                                    <span class="text-muted">Belum ada data misi.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- NILAI PERUSAHAAN & CHART DIAGRAM -->
        <section class="py-5 border-top border-bottom">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="text-indigo fw-bold text-uppercase tracking-wider small">Prinsip & Kinerja</span>
                    <h2 class="fw-bold text-dark display-6">Nilai & Indikator Perusahaan</h2>
                </div>

                <div class="row gy-4 align-items-center">
                    <!-- Deskripsi Nilai Perusahaan -->
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm h-100">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 55px; height: 55px;">
                                    <i class="fa-solid fa-gem fs-3"></i>
                                </div>
                                <h4 class="fw-bold text-dark mb-0">Nilai Perusahaan</h4>
                            </div>
                            <div class="text-secondary fs-6 leading-relaxed">
                                @if(!empty($profil->nilai_perusahaan))
                                    {!! nl2br(e($profil->nilai_perusahaan)) !!}
                                @else
                                    <span class="text-muted">Belum ada data nilai perusahaan.</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- 2 Metrik / Chart Diagram Bars -->
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="p-4 p-lg-5 bg-white rounded-4 border shadow-sm">
                            <h4 class="fw-bold text-dark mb-4">Pencapaian & Standardisasi</h4>

                            <!-- Chart Diagram 1 -->
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold text-dark fs-6">
                                        {{ $profil->chart1_judul ?? 'Indikator Kinerja 1' }}
                                    </span>
                                    <span class="badge bg-indigo text-white font-monospace fs-6">
                                        {{ $profil->chart1_persen ?? 0 }}%
                                    </span>
                                </div>
                                <div class="progress rounded-pill bg-slate-100 shadow-inner" style="height: 14px;">
                                    <div class="progress-bar bg-indigo progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: {{ $profil->chart1_persen ?? 0 }}%" 
                                         aria-valuenow="{{ $profil->chart1_persen ?? 0 }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100"></div>
                                </div>
                            </div>

                            <!-- Chart Diagram 2 -->
                            <div class="mb-2">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold text-dark fs-6">
                                        {{ $profil->chart2_judul ?? 'Indikator Kinerja 2' }}
                                    </span>
                                    <span class="badge bg-indigo text-white font-monospace fs-6">
                                        {{ $profil->chart2_persen ?? 0 }}%
                                    </span>
                                </div>
                                <div class="progress rounded-pill bg-slate-100 shadow-inner" style="height: 14px;">
                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" 
                                         role="progressbar" 
                                         style="width: {{ $profil->chart2_persen ?? 0 }}%" 
                                         aria-valuenow="{{ $profil->chart2_persen ?? 0 }}" 
                                         aria-valuemin="0" 
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- KEUNGGULAN PERUSAHAAN (HASMANY RELATIONSHIP) -->
        <section class="py-5">
            <div class="container py-4">
                <div class="text-center mb-5" data-aos="fade-up">
                    <span class="text-indigo fw-bold text-uppercase tracking-wider small">Mengapa Memilih Kami</span>
                    <h2 class="fw-bold text-dark display-6">Keunggulan Utama</h2>
                    <p class="text-muted">Faktor utama yang membedakan kualitas layanan dan dedikasi tim kami</p>
                </div>

                <div class="row g-4 justify-content-center">
                    @forelse($profil->keunggulan ?? [] as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                            <div class="p-4 bg-white rounded-4 border shadow-sm h-100 hover-lift hover-glow-border">
                                <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center mb-3" style="width: 55px; height: 55px;">
                                    <i class="{{ $item->icon ?? 'fa-solid fa-star' }} fs-3"></i>
                                </div>
                                <h5 class="fw-bold text-dark mb-2">
                                    {{ $item->judul }}
                                </h5>
                                <p class="text-secondary small mb-0">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-4">
                            <p class="text-muted fst-italic">Belum ada data keunggulan perusahaan yang ditambahkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

    </div>
</div>
@endsection