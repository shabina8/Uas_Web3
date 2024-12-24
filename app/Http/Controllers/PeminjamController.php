<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function index()
    {
        $peminjam = Peminjam::with(['anggota', 'buku'])->get();
        $anggota = Anggota::all();
        $buku = Buku::all();
        $total_peminjam = Peminjam::count();
        return view('pages.data-peminjam.index', compact('peminjam','buku', 'anggota','total_peminjam'));
    }

   

    public function store(Request $request)
{
    // Validasi input dari form
    $validated = $request->validate([
        'anggota_id' => 'required|exists:anggotas,id', // Pastikan id anggota valid
        'buku_id' => 'required|exists:bukus,id', // Pastikan id buku valid
        'borrowed_at' => 'required|date', // Validasi tanggal peminjaman
        'due_date' => 'required|date|after_or_equal:borrowed_at', // Validasi tanggal pengembalian
    ]);

    // Membuat data peminjaman dengan data yang sudah tervalidasi
    Peminjam::create([
        'anggota_id' => $validated['anggota_id'],
        'buku_id' => $validated['buku_id'],
        'borrowed_at' => $validated['borrowed_at'],
        'due_date' => $validated['due_date'],
    ]);

    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('data-peminjam.index')->with('success', 'Peminjaman berhasil ditambahkan.');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $validated = $request->validate([
        'anggota_id' => 'required|exists:anggotas,id', // Validasi id anggota
        'buku_id' => 'required|exists:bukus,id', // Validasi id buku
        'borrowed_at' => 'required|date', // Validasi tanggal peminjaman
        'due_date' => 'required|date|after_or_equal:borrowed_at', // Validasi tanggal pengembalian
        ]);

        try {
            $peminjam->update($validated);
            return redirect()->route('data-peminjam.index')->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('data-peminjam.index')->with('error', 'Terjadi kesalahan saat memperbarui data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $peminjam->delete();

        return redirect()->route('data-peminjam.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
