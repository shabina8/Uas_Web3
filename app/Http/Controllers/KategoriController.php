<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $total_Kategori = Kategori::count();
        return view('pages.data-kategori.index', compact('kategori','total_Kategori'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            Kategori::create($validated);
            return redirect()->route('data-kategori.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('data-kategori.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
        }
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $kategori->update($validated);
            return redirect()->route('data-kategori.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('data-kategori.index')->with('error', 'Terjadi kesalahan saat memperbarui data!');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        $kategori =Kategori::findOrFail($id);

        try {
            $kategori->delete();
            return redirect()->route('data-kategori.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('data-kategori.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }
}
