<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = 'profils';

    protected $fillable = [
        'sejarah',
        'gambar_sejarah',
        'visi',
        'misi',
        'nilai_perusahaan',
        'chart1_judul',
        'chart1_persen',
        'chart2_judul',
        'chart2_persen',
        'nama_ceo',
        'jabatan_ceo',
        'sambutan_ceo',
        'foto_ceo'
    ];

    public function keunggulan()
    {
        return $this->hasMany(ProfilKeunggulan::class, 'profil_id');
    }
}