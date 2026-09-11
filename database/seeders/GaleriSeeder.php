<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {Galeri::truncate();

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
    }
}
