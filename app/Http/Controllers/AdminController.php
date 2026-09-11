<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Produk;
use App\Models\Profil;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan Halaman Utam Dashboard Admin
    public function index()
    {
        // Hitung total data secara dinamis dari database
        $totalProduk = Produk::count();
        $totalArtikel = Artikel::count();
        $profil = Profil::first();

        return view('admin.dashboard', compact('totalProduk', 'totalArtikel', 'profil'));
    }
}