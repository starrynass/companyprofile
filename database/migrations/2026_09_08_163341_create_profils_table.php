<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan')->nullable();
            
            // Informasi Sejarah
            $table->text('sejarah')->nullable();
            $table->string('gambar_sejarah')->nullable();
            
            // Visi & Misi
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            
            // Nilai Perusahaan & Chart/Metrik
            $table->text('nilai_perusahaan')->nullable();
            $table->string('chart1_judul')->nullable();
            $table->integer('chart1_persen')->default(0);
            $table->string('chart2_judul')->nullable();
            $table->integer('chart2_persen')->default(0);

            // CEO / Pimpinan Perusahaan
            $table->string('nama_ceo')->nullable();
            $table->string('jabatan_ceo')->nullable();
            $table->text('sambutan_ceo')->nullable();
            $table->string('foto_ceo')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};