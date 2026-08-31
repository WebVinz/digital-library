@extends('layouts.app')

@section('content')
<h3>Tambah User</h3>

<form method="POST" action="{{ route('user.store') }}">
@csrf
<input class="form-control mb-2" name="nis" placeholder="NIS">
<input class="form-control mb-2" name="name" placeholder="Nama">
<input class="form-control mb-2" name="kelas" placeholder="Kelas">
<input class="form-control mb-2" name="jurusan" placeholder="Jurusan">
<input class="form-control mb-2" name="email" placeholder="Email">
<input type="password" class="form-control mb-2" name="password">
<input type="password" class="form-control mb-2" name="password_confirmation">
<button class="btn btn-primary">Simpan</button>
</form>
@endsection
