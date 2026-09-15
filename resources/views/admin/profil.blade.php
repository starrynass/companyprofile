@extends('layouts.admin')

@section('title', 'Kelola Profil Perusahaan - Admin Panel')

@section('content')
<div class="mb-4 d-flex align-items-center justify-content-between">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola Profil Perusahaan</h3>
        <p class="text-muted small">Perbarui informasi perusahaan, visi misi, sejarah, hingga pesan CEO di sini.</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm border-0 mb-4" role="alert" data-aos="fade-up">
        <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-circle-check fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<form action="{{ route('admin.profil-admin.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-3 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white sticky-top" style="top: 20px;">
                <div class="d-flex align-items-center gap-2 px-3 py-2 mb-3 border-bottom">
                    <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-3 p-2 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 35px; height: 35px;">
                        <i class="fa-solid fa-sliders fs-6"></i>
                    </div>
                    <h6 class="fw-bold text-dark mb-0">Navigasi Profil</h6>
                </div>
                <div class="nav flex-column nav-pills gap-2" id="profilTab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center gap-2 shadow-sm" id="umum-tab" data-bs-toggle="pill" data-bs-target="#umum" type="button" role="tab">
                        <i class="fa-solid fa-circle-info text-indigo"></i> Informasi Umum
                    </button>
                    <button class="nav-link text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center gap-2 shadow-sm" id="visimisi-tab" data-bs-toggle="pill" data-bs-target="#visimisi" type="button" role="tab">
                        <i class="fa-solid fa-bullseye text-indigo"></i> Visi & Misi
                    </button>
                    <button class="nav-link text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center gap-2 shadow-sm" id="sejarahceo-tab" data-bs-toggle="pill" data-bs-target="#sejarahceo" type="button" role="tab">
                        <i class="fa-solid fa-book-open text-indigo"></i> Sejarah & Pesan CEO
                    </button>
                    <button class="nav-link text-start fw-semibold rounded-pill py-2.5 px-3 d-flex align-items-center gap-2 shadow-sm" id="nilaikeunggulan-tab" data-bs-toggle="pill" data-bs-target="#nilaikeunggulan" type="button" role="tab">
                        <i class="fa-solid fa-star text-indigo"></i> Nilai & Keunggulan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-lg-5 bg-white mb-4">
                <div class="tab-content" id="profilTabContent">
                    
                    <!-- TAB 1: INFORMASI UMUM -->
                    <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-circle-info fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Informasi Utama Perusahaan</h4>
                                <p class="text-muted small mb-0">Kelola identitas dasar dan statistik perusahaan yang tampil ke publik.</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="nama_perusahaan" class="form-label fw-semibold text-dark">Nama Perusahaan</label>
                            <input type="text" class="form-control rounded-3 p-3 shadow-sm border-light-subtle @error('nama_perusahaan') is-invalid @enderror" id="nama_perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}" placeholder="Contoh: PT Digital Solusi Nusantara">
                            @error('nama_perusahaan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="text-muted opacity-25 my-4">
                        <h5 class="fw-bold text-dark mb-2"><i class="fa-solid fa-chart-pie text-indigo me-2"></i>Statistik / Progress Bar (Chart)</h5>
                        <p class="text-muted small mb-4">Pengaturan nilai statistik persentase yang tampil di halaman profil web.</p>

                        <!-- Chart 1 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label for="chart1_judul" class="form-label fw-semibold small text-secondary">Judul Statistik 1</label>
                                <input type="text" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('chart1_judul') is-invalid @enderror" id="chart1_judul" name="chart1_judul" value="{{ old('chart1_judul', $profil->chart1_judul ?? '') }}" placeholder="Contoh: Kepuasan Pelanggan">
                                @error('chart1_judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="chart1_persen" class="form-label fw-semibold small text-secondary">Persen Statistik 1 (%)</label>
                                <input type="number" min="0" max="100" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('chart1_persen') is-invalid @enderror" id="chart1_persen" name="chart1_persen" value="{{ old('chart1_persen', $profil->chart1_persen ?? '') }}" placeholder="Contoh: 95">
                                @error('chart1_persen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Chart 2 -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label for="chart2_judul" class="form-label fw-semibold small text-secondary">Judul Statistik 2</label>
                                <input type="text" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('chart2_judul') is-invalid @enderror" id="chart2_judul" name="chart2_judul" value="{{ old('chart2_judul', $profil->chart2_judul ?? '') }}" placeholder="Contoh: Proyek Selesai">
                                @error('chart2_judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="chart2_persen" class="form-label fw-semibold small text-secondary">Persen Statistik 2 (%)</label>
                                <input type="number" min="0" max="100" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('chart2_persen') is-invalid @enderror" id="chart2_persen" name="chart2_persen" value="{{ old('chart2_persen', $profil->chart2_persen ?? '') }}" placeholder="Contoh: 90">
                                @error('chart2_persen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: VISI & MISI -->
                    <div class="tab-pane fade" id="visimisi" role="tabpanel" aria-labelledby="visimisi-tab">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-bullseye fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Visi & Misi Perusahaan</h4>
                                <p class="text-muted small mb-0">Tentukan arah masa depan dan tujuan strategis perusahaan.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="visi" class="form-label fw-semibold text-dark">Visi Perusahaan</label>
                            <textarea class="form-control rounded-3 p-3 shadow-sm border-light-subtle" id="visi" name="visi" rows="3" placeholder="Tuliskan visi perusahaan...">{{ old('visi', $profil->visi ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="misi" class="form-label fw-semibold text-dark">Misi Perusahaan</label>
                            <textarea class="form-control rounded-3 p-3 shadow-sm border-light-subtle" id="misi" name="misi" rows="5" placeholder="Tuliskan poin-poin misi perusahaan...">{{ old('misi', $profil->misi ?? '') }}</textarea>
                        </div>
                    </div>

                    <!-- TAB 3: SEJARAH & PESAN CEO -->
                    <div class="tab-pane fade" id="sejarahceo" role="tabpanel" aria-labelledby="sejarahceo-tab">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-book-open fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Sejarah & Pesan CEO</h4>
                                <p class="text-muted small mb-0">Rekam jejak perjalanan perusahaan serta sambutan dari pimpinan utama.</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sejarah" class="form-label fw-semibold text-dark">Sejarah Singkat</label>
                            <textarea class="form-control rounded-3 p-3 shadow-sm border-light-subtle" id="sejarah" name="sejarah" rows="4" placeholder="Ceritakan sejarah berdirinya perusahaan...">{{ old('sejarah', $profil->sejarah ?? '') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="gambar_sejarah" class="form-label fw-semibold text-dark">Gambar Sejarah</label>
                            @if(!empty($profil->gambar_sejarah))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profil->gambar_sejarah) }}" alt="Gambar Sejarah" class="rounded-3 shadow-sm border" style="max-height: 120px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('gambar_sejarah') is-invalid @enderror" id="gambar_sejarah" name="gambar_sejarah">
                            <div class="form-text small text-muted">Format: JPG, PNG, WEBP (Maks. 2MB)</div>
                            @error('gambar_sejarah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="text-muted opacity-25 my-4">

                        <div class="mb-3">
                            <label for="nama_ceo" class="form-label fw-semibold text-dark">Nama Lengkap CEO</label>
                            <input type="text" class="form-control rounded-3 p-3 shadow-sm border-light-subtle @error('nama_ceo') is-invalid @enderror" id="nama_ceo" name="nama_ceo" value="{{ old('nama_ceo', $profil->nama_ceo ?? '') }}" placeholder="Contoh: Bpk. John Doe, M.Kom">
                            @error('nama_ceo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jabatan_ceo" class="form-label fw-semibold text-dark">Jabatan CEO</label>
                            <input type="text" class="form-control rounded-3 p-3 shadow-sm border-light-subtle @error('jabatan_ceo') is-invalid @enderror" id="jabatan_ceo" name="jabatan_ceo" value="{{ old('jabatan_ceo', $profil->jabatan_ceo ?? '') }}" placeholder="Contoh: Chief Executive Officer & Founder">
                            @error('jabatan_ceo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sambutan_ceo" class="form-label fw-semibold text-dark">Pesan / Sambutan CEO</label>
                            <textarea class="form-control rounded-3 p-3 shadow-sm border-light-subtle" id="sambutan_ceo" name="sambutan_ceo" rows="4" placeholder="Sambutan atau pesan dari CEO...">{{ old('sambutan_ceo', $profil->sambutan_ceo ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="foto_ceo" class="form-label fw-semibold text-dark">Foto CEO</label>
                            @if(!empty($profil->foto_ceo))
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profil->foto_ceo) }}" alt="Foto CEO" class="rounded-circle shadow-sm border" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" class="form-control rounded-3 p-2.5 shadow-sm border-light-subtle @error('foto_ceo') is-invalid @enderror" id="foto_ceo" name="foto_ceo">
                            <div class="form-text small text-muted">Format: JPG, PNG, WEBP (Maks. 2MB)</div>
                            @error('foto_ceo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- TAB 4: NILAI & KEUNGGULAN -->
                    <div class="tab-pane fade" id="nilaikeunggulan" role="tabpanel" aria-labelledby="nilaikeunggulan-tab">
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <div class="icon-box-animate text-indigo bg-indigo-subtle rounded-4 p-3 d-inline-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width: 50px; height: 50px;">
                                <i class="fa-solid fa-star fs-4"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold text-dark mb-1">Nilai & Keunggulan Perusahaan</h4>
                                <p class="text-muted small mb-0">Tampilkan nilai inti (*core values*) dan poin keunggulan kompetitif.</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nilai_perusahaan" class="form-label fw-semibold text-dark">Nilai-Nilai Perusahaan (Core Values)</label>
                            <textarea class="form-control rounded-3 p-3 shadow-sm border-light-subtle" id="nilai_perusahaan" name="nilai_perusahaan" rows="3" placeholder="Integritas, Inovasi, Kolaborasi...">{{ old('nilai_perusahaan', $profil->nilai_perusahaan ?? '') }}</textarea>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <label class="form-label fw-semibold text-dark mb-0">Daftar Keunggulan Kompetitif</label>
                        </div>

                        <div id="keunggulan-wrapper">
                            @isset($profil)
                                @foreach($profil->keunggulan as $index => $item)
                                    <div class="card border-0 shadow-sm bg-light p-3 rounded-4 mb-3 keunggulan-item">
                                        <input type="hidden" name="keunggulan[{{ $index }}][id]" value="{{ $item->id }}">
                                        
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-dark">Judul Keunggulan</label>
                                                <input type="text" class="form-control form-control-sm rounded-3 p-2 shadow-sm border-light" name="keunggulan[{{ $index }}][judul]" value="{{ old("keunggulan.{$index}.judul", $item->judul) }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label small fw-semibold text-dark">Icon (FontAwesome)</label>
                                                <input type="text" class="form-control form-control-sm rounded-3 p-2 shadow-sm border-light" name="keunggulan[{{ $index }}][icon]" value="{{ old("keunggulan.{$index}.icon", $item->icon) }}" placeholder="Contoh: fa-solid fa-shield-halved">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label small fw-semibold text-dark">Deskripsi</label>
                                                <textarea class="form-control form-control-sm rounded-3 p-2 shadow-sm border-light" name="keunggulan[{{ $index }}][deskripsi]" rows="2" required>{{ old("keunggulan.{$index}.deskripsi", $item->deskripsi) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-top d-flex justify-content-end">
                    <button type="submit" class="btn btn-indigo rounded-pill px-5 py-2.5 fw-semibold shadow-sm hover-lift d-inline-flex align-items-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Profil
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection