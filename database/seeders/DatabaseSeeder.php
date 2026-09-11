<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $this->call([
            ProfilSeeder::class,
            ProdukSeeder::class,
            ArtikelSeeder::class,
            GaleriSeeder::class,
            UserSeeder::class,
            KontakSeeder::class
        ]);
    }
}
