@extends('layouts.app')

@section('content')
<!-- HERO SECTION PAGE PROFIL -->
<section class="position-relative text-white py-5 d-flex align-items-center"
         style="background: linear-gradient(135deg, rgba(15, 23, 42, 0.90) 0%, rgba(30, 27, 75, 0.85) 100%), url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat; min-height: 50vh;">
    
    <div class="container py-5 mt-4 text-center position-relative" style="z-index: 2;" data-aos="fade-down">
        <span class="badge bg-indigo bg-opacity-75 backdrop-blur text-white fw-semibold px-3 py-2 rounded-pill mb-3 shadow-sm border border-light border-opacity-25">
            <i class="fa-solid fa-building me-1"></i> Mengenal Kami Lebih Dekat
        </span>
        <h1 class="display-4 fw-bold text-white mb-3" style="text-shadow: 0 3px 8px rgba(0,0,0,0.7);">
            Profil Perusahaan
        </h1>
        <p class="lead text-light mx-auto" style="max-width: 700px; text-shadow: 0 2px 5px rgba(0,0,0,0.7);">
            Komitmen kami dalam menghadirkan inovasi teknologi berkinerja tinggi serta memberikan solusi IT terbaik untuk perkembangan bisnis modern.
        </p>
    </div>

    <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden" style="line-height: 0; z-index: 2;">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="position: relative; display: block; width: calc(100% + 1.3px); height: 50px; fill: #f8fafc;">
            <path d="M0,0 C150,90 350,-40 500,40 C650,120 900,10 1200,40 L1200,120 L0,120 Z"></path>
        </svg>
    </div>
</section>

@endsection