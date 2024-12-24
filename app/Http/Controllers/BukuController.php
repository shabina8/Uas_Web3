<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penulis;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with(['kategori', 'penulis'])->get();
        $kategori = Kategori::all();
        $penulis = Penulis::all();
        $total_buku = Buku::count();
        return view('pages.data-buku.index', compact('buku', 'kategori', 'penulis','total_buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis_id' => 'required|exists:penulis,id',
            'stock' => 'required|integer|min:0',
        ]);

        Buku::create($request->all());

        return redirect()->route('data-buku.index')->with('success', 'Data buku berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis_id' => 'required|exists:penulis,id',
            'stock' => 'required|integer|min:0',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        return redirect()->route('data-buku.index')->with('success', 'Data buku berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->route('data-buku.index')->with('success', 'Data buku berhasil dihapus!');
    }
}
