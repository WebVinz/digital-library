<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {
            $query->where('nis', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('pages.user.index', compact('users', 'search'));
    }

    public function create()
    {
        return view('pages.user.create');
    }
    // =========================
    // STORE (TAMBAH USER)
    // =========================
    public function store(Request $request)
    {
        $this->validate($request, [
            'nis'      => 'required|unique:users,nis',
            'name'     => 'required',
            'kelas'    => 'required',
            'jurusan'  => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'nis'      => $request->nis,
            'name'     => $request->name,
            'kelas'    => $request->kelas,
            'jurusan'  => $request->jurusan,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')
            ->with('message', 'User berhasil ditambahkan');
    }

    // =========================
    // UPDATE USER
    // =========================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis'     => 'required|unique:users,nis,' . $id,
            'name'    => 'required',
            'kelas'   => 'required',
            'jurusan' => 'required',
            'role'    => 'required|in:admin,siswa',
            'email'   => 'required|email|unique:users,email,' . $id,
            'password'=> 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'nis'     => $request->nis,
            'name'    => $request->name,
            'kelas'   => $request->kelas,
            'jurusan' => $request->jurusan,
            'role'    => $request->role,
            'email'   => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.index')
            ->with('message', 'Data user berhasil diupdate');
    }


    // =========================
    // FORM EDIT USER
    // =========================
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    // =========================
    // DELETE USER
    // =========================
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('message', 'User berhasil dihapus');
    }
    }
