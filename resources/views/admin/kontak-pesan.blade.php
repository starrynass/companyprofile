@extends('layouts.admin')

@section('title', 'Kelola Kontak & Pesan - Admin Panel')

@section('content')
<div class="mb-4 d-flex align-items-center justify-content-between">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola Kontak & Pesan</h3>
        <p class="text-muted small">Kelola informasi kontak perusahaan dan pantau pesan masuk dari pengguna.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" role="alert">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-3 mb-4">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white sticky-top" style="top: 20px;">
            <div class="d-flex align-items-center gap-2 px-3 py-2 mb-3 border-bottom">
                <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-3 p-2 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 35px; height: 35px;">
                    <i class="fa-solid fa-sliders fs-6"></i>
                </div>
                <h6 class="fw-bold text-dark mb-0">Navigasi Menu</h6>
            </div>
            
            @php 
                $unreadCount = \App\Models\Pesan::where('is_read', 0)->count(); 
            @endphp

            <div class="nav flex-column nav-pills gap-2" id="kontakPesanTab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center justify-content-between shadow-sm" id="kontak-tab" data-bs-toggle="pill" data-bs-target="#kontak-pane" type="button" role="tab">
                    <span class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-building-shield text-indigo"></i> Info Kontak
                    </span>
                </button>
                
                <button class="nav-link text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center justify-content-between shadow-sm position-relative" id="pesan-tab" data-bs-toggle="pill" data-bs-target="#pesan-pane" type="button" role="tab">
                    <span class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-envelope-open-text text-indigo"></i> Pesan Masuk
                    </span>
                    @if($unreadCount > 0)
                        <span class="badge rounded-pill bg-danger shadow-sm">
                            {{ $unreadCount }}
                        </span>
                    @endif
                </button>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="tab-content" id="kontakPesanTabContent">
            
            <div class="tab-pane fade show active" id="kontak-pane" role="tabpanel" aria-labelledby="kontak-tab">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white mb-4">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                        <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                            <i class="fa-solid fa-address-book fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold text-dark mb-1">Informasi Kontak Perusahaan</h4>
                            <p class="text-muted small mb-0">Perbarui detail kontak, media sosial, dan peta lokasi yang tampil ke publik.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.kontak-admin.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Alamat Lengkap</label>
                            <input type="text" name="alamat" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->alamat ?? '' }}" placeholder="Contoh: Jl. Soekarno Hatta No. 123, Bandung" required>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Telepon Perusahaan</label>
                                <input type="text" name="telepon" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->telepon ?? '' }}" placeholder="Contoh: 022-1234567" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->whatsapp ?? '' }}" placeholder="Contoh: 6281234567890" required>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Email Resmi</label>
                                <input type="email" name="email" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->email ?? '' }}" placeholder="Contoh: info@perusahaan.com" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Instagram URL</label>
                                <input type="text" name="instagram" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->instagram ?? '' }}" placeholder="https://instagram.com/namaperusahaan">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">X / Twitter URL</label>
                                <input type="text" name="x" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->x ?? '' }}" placeholder="https://x.com/namaperusahaan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold text-dark">Facebook URL</label>
                                <input type="text" name="facebook" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" value="{{ $kontak->facebook ?? '' }}" placeholder="https://facebook.com/namaperusahaan">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark">Google Maps Embed (Iframe HTML)</label>
                            <textarea name="google_maps_embed" class="form-control rounded-3 p-3 shadow-sm border-light-subtle" rows="3" placeholder="Tempelkan kode iframe Google Maps di sini..." required>{{ $kontak->google_maps_embed ?? '' }}</textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-indigo rounded-pill px-4 py-2.5 fw-semibold shadow-sm">
                                <i class="fa-solid fa-floppy-disk me-2"></i> Simpan Perubahan Kontak
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab-pane fade" id="pesan-pane" role="tabpanel" aria-labelledby="pesan-tab">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white mb-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 pb-3 border-bottom gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-inbox fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Daftar Pesan Masuk</h4>
                                <p class="text-muted small mb-0">Pantau dan kelola pesan yang dikirimkan oleh pengunjung website.</p>
                            </div>
                        </div>
                        
                        <form action="{{ url()->current() }}#pesan-pane" method="GET" class="d-flex gap-2 w-100 w-md-auto">
                            <select name="status" class="form-select form-select-sm rounded-pill px-3 shadow-sm border-light-subtle">
                                <option value="">Semua Status</option>
                                <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                                <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                            </select>
                            <input type="text" name="search" class="form-control form-control-sm rounded-pill px-3 shadow-sm border-light-subtle" placeholder="Cari nama/email..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-sm btn-indigo rounded-pill px-3 shadow-sm">Filter</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light text-uppercase fs-7 text-secondary">
                                <tr>
                                    <th class="py-3">Tanggal</th>
                                    <th class="py-3">Pengirim</th>
                                    <th class="py-3">Email</th>
                                    <th class="py-3">Pesan</th>
                                    <th class="py-3 text-center">Status</th>
                                    <th class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pesans as $pesan)
                                    <tr class="{{ $pesan->is_read == 0 ? 'fw-bold bg-light' : '' }}">
                                        <td class="text-nowrap small text-muted">{{ $pesan->created_at->format('d M Y, H:i') }}</td>
                                        <td>{{ $pesan->nama }}</td>
                                        <td><a href="mailto:{{ $pesan->email }}" class="text-decoration-none text-indigo">{{ $pesan->email }}</a></td>
                                        <td>{{ Str::limit($pesan->pesan, 40) }}</td>
                                        <td class="text-center">
                                            @if($pesan->is_read == 1)
                                                <span class="badge bg-success bg-opacity-75 rounded-pill px-3 py-1.5">Dibaca</span>
                                            @else
                                                <span class="badge bg-warning text-dark rounded-pill px-3 py-1.5">Baru</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1">
                                                <button type="button" class="btn btn-sm btn-light border rounded-circle text-indigo shadow-sm" style="width: 32px; height: 32px;" data-bs-toggle="modal" data-bs-target="#detailPesanModal{{ $pesan->id }}" title="Lihat Pesan">
                                                    <i class="fa-solid fa-eye fa-xs"></i>
                                                </button>
                                                <form action="{{ route('admin.pesan-admin.destroy', $pesan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-light border rounded-circle text-danger shadow-sm" style="width: 32px; height: 32px;" title="Hapus">
                                                        <i class="fa-solid fa-trash fa-xs"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="detailPesanModal{{ $pesan->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                                <div class="modal-header border-bottom px-4 pt-4">
                                                    <h5 class="modal-title fw-bold text-dark"><i class="fa-solid fa-envelope-open text-indigo me-2"></i> Detail Pesan Masuk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start p-4">
                                                    <div class="mb-3">
                                                        <span class="text-muted small d-block">Waktu Kirim:</span>
                                                        <div class="fw-semibold text-dark">{{ $pesan->created_at->format('d M Y, H:i') }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="text-muted small d-block">Nama Pengirim:</span>
                                                        <div class="fw-semibold text-dark">{{ $pesan->nama }}</div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <span class="text-muted small d-block">Alamat Email:</span>
                                                        <div class="fw-semibold"><a href="mailto:{{ $pesan->email }}" class="text-indigo text-decoration-none">{{ $pesan->email }}</a></div>
                                                    </div>
                                                    <div class="mb-0">
                                                        <span class="text-muted small d-block">Isi Pesan:</span>
                                                        <div class="p-3 bg-light rounded-3 text-secondary mt-1 border" style="white-space: pre-line; max-height: 200px; overflow-y: auto;">{{ $pesan->pesan }}</div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top px-4 pb-4">
                                                    @if($pesan->is_read == 0)
                                                        <form action="{{ route('admin.pesan-admin.read', $pesan->id) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-success rounded-pill px-3 btn-sm shadow-sm">Tandai Dibaca</button>
                                                        </form>
                                                    @endif
                                                    <button type="button" class="btn btn-secondary rounded-pill px-4 btn-sm shadow-sm" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            <div class="py-3">
                                                <i class="fa-solid fa-inbox fa-3x text-muted opacity-50 mb-3"></i>
                                                <p class="mb-0">Belum ada pesan masuk yang ditemukan.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 d-flex justify-content-center">
                        {{ $pesans->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection