<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('tanggal', 'desc')->paginate(6);
        return view('includes.artikel', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        // Mengambil artikel lain untuk rekomendasi bacaan terkait (opsional)
        $artikelLain = Artikel::where('id', '!=', $id)->limit(3)->get();
        
        return view('includes.artikel-detail', compact('artikel', 'artikelLain'));
    }
}
