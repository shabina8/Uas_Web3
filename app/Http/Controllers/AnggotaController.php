<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        $total_member = Anggota::count();
        return view('pages.data-anggota.index', compact('anggota','total_member'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email',
            'no_telpon' => 'required|string|max:15',
        ]);

        try {
            anggota::create($validated);
            return redirect()->route('data-anggota.index')->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('data-anggota.index')->with('error', 'Terjadi kesalahan saat menyimpan data!');
        }
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:anggotas,email,' . $id,
            'no_telpon' => 'required|string|max:15',
        ]);

        try {
            $anggota->update($validated);
            return redirect()->route('data-anggota.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('data-anggota.index')->with('error', 'Terjadi kesalahan saat memperbarui data!');
        }
    }

    // Menghapus data
    public function destroy($id)
    {
        $anggota =Anggota::findOrFail($id);

        try {
            $anggota->delete();
            return redirect()->route('data-anggota.index')->with('success', 'Data berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('data-anggota.index')->with('error', 'Terjadi kesalahan saat menghapus data!');
        }
    }
}
