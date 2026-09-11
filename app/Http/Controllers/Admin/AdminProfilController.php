<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\ProfilKeunggulan;

class AdminProfilController extends Controller
{
    // Menampilkan halaman kelola profil
    public function index()
    {
        // Ambil data profil pertama (karena profil perusahaan biasanya hanya ada 1 baris data)
        $profil = Profil::with('keunggulan')->first();
        return view('admin.profil', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan'  => 'required|string|max:255',
            'sejarah'          => 'nullable|string',
            'gambar_sejarah'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'visi'             => 'nullable|string',
            'misi'             => 'nullable|string',
            'nilai_perusahaan' => 'nullable|string',
            // Chart Validation
            'chart1_judul'     => 'nullable|string|max:255',
            'chart1_persen'    => 'nullable|integer|min:0|max:100',
            'chart2_judul'     => 'nullable|string|max:255',
            'chart2_persen'    => 'nullable|integer|min:0|max:100',
            // CEO & Sambutan
            'nama_ceo'         => 'nullable|string|max:255',
            'jabatan_ceo'      => 'nullable|string|max:255',
            'sambutan_ceo'     => 'nullable|string',
            'foto_ceo'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            // Validasi keunggulan
            'keunggulan.*.id'    => 'nullable|exists:profil_keunggulans,id',
            'keunggulan.*.judul' => 'required|string|max:255',
            'keunggulan.*.icon'  => 'nullable|string|max:255',
            'keunggulan.*.deskripsi' => 'required|string',
        ]);

        // Ambil data profil lama (jika ada) untuk pengecekan file gambar
        $profil = Profil::first();

        // Handle Upload Gambar Sejarah
        $gambarSejarahName = $profil->gambar_sejarah ?? null;
        if ($request->hasFile('gambar_sejarah')) {
            if ($profil && $profil->gambar_sejarah && file_exists(public_path('storage/' . $profil->gambar_sejarah))) {
                unlink(public_path('storage/' . $profil->gambar_sejarah));
            }
            $gambarSejarahName = $request->file('gambar_sejarah')->store('profil', 'public');
        }

        // Handle Upload Foto CEO
        $fotoCeoName = $profil->foto_ceo ?? null;
        if ($request->hasFile('foto_ceo')) {
            if ($profil && $profil->foto_ceo && file_exists(public_path('storage/' . $profil->foto_ceo))) {
                unlink(public_path('storage/' . $profil->foto_ceo));
            }
            $fotoCeoName = $request->file('foto_ceo')->store('profil', 'public');
        }

        // Update atau Buat profil utama
        $profil = Profil::updateOrCreate(
            ['id' => 1],
            [
                'nama_perusahaan'  => $request->nama_perusahaan,
                'sejarah'          => $request->sejarah,
                'gambar_sejarah'   => $gambarSejarahName,
                'visi'             => $request->visi,
                'misi'             => $request->misi,
                'nilai_perusahaan' => $request->nilai_perusahaan,
                'chart1_judul'     => $request->chart1_judul,
                'chart1_persen'    => $request->chart1_persen,
                'chart2_judul'     => $request->chart2_judul,
                'chart2_persen'    => $request->chart2_persen,
                'nama_ceo'         => $request->nama_ceo,
                'jabatan_ceo'      => $request->jabatan_ceo,
                'sambutan_ceo'     => $request->sambutan_ceo,
                'foto_ceo'         => $fotoCeoName,
            ]
        );

        // Update atau Buat data keunggulan
        if ($request->has('keunggulan')) {
            foreach ($request->keunggulan as $item) {
                ProfilKeunggulan::updateOrCreate(
                    ['id' => $item['id'] ?? null],
                    [
                        'profil_id' => $profil->id,
                        'judul'     => $item['judul'],
                        'icon'      => $item['icon'],
                        'deskripsi' => $item['deskripsi'],
                    ]
                );
            }
        }

        return redirect()->route('admin.profil-admin')->with('success', 'Profil dan keunggulan perusahaan berhasil diperbarui!');
    }

}