<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan tabel terlebih dahulu agar tidak ada data ganda
        Produk::truncate();

        // 1. Web Development
        Produk::create([
            'nama_produk'  => 'Web Development',
            'kategori'     => 'Digital Solution',
            'deskripsi'    => 'Pengembangan website responsif, cepat, dan aman menggunakan framework modern Laravel & Tailwind CSS.',
            'harga'        => 3500000,
            'satuan_harga' => '/Proyek',
            'gambar'       => 'fa-solid fa-code',
            'is_populer'   => true,
            'fitur'        => [
                'Responsive UI & Glassmorphism Design',
                'Integrasi Database & API Laravel',
                'Gratis Domain & Hosting 1 Tahun',
                'Optimasi SEO & Keamanan XSS'
            ]
        ]);

        // 2. Aplikasi Mobile
        Produk::create([
            'nama_produk'  => 'Aplikasi Mobile',
            'kategori'     => 'Mobile Apps',
            'deskripsi'    => 'Pembuatan aplikasi Android & iOS berbasis Kotlin / Flutter dengan antarmuka modern & integrasi API.',
            'harga'        => 5000000,
            'satuan_harga' => '/Proyek',
            'gambar'       => 'fa-solid fa-mobile-screen-button',
            'is_populer'   => false,
            'fitur'        => [
                'Multiplatform Android & iOS',
                'Desain UI/UX Eksklusif Figma',
                'Push Notification & Auth',
                'Garansi Maintenance 3 Bulan'
            ]
        ]);

        // 3. Jaringan Komputer
        Produk::create([
            'nama_produk'  => 'Jaringan Komputer',
            'kategori'     => 'Infrastructure',
            'deskripsi'    => 'Perancangan, instalasi, dan konfigurasi arsitektur jaringan LAN/WAN serta keamanan Mikrotik & Router.',
            'harga'        => 2000000,
            'satuan_harga' => '/Lokasi',
            'gambar'       => 'fa-solid fa-network-wired',
            'is_populer'   => false,
            'fitur'        => [
                'Topology Planning & Cable Management',
                'Mikrotik & Bandwidth Management',
                'VPN & Firewall Security Setup',
                'Dokumentasi Topologi Jaringan'
            ]
        ]);

        // 4. Konsultasi IT
        Produk::create([
            'nama_produk'  => 'Konsultasi IT',
            'kategori'     => 'Advisory',
            'deskripsi'    => 'Perencanaan strategi transformasi digital, audit arsitektur sistem, serta saran infrastruktur IT perusahaan.',
            'harga'        => 1500000,
            'satuan_harga' => '/Sesi',
            'gambar'       => 'fa-solid fa-user-tie',
            'is_populer'   => true,
            'fitur'        => [
                'System Architecture Audit',
                'Rekomendasi Software & Hardware',
                'Rencana Efisiensi Biaya IT',
                'Laporan Analisis & Roadmap'
            ]
        ]);

        // 5. Cloud & Security
        Produk::create([
            'nama_produk'  => 'Cloud & Security',
            'kategori'     => 'Cloud Solutions',
            'deskripsi'    => 'Layanan migrasi server ke cloud, setup VPS/Docker, serta pengujian keamanan penetration testing.',
            'harga'        => 4000000,
            'satuan_harga' => '/Bulan',
            'gambar'       => 'fa-solid fa-shield-halved',
            'is_populer'   => false,
            'fitur'        => [
                'Migrasi AWS / DigitalOcean / GCP',
                'Pencegahan DDoS & XSS Security Audit',
                'Automated Backup & Disaster Recovery',
                'Monitoring Server 24/7'
            ]
        ]);
    }
}