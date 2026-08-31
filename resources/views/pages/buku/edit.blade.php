@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning">
            <h5 class="mb-0">
                <i class="bi bi-pencil-square me-2"></i>Edit Buku
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('buku.update',$buku->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode" value="{{ $buku->kode }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" value="{{ $buku->pengarang }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_terbit" value="{{ $buku->tahun_terbit }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Cover Baru (Opsional)</label>
                        <input type="file" class="form-control" name="cover">
                    </div>

                    @if($buku->cover)
                    <div class="col-md-12 text-center mt-3">
                        <p class="fw-semibold">Cover Saat Ini:</p>
                        <img src="{{ Storage::url($buku->cover) }}" 
                             width="120" 
                             class="rounded shadow-sm">
                    </div>
                    @endif

                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button class="btn btn-warning">
                        <i class="bi bi-save me-1"></i>Update
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection
