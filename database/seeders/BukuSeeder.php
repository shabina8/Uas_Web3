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




            //MANUAL//
        // DB::table('bukus')->insert([
        //     [
        //         'title' => 'Belajar Laravel',
        //         'kategori_id' => 1, // Pastikan ID ini ada di tabel kategoris
        //         'penulis_id' => 1, // Pastikan ID ini ada di tabel penulis
        //         'stock' => 10,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Pemrograman PHP',
        //         'kategori_id' => 2, // Pastikan ID ini ada di tabel kategoris
        //         'penulis_id' => 2, // Pastikan ID ini ada di tabel penulis
        //         'stock' => 5,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'title' => 'Mastering JavaScript',
        //         'kategori_id' => 1, // Pastikan ID ini ada di tabel kategoris
        //         'penulis_id' => 3, // Pastikan ID ini ada di tabel penulis
        //         'stock' => 15,
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
        
    
}
