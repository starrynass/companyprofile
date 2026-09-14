<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use App\Models\Pesan;
use Illuminate\Http\Request;

class AdminKontakPesanController extends Controller
{
    public function index(Request $request)
    {
        $kontak = Kontak::first();
        
        $query = Pesan::query();

        if ($request->filled('status')) {
            if ($request->status == 'read') {
                $query->where('is_read', 1);
            } elseif ($request->status == 'unread') {
                $query->where('is_read', 0);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        $pesans = $query->latest()->paginate(10)->withQueryString();

        return view('admin.kontak-pesan', compact('kontak', 'pesans'));
    }

    public function updateKontak(Request $request)
    {
        $request->validate([
            'alamat'            => 'required|string|max:255',
            'telepon'           => 'required|string|max:255',
            'whatsapp'          => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'instagram'         => 'nullable|string|max:255',
            'x'                 => 'nullable|string|max:255',
            'facebook'          => 'nullable|string|max:255',
            'google_maps_embed' => 'required|string',
        ]);

        Kontak::updateOrCreate(
            ['id' => 1],
            [
                'alamat'            => $request->alamat,
                'telepon'           => $request->telepon,
                'whatsapp'          => $request->whatsapp,
                'email'             => $request->email,
                'instagram'         => $request->instagram,
                'x'                 => $request->x,
                'facebook'          => $request->facebook,
                'google_maps_embed' => $request->google_maps_embed,
            ]
        );

        return redirect()->route('admin.kontak-pesan-admin')->with('success', 'Informasi kontak perusahaan berhasil diperbarui!');
    }

    public function markAsRead($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->update(['is_read' => 1]);

        return redirect()->back()->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroyPesan($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return redirect()->back()->with('success', 'Pesan berhasil dihapus!');
    }
}