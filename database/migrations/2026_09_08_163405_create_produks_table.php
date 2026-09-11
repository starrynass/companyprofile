<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('produks');

        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kategori')->default('Layanan IT'); // Misal: Web Dev, Mobile, Cloud
            $table->text('deskripsi');
            $table->unsignedBigInteger('harga')->default(0); // Dalam Rupiah
            $table->string('satuan_harga')->default('/Proyek'); // Misal: /Proyek, /Bulan, /Tahun
            $table->string('gambar')->nullable(); // Boleh berupa path upload foto atau kelas FontAwesome (fa-solid fa-code)
            $table->json('fitur')->nullable(); // Array JSON daftar fitur unggulan produk
            $table->boolean('is_populer')->default(false); // Untuk badge "Best Value" / "Populer"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};