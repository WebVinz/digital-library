@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">

            <h3 class="mb-4 text-center">📚 Peminjaman Buku</h3>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- SEARCH --}}
            <form method="GET" action="{{ route('peminjaman.index') }}" class="mb-3">
                <div class="input-group">
                    <input 
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari judul atau kode buku..."
                        value="{{ $search }}"
                    >
                    <button class="btn btn-primary">Cari</button>
                </div>
            </form>

            {{-- TABLE --}}
            <table class="table table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Judul Buku</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($bukus as $buku)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $buku->kode }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td class="text-center">{{ now()->format('d M Y') }}</td>

                        {{-- STATUS --}}
                        <td class="text-center">
                            @if($buku->transaksi->count() > 0)
                                <span class="badge bg-danger">Sedang Dipinjam</span>
                            @else
                                <span class="badge bg-success">Tersedia</span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">
                            @if($buku->transaksi->count() > 0)
                                <button class="btn btn-secondary btn-sm" disabled>
                                    Tidak tersedia
                                </button>
                            @else
                                <form method="POST" action="{{ route('peminjaman.store') }}">
                                    @csrf
                                    <input type="hidden" name="buku_id" value="{{ $buku->id }}">
                                    <button class="btn btn-primary btn-sm">
                                        Pinjam
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Buku tidak ditemukan
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
