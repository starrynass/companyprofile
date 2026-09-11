<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Pesan;
use App\Models\Profil;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        $profil = Profil::first();
        return view('includes.kontak', compact('kontak', 'profil'));
    }
}