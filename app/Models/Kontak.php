<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontaks';
    protected $fillable = [
        'alamat', 
        'telepon', 
        'whatsapp', 
        'email', 
        'instagram', 
        'x', 
        'facebook', 
        'google_maps_embed'
    ];
}