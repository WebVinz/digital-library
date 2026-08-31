<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\Buku;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $transaksis = Transaksi::with(['user', 'buku'])
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('buku', function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('pages.transaksi.index', compact('transaksis', 'search'));
    }


    public function create()
    {
        $users = User::where('role', 'siswa')->orderBy('name')->get();

        $bukus = Buku::whereDoesntHave('transaksi', function ($query) {
            $query->where('status', 'dipinjam');
        })->orderBy('judul')->get();

        return view('pages.transaksi.create', compact('users', 'bukus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id'        => 'required|exists:users,id',
            'buku_id'        => 'required|exists:bukus,id',
            'tanggal_pinjam' => 'required|date',
        ]);

        // cek buku masih dipinjam atau tidak
        $dipinjam = Transaksi::where('buku_id', $request->buku_id)
            ->where('status', 'dipinjam')
            ->exists();

        if ($dipinjam) {
            return back()->with('message', 'Buku sedang dipinjam!');
        }

        Transaksi::create([
            'user_id'        => $request->user_id,
            'buku_id'        => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'status'         => 'dipinjam',
        ]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan');
            
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal_kembali' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->tanggal_kembali = $request->tanggal_kembali;
        $transaksi->status = 'dikembalikan';
        $transaksi->save();

        return redirect()->route('transaksi.index')
            ->with('message', 'Pengembalian buku berhasil');
    }

    public function approval()
    {
        $transaksis = Transaksi::with(['user', 'buku'])
            ->where('status', 'menunggu_konfirmasi')
            ->get();

        return view('admin.transaksi.approval', compact('transaksis'));
    }

    public function setujui($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'status' => 'dikembalikan',
            'tanggal_kembali' => now(),
        ]);

        return back()->with('success', 'Pengembalian disetujui.');
    }


}
