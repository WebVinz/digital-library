@extends('layouts.app')

@section('content')
<h3 class="mb-4">
    <i class="bi bi-speedometer2 me-2"></i>Dashboard Admin
</h3>

{{-- STAT CARD --}}
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-bg-primary shadow-sm">
            <div class="card-body">
                <h6>Total User</h6>
                <h3>{{ $totalUser }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-success shadow-sm">
            <div class="card-body">
                <h6>Total Buku</h6>
                <h3>{{ $totalBuku }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-warning shadow-sm">
            <div class="card-body">
                <h6>Buku Dipinjam</h6>
                <h3>{{ $bukuDipinjam }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-bg-danger shadow-sm">
            <div class="card-body">
                <h6>Total Transaksi</h6>
                <h3>{{ $totalTransaksi }}</h3>
            </div>
        </div>
    </div>
</div>

{{-- CONTENT --}}
<div class="row g-3">
    {{-- TRANSAKSI TERBARU --}}
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-arrow-left-right"></i> Transaksi Terbaru
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Buku</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiTerbaru as $t)
                        <tr>
                            <td>{{ $t->user->name }}</td>
                            <td>{{ $t->buku->judul }}</td>
                            <td>
                                @if($t->status == 'dipinjam')
                                    <span class="badge bg-warning text-dark">Dipinjam</span>
                                @else
                                    <span class="badge bg-success">Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Belum ada transaksi
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- QUICK ACTION --}}
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <i class="bi bi-lightning-charge"></i> Aksi Cepat
            </div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('buku.create') }}" class="btn btn-primary">
                    <i class="bi bi-book"></i> Tambah Buku
                </a>
                <a href="{{ route('user.create') }}" class="btn btn-success">
                    <i class="bi bi-person-plus"></i> Tambah User
                </a>
                <a href="{{ route('transaksi.create') }}" class="btn btn-warning text-dark">
                    <i class="bi bi-plus-circle"></i> Tambah Transaksi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
