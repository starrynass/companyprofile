<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Artikel;
use App\Models\Produk;
use App\Models\Galeri;
use App\Models\Kontak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->take(3)->get();
        $produks = Produk::all();
        $profils = Profil::first();
        $galeris = Galeri::latest()->take(5)->get();
        $kontak = Kontak::first();

        return view('includes.index', compact('artikels', 'produks', 'profils', 'galeris', 'kontak'));
    }
}
