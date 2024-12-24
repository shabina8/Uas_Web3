<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StaffSeeder::class,
            KategoriSeeder::class,
            PenulisSeeder::class,
            BukuSeeder::class,
            AnggotaSeeder::class,
            PeminjamSeeder::class,
          ]);
          
    }
}