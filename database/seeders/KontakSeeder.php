<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::create([
            'alamat' => 'Jl. BKR No. 212, Pasirluyu, Kec. Regol, Kota Bandung, Jawa Barat 40254',
            'telepon' => '+62 821-1234-5678',
            'whatsapp' => '6282112345678',
            'email' => 'info@digitalsolusi.co.id',
            'instagram' => 'digitalsolusi',
            'x' => 'digitalsolusi_id',
            'facebook' => 'digitalsolusinusantara',
            'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.627341381363!2d107.6186326!3d-6.9350352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e882b53f65b3%3A0xb35a7b746d88b48b!2sSMK%20Negeri%204%20Bandung!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid',
        ]);
    }
}
