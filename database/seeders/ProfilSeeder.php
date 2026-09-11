<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profil;
use App\Models\ProfilKeunggulan;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Utama Profil Perusahaan
        $profil = Profil::create([
            'nama_perusahaan' => "PT Digital Solusi Nusantara",
            'sejarah'          => "Didirikan dengan semangat inovasi, perusahaan kami berawal dari sebuah tim kecil yang berfokus pada penyediaan solusi perangkat lunak terintegrasi.\n\nSeiring berjalannya waktu, kami berkembang menjadi penyedia layanan IT terpercaya yang melayani berbagai sektor bisnis dalam mempercepat transformasi digital.",
            'gambar_sejarah'  => null, // Bisa diisi path foto jika ada di storage (misal: 'profil/sejarah.jpg')
            'visi'             => 'Menjadi perusahaan penyedia solusi teknologi informasi terdepan dan terpercaya yang memberdayakan bisnis untuk berkembang di era digital.',
            'misi'             => "1. Menghadirkan produk dan layanan IT berkualitas tinggi, aman, serta berbasis teknologi terkini.\n2. Memberikan solusi yang tepat sasaran sesuai dengan kebutuhan dan skala bisnis klien.\n3. Membangun hubungan kemitraan jangka panjang yang berlandaskan integritas dan kepuasan pelanggan.",
            'nilai_perusahaan' => "• Integritas: Menjaga kejujuran dan transparansi dalam setiap kerja sama.\n• Inovasi: Selalu beradaptasi dengan perkembangan teknologi terbaru.\n• Keunggulan: Memberikan hasil kerja terbaik dengan standar kualitas tinggi.",
            'chart1_judul'     => 'Kepuasan Klien & Pelayanan',
            'chart1_persen'    => 98,
            'chart2_judul'     => 'Ketepatan Waktu Proyek',
            'chart2_persen'    => 95,
            'nama_ceo'         => 'Raden Dinda Nasywatunnisa',
            'jabatan_ceo'      => 'Chief Executive Officer',
            'sambutan_ceo'     => 'Kami percaya bahwa teknologi bukan sekadar alat, melainkan pendorong utama kemajuan bisnis. Dedikasi kami adalah menghadirkan solusi digital berkinerja tinggi yang siap membantu Anda menjawab tantangan masa depan.',
            'foto_ceo'         => null, // Bisa diisi path foto jika ada di storage
        ]);

        // 2. Buat Data Keunggulan Perusahaan (Relasi HasMany)
        $keunggulans = [
            [
                'judul'     => 'Keamanan & Keandalan',
                'deskripsi' => 'Setiap sistem dibangun dengan standar keamanan tinggi dan performa yang stabil untuk mendukung operasional bisnis tanpa hambatan.',
                'icon'      => 'fa-solid fa-shield-halved',
            ],
            [
                'judul'     => 'Eksekusi Cepat & Tepat',
                'deskripsi' => 'Pengerjaan proyek dilakukan secara terstruktur dengan metodologi modern untuk memastikan ketepatan waktu penyampaian.',
                'icon'      => 'fa-solid fa-bolt',
            ],
            [
                'judul'     => 'Dukungan Teknis Responsif',
                'deskripsi' => 'Tim support kami siap membantu dan memberikan pendampingan teknis secara proaktif demi kelancaran sistem Anda.',
                'icon'      => 'fa-solid fa-headset',
            ],
        ];

        foreach ($keunggulans as $item) {
            ProfilKeunggulan::create([
                'profil_id' => $profil->id,
                'judul'     => $item['judul'],
                'deskripsi' => $item['deskripsi'],
                'icon'      => $item['icon'],
            ]);
        }
    }
}