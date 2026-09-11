<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - PT Digital Solusi Nusantara')</title>
    
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS CSS (Disamakan dengan layout app) -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Custom Style Admin -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar d-flex flex-column justify-content-between shadow" data-aos="fade-right">
        <div>
            <!-- Brand Logo -->
            <div class="sidebar-brand d-flex align-items-center gap-2">
                <div class="bg-indigo text-white rounded-3 d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 36px; height: 36px;">
                    <i class="fa-solid fa-code"></i>
                </div>
                <span class="text-truncate">Admin Panel</span>
            </div>

            <!-- Menu Navigasi Sidebar Lengkap -->
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" title="Dashboard">
                        <i class="fa-solid fa-chart-pie"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link {{ request()->is('admin/home*') ? 'active' : '' }}" title="Kelola Home">
                        <i class="fa-solid fa-house"></i>
                        <span>Kelola Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profil-admin') }}" class="sidebar-link {{ request()->is('admin/profil*') ? 'active' : '' }}" title="Kelola Profil">
                        <i class="fa-solid fa-building-user"></i>
                        <span>Kelola Profil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.produk-admin') }}" class="sidebar-link {{ request()->is('admin/produk*') ? 'active' : '' }}" title="Kelola Produk">
                        <i class="fa-solid fa-archive"></i>
                        <span>Kelola Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.artikel-admin') }}" class="sidebar-link {{ request()->is('admin/artikel*') ? 'active' : '' }}" title="Kelola Artikel">
                        <i class="fa-solid fa-newspaper"></i>
                        <span>Kelola Artikel</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link {{ request()->is('admin/galeri*') ? 'active' : '' }}" title="Kelola Galeri">
                        <i class="fa-solid fa-images"></i>
                        <span>Kelola Galeri</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pesan.index') }}" class="sidebar-link {{ request()->is('admin/pesan*') ? 'active' : '' }}" title="Kelola Kontak">
                        <i class="fa-solid fa-address-book"></i>
                        <span>Kelola Kontak</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tombol Logout di Bagian Bawah Sidebar -->
        <div class="p-3 border-top border-secondary border-opacity-25 bg-dark">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-3 py-2">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="logout-text">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA (SEBELAH KANAN SIDEBAR) -->
    <div class="main-wrapper">
        
        <!-- Topbar Atas dengan Toggle Button -->
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light border-0 rounded-3 text-secondary shadow-sm" id="sidebarToggle" style="width: 40px; height: 40px;" title="Buka/Tutup Sidebar">
                    <i class="fa-solid fa-bars fs-5"></i>
                </button>
                <h6 class="fw-bold text-dark mb-0 d-none d-sm-block">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}</h6>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('dashboard') }}" target="_blank" class="btn btn-sm btn-outline-indigo rounded-pill px-3 d-none d-md-inline-flex align-items-center gap-1">
                    <i class="fa-solid fa-globe small"></i> Lihat Website
                </a>
                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-semibold shadow-sm">
                    <i class="fa-solid fa-circle text-success me-1 small animate-pulse"></i> Online
                </span>
            </div>
        </header>

        <!-- Area Isi Halaman Dashboard -->
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>

        <!-- Footer Admin (Dikonsepsikan selaras dengan footer app) -->
        <footer class="bg-white border-top py-3 px-4 text-center text-muted small mt-auto">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
                <p class="mb-0">&copy; {{ date('Y') }} <strong>{{ $profil->nama_perusahaan ?? 'Belum ada nama perusahaan' }}</strong>. All rights reserved.</p>
                <span class="text-secondary small">Admin Control Panel v2.0</span>
            </div>
        </footer>
    </div>

    <!-- Script Bootstrap, AOS, & Interaksi Toggle Sidebar -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS Animation
        AOS.init({
            duration: 800,
            once: true,
            offset: 120
        });

        // Toggle Sidebar Script
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.body.classList.toggle('sidebar-toggled');
        });
    </script>
    @stack('scripts')
</body>
</html>