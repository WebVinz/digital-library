@php
    $authWidth = 'col-md-6 col-lg-7';
@endphp

@extends('layouts.auth')


@section('content')
<div class="text-center mb-4">
    <i class="bi bi-person-plus fs-1 text-success"></i>
    <h4 class="fw-bold mt-2">Register</h4>
    <p class="text-muted">Daftar akun siswa</p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">NIS</label>
        <input type="text" name="nis" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-4">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success w-100 mb-3">
        <i class="bi bi-person-plus me-1"></i> Register
    </button>

    <p class="text-center text-muted mb-0">
        Sudah punya akun?
        <a href="{{ route('login') }}">Login</a>
    </p>
</form>
@endsection
