<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminArtikelController extends Controller
{
    // Menampilkan daftar artikel
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('admin.artikel', compact('artikels'));
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'konten'    => 'required|string',
            'tanggal'   => 'required|date',
        ]);

        Artikel::create([
            'judul'     => $request->judul,
            'thumbnail' => $request->thumbnail,
            'ringkasan' => $request->ringkasan,
            'konten'    => $request->konten,
            'tanggal'   => $request->tanggal,
        ]);

        return redirect()->route('admin.artikel-admin')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Mengupdate artikel
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'konten'    => 'required|string',
            'tanggal'   => 'required|date',
        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->update([
            'judul'     => $request->judul,
            'thumbnail' => $request->thumbnail,
            'ringkasan' => $request->ringkasan,
            'konten'    => $request->konten,
            'tanggal'   => $request->tanggal,
        ]);

        return redirect()->route('admin.artikel-admin')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel-admin')->with('success', 'Artikel berhasil dihapus!');
    }
}