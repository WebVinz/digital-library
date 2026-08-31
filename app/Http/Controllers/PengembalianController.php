<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('buku')
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->get();

        return view('pages.pengembalian.index', compact('transaksis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
        ]);

        $transaksi = Transaksi::where('id', $request->transaksi_id)
            ->where('user_id', Auth::id())
            ->where('status', 'dipinjam')
            ->firstOrFail();

        $transaksi->update([
            'status' => 'menunggu_konfirmasi',
        ]);

        return redirect()->route('pengembalian.index')
            ->with('message', 'Pengajuan pengembalian dikirim. Menunggu konfirmasi admin.');
    }

}
