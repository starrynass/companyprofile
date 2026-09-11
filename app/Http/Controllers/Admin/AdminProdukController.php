<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk', compact('produks'));
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'harga'        => 'required|numeric|min:0',
            'satuan_harga' => 'required|string|max:255',
            'gambar'       => 'nullable|string|max:255',
            'is_populer'   => 'nullable|boolean',
            'fitur_string' => 'nullable|string', // Input string untuk fitur dipisah enter
        ]);

        // Ubah string fitur per baris menjadi array JSON
        $fiturArray = [];
        if ($request->filled('fitur_string')) {
            $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur_string)));
        }

        Produk::create([
            'nama_produk'  => $request->nama_produk,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'satuan_harga' => $request->satuan_harga,
            'gambar'       => $request->gambar,
            'is_populer'   => $request->has('is_populer') ? 1 : 0,
            'fitur'        => $fiturArray,
        ]);

        return redirect()->route('admin.produk-admin')->with('success', 'Produk / layanan berhasil ditambahkan!');
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk'  => 'required|string|max:255',
            'kategori'     => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'harga'        => 'required|numeric|min:0',
            'satuan_harga' => 'required|string|max:255',
            'gambar'       => 'nullable|string|max:255',
            'is_populer'   => 'nullable|boolean',
            'fitur_string' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($id);

        // Ubah string fitur per baris menjadi array JSON
        $fiturArray = [];
        if ($request->filled('fitur_string')) {
            $fiturArray = array_filter(array_map('trim', explode("\n", $request->fitur_string)));
        }

        $produk->update([
            'nama_produk'  => $request->nama_produk,
            'kategori'     => $request->kategori,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'satuan_harga' => $request->satuan_harga,
            'gambar'       => $request->gambar,
            'is_populer'   => $request->has('is_populer') ? 1 : 0,
            'fitur'        => $fiturArray,
        ]);

        return redirect()->route('admin.produk-admin')->with('success', 'Produk / layanan berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('admin.produk-admin')->with('success', 'Produk / layanan berhasil dihapus!');
    }
}