<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar koleksi buku.
     */
    public function index()
    {
        $buku = Buku::with('kategori')->get();
        $kategori = Kategori::all();

        return view('buku.index', compact('buku', 'kategori'));
    }

    /**
     * Menampilkan halaman formulir tambah data.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.create', compact('kategori'));
    }

    /**
     * Menyimpan data buku baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id', 
            'penulis'      => 'nullable|string|max:255',
            'penerbit'     => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer|min:1000|max:' . date('Y'),
            'stok'         => 'nullable|integer|min:0',
        ]);

        Buku::create([
            'judul'        => $request->judul,
            'kategori_id'  => $request->kategori_id,
            'penulis'      => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok'         => $request->stok ?? 0, 
            'user_id'      => auth()->id(),
        ]);

        return redirect()->route('buku.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Menampilkan formulir untuk mengubah data buku.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Memperbarui data buku di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'kategori_id'  => 'required|exists:kategori,id',
            'penulis'      => 'nullable|string|max:255',
            'penerbit'     => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer|min:1000|max:' . date('Y'),
            'stok'         => 'nullable|integer|min:0',
        ]);

        $buku = Buku::findOrFail($id);
        
        $buku->update([
            'judul'        => $request->judul,
            'kategori_id'  => $request->kategori_id,
            'penulis'      => $request->penulis,
            'penerbit'     => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok'         => $request->stok ?? 0,
        ]);

        return redirect()->route('buku.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Menghapus data buku dari database.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Data berhasil dihapus');
    }
}