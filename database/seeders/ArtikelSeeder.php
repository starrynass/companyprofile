<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat saat di-run ulang (opsional)
        Artikel::truncate();

        Artikel::create([
            'judul' => 'PT Digital Solusi Nusantara Sukses Digitalisasi Sistem Manufaktur Partner',
            'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Implementasi arsitektur cloud dan otomatisasi sistem inventaris oleh tim PT Digital Solusi Nusantara berhasil meningkatkan produktivitas rantai pasok mitra enterprise.',
            'konten' => '<p>PT Digital Solusi Nusantara kembali membuktikan komitmennya dalam mengakselerasi transformasi digital sektor industri manufaktur...</p>',
            'tanggal' => '2026-09-01',
        ]);

        Artikel::create([
            'judul' => 'Perusahaan Raih Sertifikasi Keamanan Siber & Kualitas Layanan Standar Industri',
            'thumbnail' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Pengakuan resmi atas standar keandalan infrastruktur dan proteksi data klien, memperkuat posisi perusahaan sebagai partner IT tepercaya di Indonesia.',
            'konten' => '<p>Seiring meningkatnya ancaman kejahatan siber, PT Digital Solusi Nusantara berhasil mengantongi sertifikasi ISO terkait manajemen keamanan informasi...</p>',
            'tanggal' => '2026-08-25',
        ]);

        Artikel::create([
            'judul' => 'Peluncuran Layanan Cloud Integration untuk Akselerasi Bisnis Skala Enterprise',
            'thumbnail' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Solusi infrastruktur server terkelola (Managed Service) kini hadir dengan skalabilitas fleksibel dan jaminan uptime 99.9% untuk mendukung pertumbuhan bisnis.',
            'konten' => '<p>Untuk menjawab tantangan integrasi data skala besar, kami meluncurkan paket layanan Cloud & Infrastructure Management...</p>',
            'tanggal' => '2026-08-10',
        ]);
    }
}