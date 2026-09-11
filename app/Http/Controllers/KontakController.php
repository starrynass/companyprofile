<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::first();
        return view('includes.kontak', compact('kontak'));
    }
}