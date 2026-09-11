<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_keunggulans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained('profils')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('icon')->default('fa-solid fa-star'); // Untuk ikon FontAwesome dinamis
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_keunggulans');
    }
};