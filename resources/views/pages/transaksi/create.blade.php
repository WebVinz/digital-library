@extends('layouts.app')

@section('content')
<h3 class="mb-3">
    <i class="bi bi-plus-circle"></i> Tambah Transaksi
</h3>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('transaksi.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Siswa</label>
                <select name="user_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->nis }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Buku</label>
                <select name="buku_id" class="form-select" required>
                    <option value="">-- Pilih Buku --</option>
                    @foreach($bukus as $buku)
                        <option value="{{ $buku->id }}">
                            {{ $buku->judul }} ({{ $buku->kode }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date"
                       name="tanggal_pinjam"
                       class="form-control"
                       value="{{ date('Y-m-d') }}"
                       required>
            </div>

            <button class="btn btn-success">
                <i class="bi bi-save"></i> Simpan
            </button>

            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection
