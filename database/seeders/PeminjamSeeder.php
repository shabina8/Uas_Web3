<?php

namespace Database\Seeders;

use App\Models\Peminjam;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $data = [];

        // Generate 50 dummy records
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'anggota_id' => $i, // Anggota ID diambil dari 1 sampai 50
                'buku_id' => rand(1, 20), // Buku ID acak antara 1 hingga 20
                'borrowed_at' => now()->subDays(rand(1, 30))->toDateString(), // Tanggal peminjaman acak dalam 30 hari terakhir
                'due_date' => now()->addDays(rand(5, 15))->toDateString(), // Tanggal pengembalian 5-15 hari setelah tanggal peminjaman
                'returned_at' => rand(0, 1) ? now()->addDays(rand(0, 10))->toDateString() : null, // Random antara sudah dikembalikan atau belum
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('peminjams')->insert($data);


        // Manual//
    //         Peminjam::create([
    //     'anggota_id' => 1, // Pastikan ID anggota valid
    //     'buku_id' => 1,    // Pastikan ID buku valid
    //     'borrowed_at' => Carbon::now()->subDays(5), // 5 hari yang lalu
    //     'due_date' => Carbon::now()->addDays(5),    // 5 hari ke depan
    //     'returned_at' => null,                      // Belum dikembalikan
    // ]);

    // Peminjam::create([
    //     'anggota_id' => 2, // Pastikan ID anggota valid
    //     'buku_id' => 2,    // Pastikan ID buku valid
    //     'borrowed_at' => Carbon::now()->subDays(10), // 10 hari yang lalu
    //     'due_date' => Carbon::now()->subDays(2),    // Sudah jatuh tempo
    //     'returned_at' => Carbon::now()->subDays(1), // Dikembalikan kemarin
    // ]);

    }
    
    
}
