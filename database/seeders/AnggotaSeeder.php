<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'name' => 'Shabina' . $i,
                'email' => 'Shabina' . $i . '@example.com',
                'no_telpon' => '081234567' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('anggotas')->insert($data);



            //MANUAL//

        // DB::table('anggotas')->insert([
        //     [
        //         'name' => 'John Doe',
        //         'email' => 'john.doe@example.com',
        //         'no_telpon' => '081234567890',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Jane Smith',
        //         'email' => 'jane.smith@example.com',
        //         'no_telpon' => '081345678901',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'name' => 'Robert Brown',
        //         'email' => 'robert.brown@example.com',
        //         'no_telpon' => '081456789012',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }
}
