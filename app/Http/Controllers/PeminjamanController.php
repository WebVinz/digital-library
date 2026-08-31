<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // =========================
    // INDEX (LIST BUKU TERSEDIA)
    // =========================
    public function index(Request $request)
    {
        $search = $request->search;

        $bukus = Buku::with(['transaksi' => function ($q) {
                $q->whereNull('tanggal_kembali');
            }])
            ->when($search, function ($query, $search) {
                $query->where('judul', 'like', "%$search%")
                    ->orWhere('kode', 'like', "%$search%");
            })
            ->get();

        return view('pages.peminjaman.index', compact('bukus', 'search'));
    }




    // =========================
    // STORE (PINJAM BUKU)
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id'
        ]);

        $sedangDipinjam = Transaksi::where('buku_id', $request->buku_id)
            ->whereNull('tanggal_kembali')
            ->exists();

        if ($sedangDipinjam) {
            return back()->with('error', 'Buku sedang dipinjam!');
        }

        Transaksi::create([
            'user_id'         => \Illuminate\Support\Facades\Auth::id(),
            'buku_id'         => $request->buku_id,
            'tanggal_pinjam' => now(),
            'status'          => 'dipinjam',
        ]);

        return back()->with('success', 'Buku berhasil dipinjam');
    }


}
