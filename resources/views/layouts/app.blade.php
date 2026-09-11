<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Digital Solusi Nusantara</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 1. AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <header class="fixed-top" data-aos="fade-down" >
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container">
        <a class="navbar-brand d-flex align-item-center" href="#home">
          <i class="fa-solid fa-laptop-code me-2 fs-3 text-indigo"></i>
          <span>{{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }}</span>
        </a>

        <button class="navbar-toggler navbar-dark border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-lg-center">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profil') }}">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('produk') }}">Produk & Layanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('artikel') }}">Artikel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kontak') }}">Kontak</a>
            </li>
        </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="flex-grow-1">
      @yield('content')
  </main>

  <!-- FOOTER TERHUBUNG DATABASE -->
  <footer class="bg-dark text-white pt-5 pb-3 position-relative overflow-hidden" style="z-index: 1;">
    <div class="container pt-4" data-aos="fade-up">
        
        <div class="row g-4 mb-5">
            
            <!-- KOLOM 1: INFO PERUSAHAAN & SOSIAL MEDIA -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="bg-indigo text-white rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fa-solid fa-code fs-5"></i>
                    </div>
                    <span class="fw-bold fs-4 text-white">DigitalSolusi</span>
                </div>
                <p class="text-secondary small leading-relaxed mb-4">
                    Mitra teknologi terpercaya dalam merancang dan mengimplementasikan solusi ekosistem digital ujung ke ujung (end-to-end) dengan standar kualitas terbaik.
                </p>
                <!-- Sosmed dinamis dari database (jika tersedia, fallback ke default) -->
                <div class="d-flex gap-2">
                    <a href="https://linkedin.com/in/{{ $kontak->linkedin ?? '#' }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://github.com/{{ $kontak->github ?? '#' }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="GitHub">
                        <i class="fa-brands fa-github"></i>
                    </a>
                    <a href="https://instagram.com/{{ $kontak->instagram ?? 'digitalsolusi' }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;" title="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- KOLOM 2: NAVIGASI CEPAT -->
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-white mb-3 text-uppercase tracking-wider fs-6">Navigasi</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    <li><a href="{{ route('dashboard') }}" class="text-secondary text-decoration-none hover-white transition-all">Beranda</a></li>
                    <li><a href="{{ route('profil') }}" class="text-secondary text-decoration-none hover-white transition-all">Profil Perusahaan</a></li>
                    <li><a href="{{ route('produk') }}" class="text-secondary text-decoration-none hover-white transition-all">Produk & Layanan</a></li>
                    <li><a href="{{ route('artikel') }}" class="text-secondary text-decoration-none hover-white transition-all">Artikel & Berita</a></li>
                    <li><a href="{{ route('galeri') }}" class="text-secondary text-decoration-none hover-white transition-all">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('kontak') }}" class="text-secondary text-decoration-none hover-white transition-all">Kontak</a></li>
                </ul>
            </div>

            <!-- KOLOM 3: LAYANAN UTAMA (Dinamis dari Database Tabel Produk) -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-white mb-3 text-uppercase tracking-wider fs-6">Layanan Utama</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 small">
                    @forelse($produks ?? [] as $item)
                        <li><a href="{{ route('produk') }}" class="text-secondary text-decoration-none hover-white transition-all">{{ $item->nama_produk }}</a></li>
                    @empty
                        <li><span class="text-secondary">Belum ada layanan</span></li>
                    @endforelse
                </ul>
            </div>

            <!-- KOLOM 4: KONTAK PERUSAHAAN (Dinamis dari Database) -->
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-white mb-3 text-uppercase tracking-wider fs-6">Hubungi Kami</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 small text-secondary">
                    <li class="d-flex align-items-start gap-3">
                        <i class="fa-solid fa-location-dot text-indigo fs-5 mt-1"></i>
                        <span>{{ $kontak->alamat ?? 'Belum ada alamat perusahaan' }}</span>
                    </li>
                    <li class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-envelope text-indigo fs-5"></i>
                        <span>{{ $kontak->email ?? 'Belum ada email perusahaan' }}</span>
                    </li>
                    <li class="d-flex align-items-center gap-3">
                        <i class="fa-solid fa-phone text-indigo fs-5"></i>
                        <span>{{ $kontak->telepon ?? 'Belum ada telepon perushaan' }}</span>
                    </li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary opacity-25 my-4">

        <!-- BOTTOM BAR: COPYRIGHT & ADMIN LINK TERSEMBUNYI -->
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3 small text-secondary">
            <p class="mb-0">&copy; {{ date('Y') }} {{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }}. All rights reserved.</p>

            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-secondary text-decoration-none hover-white transition-all">Privasi</a>
                <span class="text-muted">•</span>
                <a href="#" class="text-secondary text-decoration-none hover-white transition-all">Syarat & Ketentuan</a>
                <span class="text-muted">•</span>
                
                <!-- TAUTAN LOGIN ADMIN -->
                <a href="{{ route('login') }}" class="text-secondary text-decoration-none hover-indigo transition-all opacity-75" title="Akses Internal Staff">
                    <i class="fa-solid fa-user-lock me-1 small"></i> Admin Portal
                </a>
            </div>
        </div>

    </div>
</footer>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 120
  });
</script>
</body>
</html>