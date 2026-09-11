<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        Galeri::truncate();

        // Data 1
        Galeri::create([
            'judul' => 'Sesi Coding & Kolaborasi Tim',
            'foto'  => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 2
        Galeri::create([
            'judul' => 'Diskusi System Architecture',
            'foto'  => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 3
        Galeri::create([
            'judul' => 'Monitoring Server & Infrastructure',
            'foto'  => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 4
        Galeri::create([
            'judul' => 'Presentasi & Demo Proyek Klien',
            'foto'  => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 5
        Galeri::create([
            'judul' => 'Kegiatan Workshop & Knowledge Sharing',
            'foto'  => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 6 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Code Review Bersama Tim Senior',
            'foto'  => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 7 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Testing Aplikasi & Quality Assurance',
            'foto'  => 'https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 8 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Meeting Evaluasi Bulanan Perusahaan',
            'foto'  => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 9 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Pemasangan Jaringan & Setup Perangkat',
            'foto'  => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 10 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Sesi Brainstorming Fitur Baru',
            'foto'  => 'https://images.unsplash.com/photo-1531538606174-0f90ff5dce83?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 11 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Pelatihan Software Development',
            'foto'  => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600&auto=format&fit=crop',
        ]);

        // Data 12 (Tambahan Baru)
        Galeri::create([
            'judul' => 'Gathering & Keakraban Tim IT',
            'foto'  => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?q=80&w=600&auto=format&fit=crop',
        ]);
    }
}