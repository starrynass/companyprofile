@extends('layouts.admin')

@section('title', 'Kelola Produk & Layanan - Admin')

@section('content')
<div class="container-fluid px-0">
    <!-- Header Section -->
    <div class="mb-5 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 bg-white p-4 rounded-4 shadow-sm border border-light">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-indigo-subtle text-indigo mb-2" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.85rem; font-weight: 600;">
                <i class="fa-solid fa-layer-group"></i> Manajemen Katalog
            </div>
            <h3 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Kelola Produk & Layanan</h3>
            <p class="text-muted mb-0 small">Atur, ubah, dan perbarui daftar layanan atau produk perusahaan dengan mudah.</p>
        </div>
        <!-- Tombol Tambah Produk dengan Efek Hover -->
        <button type="button" class="btn text-white px-4 py-2.5 rounded-pill shadow-sm d-inline-flex align-items-center gap-2 fw-semibold transition-all hover-scale" 
                style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none; transition: all 0.3s ease;"
                data-bs-toggle="modal" data-bs-target="#tambahProdukModal"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(99, 102, 241, 0.35)';"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
            <i class="fa-solid fa-plus-circle fs-6"></i> Tambah Produk Baru
        </button>
    </div>

    <!-- Notifikasi Berhasil -->
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

    <!-- Tabel Daftar Produk -->
    <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
        <div class="card-header bg-transparent border-0 pt-4 px-4 pb-0 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-boxes-stacked text-indigo me-2" style="color: #6366f1;"></i>Daftar Layanan Tersedia</h5>
            <span class="badge bg-light text-secondary border px-3 py-2 rounded-pill fw-semibold">Total: {{ count($produks) }} Produk</span>
        </div>
        <div class="card-body px-4 pb-4 pt-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-secondary small text-uppercase bg-light rounded-3" style="font-size: 0.75rem; letter-spacing: 0.5px;">
                        <tr>
                            <th class="py-3 ps-3 rounded-start">No</th>
                            <th class="py-3">Nama Produk</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3">Icon / Gambar</th>
                            <th class="py-3">Populer</th>
                            <th class="py-3 text-end pe-3 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produks as $index => $item)
                            <tr class="transition-all" style="transition: background-color 0.2s ease;">
                                <td class="fw-semibold ps-3 text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark mb-0">{{ $item->nama_produk }}</div>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 250px;">{{ $item->deskripsi }}</small>
                                </td>
                                <td>
                                    <span class="badge px-3 py-1.5 rounded-pill fw-medium" style="background-color: #f1f5f9; color: #475569; border: 1px solid #e2e8f0;">
                                        {{ $item->kategori }}
                                    </span>
                                </td>
                                <td class="fw-bold text-success">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }} 
                                    <small class="text-muted fw-normal fs-7">{{ $item->satuan_harga }}</small>
                                </td>
                                <td>
                                    <div class="d-inline-flex align-items-center gap-2 px-2.5 py-1 rounded-3 bg-light border border-light">
                                        <i class="{{ $item->gambar ?? 'fa-solid fa-box' }} fs-6 text-indigo" style="color: #6366f1;"></i>
                                        <code class="text-dark small" style="font-size: 0.75rem;">{{ $item->gambar }}</code>
                                    </div>
                                </td>
                                <td>
                                    @if($item->is_populer)
                                        <span class="badge rounded-pill px-3 py-1.5" style="background-color: #fef3c7; color: #d97706; font-weight: 600;">
                                            <i class="fa-solid fa-star me-1"></i> Ya
                                        </span>
                                    @else
                                        <span class="badge rounded-pill px-3 py-1.5 bg-light text-muted fw-normal">Tidak</span>
                                    @endif
                                </td>
                                <td class="text-end pe-3">
                                    <div class="d-inline-flex gap-1">
                                        <!-- Tombol Edit -->
                                        <button type="button" class="btn btn-sm rounded-pill px-3 py-1.5 d-inline-flex align-items-center gap-1 transition-all" 
                                                style="background-color: #ede9fe; color: #6d28d9; border: none; font-weight: 500; transition: all 0.2s;"
                                                data-bs-toggle="modal" data-bs-target="#editProdukModal{{ $item->id }}"
                                                onmouseover="this.style.backgroundColor='#6d28d9'; this.style.color='#ffffff';"
                                                onmouseout="this.style.backgroundColor='#ede9fe'; this.style.color='#6d28d9';">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </button>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('admin.produk-admin.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
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

                            <!-- MODAL EDIT PRODUK -->
                            <div class="modal fade" id="editProdukModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                                        <form action="{{ route('admin.produk-admin.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header border-0 pb-0 pt-4 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                                <div>
                                                    <span class="badge bg-indigo-subtle text-indigo mb-1" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.75rem;">Edit Data</span>
                                                    <h5 class="fw-bold text-dark mb-0">Ubah Produk: {{ $item->nama_produk }}</h5>
                                                </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-4" style="background: #f8fafc;">
                                                <div class="bg-white p-4 rounded-4 shadow-sm border border-light">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label small fw-semibold text-secondary">Nama Produk</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="nama_produk" value="{{ $item->nama_produk }}" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label small fw-semibold text-secondary">Kategori</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="kategori" value="{{ $item->kategori }}" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label small fw-semibold text-secondary">Harga (Angka Saja)</label>
                                                            <input type="number" class="form-control rounded-3 py-2 bg-light border-0" name="harga" value="{{ $item->harga }}" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label small fw-semibold text-secondary">Satuan Harga</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="satuan_harga" value="{{ $item->satuan_harga }}" placeholder="Contoh: /Proyek, /Bulan" required style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label small fw-semibold text-secondary">Icon / Gambar (FontAwesome Class)</label>
                                                            <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="gambar" value="{{ $item->gambar }}" placeholder="Contoh: fa-solid fa-code" style="font-size: 0.9rem;">
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-center pt-4">
                                                            <div class="form-check form-switch ps-5">
                                                                <input class="form-check-input" type="checkbox" role="switch" id="is_populer{{ $item->id }}" name="is_populer" value="1" {{ $item->is_populer ? 'checked' : '' }} style="width: 2.5em; height: 1.25em; cursor: pointer;">
                                                                <label class="form-check-label fw-semibold small text-dark ms-2" for="is_populer{{ $item->id }}">Tandai Produk Populer</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-semibold text-secondary">Deskripsi</label>
                                                            <textarea class="form-control rounded-3 py-2 bg-light border-0" name="deskripsi" rows="3" required style="font-size: 0.9rem;">{{ $item->deskripsi }}</textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label small fw-semibold text-secondary">Fitur Layanan (Tulis per baris / enter)</label>
                                                            <textarea class="form-control rounded-3 py-2 bg-light border-0" name="fitur_string" rows="4" placeholder="Responsive UI&#10;Integrasi Database" style="font-size: 0.9rem;">{{ is_array($item->fitur) ? implode("\n", $item->fitur) : '' }}</textarea>
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
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <div class="py-4">
                                        <i class="fa-solid fa-folder-open fs-1 text-secondary opacity-50 mb-3"></i>
                                        <p class="mb-0 fw-semibold text-secondary">Belum ada data produk atau layanan yang tersedia.</p>
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

<!-- MODAL TAMBAH PRODUK -->
<div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <form action="{{ route('admin.produk-admin.store') }}" method="POST">
                @csrf
                <div class="modal-header border-0 pb-0 pt-4 px-4" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                    <div>
                        <span class="badge bg-indigo-subtle text-indigo mb-1" style="background-color: #e0e7ff; color: #4338ca; font-size: 0.75rem;">Form Baru</span>
                        <h5 class="fw-bold text-dark mb-0">Tambah Produk / Layanan Baru</h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" style="background: #f8fafc;">
                    <div class="bg-white p-4 rounded-4 shadow-sm border border-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">Nama Produk</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="nama_produk" placeholder="Contoh: Web Development" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">Kategori</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="kategori" placeholder="Contoh: Digital Solution" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">Harga (Angka Saja)</label>
                                <input type="number" class="form-control rounded-3 py-2 bg-light border-0" name="harga" placeholder="Contoh: 3500000" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">Satuan Harga</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="satuan_harga" placeholder="Contoh: /Proyek, /Bulan" required style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">Icon / Gambar (FontAwesome Class)</label>
                                <input type="text" class="form-control rounded-3 py-2 bg-light border-0" name="gambar" placeholder="Contoh: fa-solid fa-code" style="font-size: 0.9rem;">
                            </div>
                            <div class="col-md-6 d-flex align-items-center pt-4">
                                <div class="form-check form-switch ps-5">
                                    <input class="form-check-input" type="checkbox" role="switch" id="is_populer_new" name="is_populer" value="1" style="width: 2.5em; height: 1.25em; cursor: pointer;">
                                    <label class="form-check-label fw-semibold small text-dark ms-2" for="is_populer_new">Tandai Produk Populer</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">Deskripsi</label>
                                <textarea class="form-control rounded-3 py-2 bg-light border-0" name="deskripsi" rows="3" placeholder="Deskripsi singkat layanan..." required style="font-size: 0.9rem;"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">Fitur Layanan (Tulis per baris / enter)</label>
                                <textarea class="form-control rounded-3 py-2 bg-light border-0" name="fitur_string" rows="4" placeholder="Fitur 1&#10;Fitur 2&#10;Fitur 3" style="font-size: 0.9rem;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4 bg-white">
                    <button type="button" class="btn btn-light rounded-pill px-4 py-2 fw-semibold text-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn text-white rounded-pill px-4 py-2 fw-semibold shadow-sm" style="background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%); border: none;">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection