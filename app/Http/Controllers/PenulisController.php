<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        $total_penulis = Penulis::count();
        return view('pages.data-penulis.index', compact('penulis','total_penulis'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
        ]);

        try {
            Penulis::create($validated);
            return redirect()->route('data-penulis.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('data-penulis.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
        }
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $penulis = Penulis::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
        ]);

        try {
            $penulis->update($validated);
            return redirect()->route('data-penulis.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('data-penulis.index')->with('error', 'Terjadi kesalahan saat memperbarui data!');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        $penulis =Penulis::findOrFail($id);

        try {
            $penulis->delete();
            return redirect()->route('data-penulis.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('data-penulis.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }
}
