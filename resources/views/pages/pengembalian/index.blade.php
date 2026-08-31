@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="mb-4 text-center">📘 Pengembalian Buku</h3>

            <table class="table table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($transaksis as $t)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $t->buku->judul }}</td>
                        <td class="text-center">
                            {{ $t->created_at->format('d M Y') }}
                        </td>
                        <td class="text-center">
                            {{ now()->format('d M Y') }}
                        </td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('pengembalian.store') }}">
                                @csrf
                                <input type="hidden" name="transaksi_id" value="{{ $t->id }}">
                                <button class="btn btn-success btn-sm">
                                    Kembalikan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada buku yang sedang dipinjam
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
