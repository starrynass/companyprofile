<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - DigitalSolusi')</title>
    <!-- Bootstrap 5 CSS & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --primary-indigo: #6366f1;
            --hover-indigo: #4f46e5;
        }

        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1e293b;
            color: #fff;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-menu {
            padding: 1rem 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            width: 24px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .sidebar-link:hover, .sidebar-link.active {
            color: #fff;
            background-color: var(--primary-indigo);
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar Header */
        .topbar {
            height: 64px;
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR KIRI -->
    <aside class="sidebar d-flex flex-column justify-content-between">
        <div>
            <!-- Brand Logo -->
            <div class="sidebar-brand d-flex align-items-center gap-2">
                <div class="bg-indigo text-white rounded-3 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                    <i class="fa-solid fa-code"></i>
                </div>
                <span>Admin Panel</span>
            </div>

            <!-- Menu Navigasi Sidebar -->
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-building-user"></i> Kelola Profil
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-box-archive"></i> Kelola Produk
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-link">
                        <i class="fa-solid fa-newspaper"></i> Kelola Artikel
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tombol Logout di Bagian Bawah Sidebar -->
        <div class="p-3 border-top border-secondary opacity-75">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-3">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA (SEBELAH KANAN SIDEBAR) -->
    <div class="main-wrapper">
        
        <!-- Topbar Atas -->
        <header class="topbar">
            <h6 class="fw-bold text-dark mb-0">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}</h6>
            <div class="d-flex align-items-center gap-2">
                <span class="badge bg-indigo-subtle text-indigo px-3 py-2 rounded-pill fw-semibold">
                    <i class="fa-solid fa-circle text-success me-1 small"></i> Online
                </span>
            </div>
        </header>

        <!-- Area Isi Halaman Dashboard -->
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>

    </div>

    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>