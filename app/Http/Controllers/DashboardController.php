<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Artikel;
use App\Models\Produk;
use App\Models\Galeri;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        $produks = Produk::all();
        $profils = Profil::first();
        $galeris = Galeri::latest()->get();

        return view('includes.index', compact('artikels', 'produks', 'profils', 'galeris'));
    }
}
