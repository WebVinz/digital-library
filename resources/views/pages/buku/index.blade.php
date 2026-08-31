@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h3 class="mb-0">
            <i class="bi bi-book-fill me-2"></i>Data Buku
        </h3>

        <div class="d-flex gap-2">
            {{-- SEARCH --}}
            <form action="{{ route('buku.index') }}" method="GET" class="d-flex">
                <input type="text"
                    name="search"
                    class="form-control form-control-sm"
                    placeholder="Cari judul / kode..."
                    value="{{ $search ?? '' }}">
                <button class="btn btn-dark btn-sm ms-2">
                    <i class="bi bi-search">Cari</i>
                </button>
            </form>

            {{-- TAMBAH --}}
            <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle-fill me-1"></i>Tambah Buku
            </a>
        </div>
    </div>


    <div class="card-body">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bukus as $index => $buku)
                <tr>
                    <td>{{ $index + 1 }}</td>

                    <td>
                        @if($buku->cover)
                            <img src="{{ asset('storage/'.$buku->cover) }}"
                                 class="img-thumbnail"
                                 style="width:60px; height:80px; object-fit:cover;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>

                    <td>{{ $buku->kode }}</td>
                    <td class="text-start">{{ $buku->judul }}</td>
                    <td>{{ $buku->pengarang }}</td>
                    <td>{{ $buku->tahun }}</td>

                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('buku.destroy', $buku->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-muted">
                        Data buku belum ada
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
