@extends('layouts.app')

@section('content')
<h3 class="mb-4">
    <i class="bi bi-pencil-square"></i> Edit User
</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">NIS</label>
                    <input type="text" name="nis" value="{{ $user->nis }}"
                           class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}"
                           class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Kelas</label>
                    <input type="text" name="kelas" value="{{ $user->kelas }}"
                           class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Jurusan</label>
                    <input type="text" name="jurusan" value="{{ $user->jurusan }}"
                           class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>
                        <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>
                            Siswa
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}"
                           class="form-control" required>
                </div>

                <hr class="my-4">

                <div class="col-md-6">
                    <label class="form-label">
                        Password Baru
                        <small class="text-muted">(opsional)</small>
                    </label>
                    <input type="password" name="password"
                           class="form-control"
                           placeholder="Isi jika ingin ganti password">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                           class="form-control"
                           placeholder="Ulangi password">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Update
                </button>

                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
