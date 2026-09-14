<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\galeri;

class AdminGaleriController extends Controller
{
     public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri', compact('galeris'));
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'foto' => 'required|string|max:255',
        ]);

        Galeri::create([
            'judul'     => $request->judul,
            'foto' => $request->foto,
        ]);

        return redirect()->route('admin.galeri-admin')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'foto' => 'required|string|max:255',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update([
            'judul'     => $request->judul,
            'foto'      => $request->foto,
        ]);

        return redirect()->route('admin.galeri-admin')->with('success', 'Foto berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();

        return redirect()->route('admin.galeri-admin')->with('success', 'Foto berhasil dihapus!');
    }
}
