<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    // TAMPIL DATA
    public function index(Request $request)
    {
        $search = $request->search;

        $bukus = Buku::when($search, function ($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kode', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('pages.buku.index', compact('bukus', 'search'));
    }


    // FORM TAMBAH
    public function create()
    {
        return view('pages.buku.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode'      => 'required|unique:bukus',
            'judul'     => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cover'     => 'required|mimes:png,jpeg,jpg',
        ]);

        // upload cover
        $cover = $request->file('cover')->store('cover_buku', 'public');

        Buku::create([
            'kode'      => $request->kode,
            'judul'     => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'tahun'     => $request->tahun,
            'cover'     => $cover,
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('pages.buku.edit', compact('buku'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $this->validate($request, [
            'kode'      => 'required|unique:bukus,kode,' . $id,
            'judul'     => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cover'     => 'nullable|mimes:png,jpeg,jpg',
        ]);

        if ($request->hasFile('cover')) {
            // hapus cover lama
            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }
            $buku->cover = $request->file('cover')->store('cover_buku', 'public');
        }

        $buku->update([
            'kode'      => $request->kode,
            'judul'     => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'tahun'     => $request->tahun,
        ]);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover) {
            Storage::disk('public')->delete($buku->cover);
        }

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil dihapus');
    }
}
