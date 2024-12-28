<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => 'Kategori ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('kategoris')->insert($data);



            //MANUAL//        
        // DB::table('kategoris')->insert([
        //     ['name' => 'Elektronik'],
        //     ['name' => 'Furnitur'],
        //     ['name' => 'Pakaian'],
        //     ['name' => 'Makanan'],
        // ]);
    }
}
