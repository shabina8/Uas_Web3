<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => 'Penulis ' . $i,
                'bio' => 'Ini adalah bio untuk Penulis ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('penulis')->insert($data);
    }
}
