<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama agar tidak duplikat saat di-run ulang
        Artikel::truncate();

        Artikel::create([
            'judul' => 'PT Digital Solusi Nusantara Sukses Digitalisasi Sistem Manufaktur Partner',
            'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Implementasi arsitektur cloud dan otomatisasi sistem inventaris oleh tim PT Digital Solusi Nusantara berhasil meningkatkan produktivitas rantai pasok mitra enterprise.',
            'konten' => '<p>PT Digital Solusi Nusantara kembali membuktikan komitmennya dalam mengakselerasi transformasi digital sektor industri manufaktur di Indonesia. Melalui pendekatan arsitektur modern berbasis cloud dan integrasi sistem inventaris secara real-time, kami membantu klien enterprise menekan angka inefisiensi operasional hingga 35%.</p>
            <p>Proyek yang memakan waktu pengerjaan selama kurang lebih empat bulan ini melibatkan migrasi basis data legacy ke platform cloud terpusat yang dilengkapi sistem keamanan berlapis. Selain itu, otomatisasi alur kerja logistik membuat pemantauan stok barang menjadi jauh lebih transparan bagi para pemangku kepentingan.</p>
            <p>Direktur Utama PT Digital Solusi Nusantara menyampaikan bahwa keberhasilan ini tidak lepas dari kolaborasi erat antara tim engineering internal dan pihak mitra yang kooperatif. Kedepannya, perusahaan berencana untuk memperluas cakupan layanan digitalisasi serupa ke berbagai sektor industri strategis lainnya di tanah air.</p>',
            'tanggal' => '2026-09-01',
        ]);

        Artikel::create([
            'judul' => 'Perusahaan Raih Sertifikasi Keamanan Siber & Kualitas Layanan Standar Industri',
            'thumbnail' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Pengakuan resmi atas standar keandalan infrastruktur dan proteksi data klien, memperkuat posisi perusahaan sebagai partner IT tepercaya di Indonesia.',
            'konten' => '<p>Seiring meningkatnya kompleksitas ancaman kejahatan siber di era digital, PT Digital Solusi Nusantara dengan bangga mengumumkan keberhasilannya dalam mengantongi sertifikasi internasional terkait manajemen keamanan informasi dan kualitas tata kelola sistem IT.</p>
            <p>Audit ketat yang dilakukan oleh lembaga independen mencakup evaluasi menyeluruh terhadap protokol enkripsi data, manajemen akses pengguna, ketahanan server terhadap serangan siber, hingga standar operasional prosedur (SOP) penanganan insiden darurat. Hasil audit menunjukkan bahwa seluruh infrastruktur yang dikelola perusahaan telah memenuhi standar global terbaik.</p>
            <p>Pencapaian ini diharapkan dapat memberikan rasa aman dan kepercayaan yang semakin tinggi bagi seluruh klien, baik dari sektor pemerintahan, BUMN, maupun korporasi swasta, dalam mempercayakan pengelolaan ekosistem digital mereka kepada PT Digital Solusi Nusantara.</p>',
            'tanggal' => '2026-08-25',
        ]);

        Artikel::create([
            'judul' => 'Peluncuran Layanan Cloud Integration untuk Akselerasi Bisnis Skala Enterprise',
            'thumbnail' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Solusi infrastruktur server terkelola (Managed Service) kini hadir dengan skalabilitas fleksibel dan jaminan uptime 99.9% untuk mendukung pertumbuhan bisnis.',
            'konten' => '<p>Untuk menjawab tantangan integrasi data skala besar yang semakin kompleks bagi perusahaan modern, PT Digital Solusi Nusantara secara resmi meluncurkan lini layanan terbaru yaitu <em>Cloud Integration & Managed Infrastructure</em>.</p>
            <p>Layanan ini dirancang khusus untuk membantu perusahaan melakukan migrasi infrastruktur fisik mereka ke lingkungan cloud hibrida (hybrid cloud) tanpa mengganggu operasional harian. Dengan dukungan jaminan ketersediaan sistem <em>uptime</em> hingga 99.9%, klien dapat merasakan performa aplikasi yang lebih stabil, cepat, dan mudah disesuaikan dengan lonjakan traffic bisnis.</p>
            <p>Selain penyediaan infrastruktur, paket layanan ini juga mencakup pemantauan performa server selama 24/7 oleh tim engineer bersertifikasi, pencadangan data (backup) otomatis secara berkala, serta optimalisasi biaya operasional cloud agar lebih efisien.</p>',
            'tanggal' => '2026-08-10',
        ]);

        Artikel::create([
            'judul' => 'Pentingnya Penerapan Automated Testing dalam Siklus Pengembangan Perangkat Lunak',
            'thumbnail' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Mengenal lebih dekat bagaimana pengujian otomatis (automated testing) menggunakan tools modern dapat memangkas waktu rilis bug hingga setengahnya.',
            'konten' => '<p>Dalam dunia pengembangan perangkat lunak yang bergerak sangat cepat, kualitas produk akhir adalah harga mati. Pengujian manual konvensional seringkali memakan waktu lama dan rentan terhadap human error. Oleh karena itu, penerapan <em>automated testing</em> menjadi sebuah keharusan bagi tim developer profesional.</p>
            <p>Dengan memanfaatkan kerangka kerja pengujian modern seperti Playwright, Postman untuk otomasi API, dan integrasi Continuous Integration / Continuous Deployment (CI/CD), tim Quality Assurance dapat mendeteksi celah bug atau regresi kode secara instan setiap kali ada pembaruan sistem yang di-push ke repositori.</p>
            <p>PT Digital Solusi Nusantara secara konsisten menerapkan standar pengujian ketat ini pada setiap proyek pembuatan aplikasi web maupun mobile. Hal ini terbukti mampu meningkatkan stabilitas produk dan memberikan pengalaman pengguna (user experience) yang jauh lebih mulus tanpa kendala teknis berarti.</p>',
            'tanggal' => '2026-07-28',
        ]);

        Artikel::create([
            'judul' => 'Strategi Optimalisasi Performa Database MySQL untuk Aplikasi Berbasis Laravel',
            'thumbnail' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Tips dan trik teknis bagi para pengembang web dalam mengelola database relasional yang besar agar performa query tetap optimal dan bebas lag.',
            'konten' => '<p>Seiring bertambahnya jumlah pengguna dan volume transaksi sebuah aplikasi web, performa database seringkali menjadi bottleneck utama yang memperlambat sistem. Khusus bagi pengembang yang menggunakan framework Laravel dan basis data MySQL, pemahaman mendalam mengenai struktur query sangatlah krusial.</p>
            <p>Beberapa teknik utama yang dibahas dalam artikel ini meliputi penggunaan indexing yang tepat pada kolom tabel yang sering dicari, penerapan teknik <em>eager loading</em> untuk menghindari masalah klasik <em>N+1 query problem</em> pada Eloquent ORM, serta pemanfaatan fitur caching untuk data yang jarang berubah.</p>
            <p>Dengan menerapkan praktik-praktik optimasi database ini secara disiplin, aplikasi enterprise dapat merespons permintaan pengguna dalam hitungan milidetik, bahkan saat diakses secara bersamaan oleh ribuan pengguna aktif.</p>',
            'tanggal' => '2026-07-15',
        ]);

        Artikel::create([
            'judul' => 'Kolaborasi Teknologi & Pendidikan Vokasi Lewat Program Magang Industri',
            'thumbnail' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
            'ringkasan' => 'Komitmen perusahaan dalam menjembatani dunia pendidikan dan industri nyata melalui pembinaan talenta muda di bidang rekayasa perangkat lunak.',
            'konten' => '<p>PT Digital Solusi Nusantara percaya bahwa kemajuan industri teknologi informasi di masa depan sangat bergantung pada kualitas talenta mudanya. Sebagai bentuk tanggung jawab sosial perusahaan, kami secara aktif membuka program Praktik Kerja Lapangan (PKL) dan magang terstruktur bagi siswa SMK dan mahasiswa vokasi pilihan.</p>
            <p>Melalui program ini, para peserta tidak hanya belajar teori di atas kertas, tetapi langsung dilibatkan dalam pengerjaan proyek nyata skala korporasi di bawah bimbingan mentor berpengalaman. Mereka dibekali pengalaman langsung seputar alur kerja development standar industri, manajemen kontrol versi menggunakan Git, hingga praktik pengujian kualitas perangkat lunak (QA).</p>
            <p>Kami berharap inisiatif ini dapat terus berlanjut untuk mencetak lulusan-lulusan siap kerja yang kompeten, adaptif terhadap perkembangan teknologi, dan mampu memberikan kontribusi nyata bagi ekosistem digital nasional.</p>',
            'tanggal' => '2026-07-02',
        ]);
    }
}