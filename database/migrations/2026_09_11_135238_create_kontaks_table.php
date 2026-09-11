<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('alamat');
            $table->string('telepon');
            $table->string('whatsapp');
            $table->string('email');
            $table->string('instagram')->nullable();
            $table->string('x')->nullable();     
            $table->string('facebook')->nullable(); 
            $table->text('google_maps_embed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};