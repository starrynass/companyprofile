<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{

    public function index()
        {
            $pesans = Pesan::latest()->paginate(10);
            return view('admin.pesan.index', compact('pesans'));
        }

    // Memproses kirim pesan dari Landing Page (User)
    public function store(Request $request)
        {
            $request->validate([
                'nama'  => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'pesan' => 'required|string',
            ]);

            Pesan::create([
                'nama'  => $request->nama,
                'email' => $request->email,
                'pesan' => $request->pesan,
            ]);

            // Mengembalikan response dengan session 'success'
            return redirect()->back()->with('success', 'Pesan kamu sudah tersampaikan, mohon tunggu balasan!');
        }

    // Menandai pesan telah dibaca atau hapus pesan
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus.');
    }
}