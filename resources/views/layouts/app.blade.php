<!DOCTYPE html>
<html lang="id">
<head>
    <title>Perpustakaan</title>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
        }
        .sidebar a {
            text-decoration: none;
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Perpustakaan</span>

        <div class="text-white">
            @auth
                {{ auth()->user()->name }}
            @endauth
        </div>

    </div>
</nav>

<div class="d-flex">

    {{-- SIDEBAR --}}
    <div class="sidebar bg-light border-end p-3">
        <h5 class="mb-3">Menu</h5>

        {{-- ADMIN --}}
        @if(auth()->user()->role === 'admin')
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('buku.index') }}" class="nav-link">Data Buku</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">Data User</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link">Transaksi</a>
                </li>
            </ul>
        @endif

        {{-- SISWA --}}
        @if(auth()->user()->role === 'siswa')
            <ul class="nav flex-column gap-2">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('peminjaman.index') }}" class="nav-link">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pengembalian.index') }}" class="nav-link">Pengembalian</a>
                </li>
            </ul>
        @endif

        <hr>

        {{-- LOGOUT --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm w-100">Logout</button>
        </form>
    </div>

    {{-- CONTENT --}}
    <div class="flex-fill p-4">

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</div>

</body>
</html>
