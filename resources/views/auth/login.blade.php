@extends('layouts.auth')

@section('content')
<div class="text-center mb-4">
    <i class="bi bi-box-arrow-in-right fs-1 text-primary"></i>
    <h4 class="fw-bold mt-2">Login</h4>
    <p class="text-muted">Masuk ke sistem perpustakaan</p>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- EMAIL --}}
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email"
            class="form-control @error('email') is-invalid @enderror"
            name="email"
            value="{{ old('email') }}"
            placeholder="contoh@email.com"
            required autofocus>

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- PASSWORD --}}
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password"
            class="form-control @error('password') is-invalid @enderror"
            name="password"
            placeholder="••••••••"
            required>

        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- REMEMBER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Ingat saya
            </label>
        </div>

        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="small">
                Lupa password?
            </a>
        @endif
    </div>

    {{-- BUTTON --}}
    <button type="submit" class="btn btn-primary w-100 mb-3">
        <i class="bi bi-box-arrow-in-right me-1"></i> Login
    </button>

    <p class="text-center text-muted mb-0">
        Belum punya akun?
        <a href="{{ route('register') }}">Register</a>
    </p>
</form>
@endsection
