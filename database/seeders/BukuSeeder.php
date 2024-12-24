<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'title' => 'Buku ' . $i,
                'kategori_id' => rand(1, 10), // Asumsikan ada 10 kategori
                'penulis_id' => rand(1, 10), // Asumsikan ada 10 penulis
                'stock' => rand(1, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('bukus')->insert($data);
    }
        // Buku::create([
        //     'title' => 'Contoh Buku',
        //     'kategori_id' => 1, // Pastikan ID kategori sesuai
        //     'penulis_id' => 1, // Pastikan ID penulis sesuai
        //     'stock' => 10,
        // ]);
    
}
