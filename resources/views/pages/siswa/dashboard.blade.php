@extends('layouts.app')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold">Dashboard Siswa</h3>
        <p class="text-muted mb-0">
            Halo, <strong>{{ auth()->user()->name }}</strong> 👋  
            Selamat datang di sistem perpustakaan
        </p>
    </div>

    {{-- STATISTIC --}}
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-book-half fs-1 text-primary"></i>
                    <h6 class="mt-2">Pinjaman Aktif</h6>
                    <h2 class="fw-bold">{{ $pinjamanAktif ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-arrow-repeat fs-1 text-success"></i>
                    <h6 class="mt-2">Riwayat Peminjaman</h6>
                    <h2 class="fw-bold">{{ isset($riwayat) ? $riwayat->count() : 0 }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="bi bi-person-check fs-1 text-info"></i>
                    <h6 class="mt-2">Status Akun</h6>
                    <span class="badge bg-success px-3 py-2">Aktif</span>
                </div>
            </div>
        </div>

    </div>

    {{-- QUICK ACTION --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Aksi Cepat</h5>

            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-primary">
                    <i class="bi bi-book"></i> Pinjam Buku
                </a>

                <a href="{{ route('pengembalian.index') }}" class="btn btn-success">
                    <i class="bi bi-arrow-return-left"></i> Pengembalian
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
