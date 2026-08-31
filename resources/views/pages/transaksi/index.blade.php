@extends('layouts.app')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
    <h3 class="mb-0">
        <i class="bi bi-arrow-left-right me-2"></i>Data Transaksi
    </h3>

    <div class="d-flex gap-2">
        {{-- TAMBAH TRANSAKSI --}}
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Transaksi
        </a>

        {{-- SEARCH --}}
        <form method="GET" action="{{ route('transaksi.index') }}" class="d-flex">
            <input type="text"
                   name="search"
                   class="form-control form-control-sm"
                   placeholder="Cari nama / buku..."
                   value="{{ request('search') }}">
            <button class="btn btn-dark btn-sm ms-2">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

{{-- INFO SEARCH --}}
@if(request('search'))
    <div class="alert alert-info py-2">
        <i class="bi bi-search"></i>
        Hasil pencarian untuk:
        <strong>{{ request('search') }}</strong>
    </div>
@endif

{{-- TABLE --}}
<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered mb-0 align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($transaksis as $t)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>
                        <i class="bi bi-person-fill"></i>
                        {{ $t->user->name }}
                    </td>

                    <td>
                        <i class="bi bi-book-fill"></i>
                        {{ $t->buku->judul }}
                    </td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($t->tanggal_pinjam)->format('d-m-Y') }}
                    </td>

                    <td class="text-center">
                        @if($t->tanggal_kembali)
                            {{ \Carbon\Carbon::parse($t->tanggal_kembali)->format('d-m-Y') }}
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($t->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-hourglass-split"></i> Dipinjam
                            </span>
                        @else
                            <span class="badge bg-success">
                                <i class="bi bi-check-circle"></i> Dikembalikan
                            </span>
                        @endif
                    </td>

                    <td class="text-center">
                        @if($t->status == 'dipinjam')
                            <form method="POST"
                                  action="{{ route('transaksi.update', $t->id) }}"
                                  class="d-flex gap-1 justify-content-center">
                                @csrf
                                @method('PUT')

                                <input type="date"
                                       name="tanggal_kembali"
                                       class="form-control form-control-sm"
                                       required>

                                <button class="btn btn-success btn-sm">
                                    <i class="bi bi-arrow-repeat">Update</i>
                                </button>
                            </form>
                        @else
                            <span class="text-muted">Selesai</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        <i class="bi bi-inbox"></i> Data transaksi belum ada
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
