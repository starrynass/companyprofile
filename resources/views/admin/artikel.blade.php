@extends('layouts.admin')

@section('title', 'Kelola Artikel - Admin')

@section('content')
<div class="container-fluid px-0">
    <div class="mb-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 bg-white p-4 rounded-4 shadow-sm border border-light">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-indigo-subtle text-indigo mb-2" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.85rem; font-weight: 600;">
                <i class="fa-solid fa-newspaper"></i> Manajemen Konten
            </div>
            <h3 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Kelola Artikel & Berita</h3>
            <p class="text-muted mb-0 small">Tambah, ubah, dan kelola publikasi artikel perusahaan dengan mudah.</p>
        </div>
        <button type="button" class="btn text-white px-4 py-2.5 rounded-pill shadow-sm d-inline-flex align-items-center gap-2 fw-semibold transition-all hover-scale btn-indigo"
                data-bs-toggle="modal" data-bs-target="#tambahArtikelModal">
            <i class="fa-solid fa-plus-circle fs-6"></i> Tambah Artikel Baru
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4 p-4 text-white d-flex align-items-center justify-content-between" 
             style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);" role="alert">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-white text-success rounded-circle p-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 36px; height: 36px;">
                    <i class="fa-solid fa-check fs-5"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Berhasil!</h6>
                    <small style="opacity: 0.9;">{{ session('success') }}</small>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-book-open text-indigo me-2" style="color: #6366f1;"></i>Daftar Artikel Publikasi</h5>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">Total: {{ count($artikels) }} Artikel</span>
        </div>
        <div class="card-body px-4 pb-4 pt-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-secondary small text-uppercase bg-light rounded-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                        <tr>
                            <th class="py-3 ps-3 rounded-start">No</th>
                            <th class="py-3">Judul Artikel</th>
                            <th class="py-3">Thumbnail / Gambar</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3 text-end pe-3 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($artikels as $index => $item)
                            <tr class="transition-all" style="transition: background-color 0.2s ease;">
                                <td class="fw-semibold ps-3 text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark mb-0">{{ $item->judul }}</div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 300px;">{{ $item->ringkasan }}</small>
                                </td>
                                <td>
                                    <div class="d-inline-flex align-items-center gap-2 px-2.5 py-1 rounded-3 bg-light border border-light">
                                        <i class="fa-solid fa-image text-indigo fs-6" style="color: #6366f1;"></i>
                                        <code class="text-dark small" style="font-size: 0.75rem;">{{ $item->thumbnail }}</code>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2.5 py-1.5 fw-medium">
                                        <i class="fa-regular fa-calendar-days me-1 text-muted"></i> {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                                    </span>
                                </td>
                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-1">
                                        <button type="button" class="btn btn-sm rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1 transition-all" 
                                                style="background-color: #ede9fe; color: #6d28d9; border: none; font-weight: 500; transition: all 0.2s;"
                                                data-bs-toggle="modal" data-bs-target="#editArtikelModal{{ $item->id }}"
                                                onmouseover="this.style.backgroundColor='#6d28d9'; this.style.color='#ffffff';"
                                                onmouseout="this.style.backgroundColor='#ede9fe'; this.style.color='#6d28d9';">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </button>
                                        <form action="{{ route('admin.artikel-admin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1 transition-all" 
                                                    style="background-color: #fee2e2; color: #dc2626; border: none; font-weight: 500; transition: all 0.2s;"
                                                    onmouseover="this.style.backgroundColor='#dc2626'; this.style.color='#ffffff';"
                                                    onmouseout="this.style.backgroundColor='#fee2e2'; this.style.color='#dc2626';">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="editArtikelModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                                        <form action="{{ route('admin.artikel-admin.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header border-0 pb-0 pt-4 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                                <div>
                                                    <span class="badge bg-indigo-subtle text-indigo mb-1" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.75rem;">Edit Artikel</span>
                                                    <h5 class="fw-bold text-dark mb-0">Ubah Artikel: {{ $item->judul }}</h5>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4" style="background: #f8fafc;">
                                                <div class="bg-white p-4 rounded-4 shadow-sm border border-light">
                                                    <div class="row g-3">
                                                        <div class="col-md-8">
                                                            <label class="form-label small fw-semibold text-secondary">Judul Artikel</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="judul" value="{{ $item->judul }}" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label class="form-label small fw-semibold text-secondary">Tanggal Publikasi</label>
                                                            <input type="date" class="form-control rounded-3 py-2 bg-light border-0" name="tanggal" value="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y-m-d') }}" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-semibold text-secondary">Thumbnail (Nama File / URL Gambar)</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="thumbnail" value="{{ $item->thumbnail }}" placeholder="Contoh: artikel-1.jpg" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-semibold text-secondary">Ringkasan Singkat</label>
                                                            <textarea class="form-control rounded-3 py-2 bg-light border-0" name="ringkasan" rows="2" required style="font-size: 0.9rem;">{{ $item->ringkasan }}</textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-semibold text-secondary">Konten Lengkap</label>
                                                            <textarea class="form-control rounded-3 py-2 bg-light border-0" name="konten" rows="5" required style="font-size: 0.9rem;">{{ $item->konten }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 pb-4 px-4 bg-white">
                                                <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none;">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <div class="py-4">
                                        <i class="fa-solid fa-folder-open fs-1 text-secondary opacity-50 mb-3"></i>
                                        <p class="mb-0 fw-semibold text-secondary">Belum ada data artikel yang tersedia.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahArtikelModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <form action="{{ route('admin.artikel-admin.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 pb-0 pt-4 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                    <div>
                        <span class="badge bg-indigo-subtle text-indigo mb-1" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.75rem;">Form Baru</span>
                        <h5 class="fw-bold text-dark mb-0">Tambah Artikel Baru</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" style="background: #f8fafc;">
                    <div class="bg-white p-4 rounded-4 shadow-sm border border-light">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label class="form-label small fw-semibold text-secondary">Judul Artikel</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="judul" placeholder="Contoh: Perkembangan Teknologi AI 2026" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small fw-semibold text-secondary">Tanggal Publikasi</label>
                                <input type="date" class="form-control rounded-3 py-2 bg-light border-0" name="tanggal" value="{{ date('Y-m-d') }}" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">Thumbnail (Nama File / URL Gambar)</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="thumbnail" placeholder="Contoh: artikel-1.jpg" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">Ringkasan Singkat</label>
                                <textarea class="form-control rounded-3 py-2 bg-light border-0" name="ringkasan" rows="2" placeholder="Ringkasan atau excerpt artikel..." required style="font-size: 0.9rem;"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">Konten Lengkap</label>
                                <textarea class="form-control rounded-3 py-2 bg-light border-0" name="konten" rows="5" placeholder="Tulis isi konten artikel lengkap di sini..." required style="font-size: 0.9rem;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4 bg-white">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none;">Simpan Artikel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection