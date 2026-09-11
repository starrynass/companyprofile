<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'harga',
        'satuan_harga',
        'gambar',
        'fitur',
        'is_populer'
    ];

    protected $casts = [
        'fitur' => 'array',
        'is_populer' => 'boolean',
        'harga' => 'integer',
    ];
}