<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = Profil::with('keunggulan')->first();

        return view('includes.profil', compact('profil'));
    }
}
