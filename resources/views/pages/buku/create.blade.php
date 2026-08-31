@extends('layouts.app')

@section('content')
<h3>Tambah Buku</h3>

<form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
@csrf
<input class="form-control mb-2" name="kode" required>
<input class="form-control mb-2" name="judul" required>
<input class="form-control mb-2" name="pengarang" required>
<input class="form-control mb-2" name="penerbit" required>
<input class="form-control mb-2" name="tahun" required>
<input type="file" class="form-control mb-2" name="cover" required>
<button class="btn btn-primary">Simpan</button>
</form>
@endsection
