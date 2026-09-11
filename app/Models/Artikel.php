<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikels';

    // Kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'id',
        'judul',
        'thumbnail',
        'ringkasan',
        'konten',
        'tanggal',
    ];

    // Casting atribut tanggal ke Carbon instance
    protected $casts = [
        'tanggal' => 'date',
    ];

    public function getThumbnailUrlAttribute()
    {
        if (!$this->thumbnail) {
            return asset('assets/images/default-thumbnail.jpg'); // Gambar default jika thumbnail kosong
        }

        if (Str::startsWith($this->thumbnail, ['http://', 'https://'])) {
            return $this->thumbnail; // Jika menggunakan URL eksternal
        }

        return asset('storage/' . $this->thumbnail); // Path file dari storage Laravel
    }
}
