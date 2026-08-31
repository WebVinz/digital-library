@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h5 class="mb-0">
            <i class="bi bi-people-fill me-2"></i>Data User
        </h5>

        <div class="d-flex gap-2">
            {{-- SEARCH --}}
            <form action="{{ route('user.index') }}" method="GET" class="d-flex">
                <input type="text"
                    name="search"
                    class="form-control form-control-sm"
                    placeholder="Cari NIS / Nama..."
                    value="{{ $search ?? '' }}">
                <button class="btn btn-dark btn-sm ms-2">
                    <i class="bi bi-search">Cari</i>
                </button>
            </form>

            {{-- TAMBAH USER --}}
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-person-plus-fill me-1"></i>Tambah
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th width="50">No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="160">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->nis }}</td>
                    <td class="text-start">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <span class="badge 
                            {{ $user->role === 'admin' ? 'bg-danger' : 'bg-success' }}">
                            <i class="bi 
                               {{ $user->role === 'admin' ? 'bi-shield-lock-fill' : 'bi-person-fill' }}">
                            </i>
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>

                    <td>
                        <a href="{{ route('user.edit', $user->id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square">Edit</i>
                        </a>

                        <form action="{{ route('user.destroy', $user->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill">Hapus</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-muted">
                        <i class="bi bi-info-circle"></i> Data user masih kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
