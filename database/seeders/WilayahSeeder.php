<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    public function run(): void
    {
        $wilayahs = [
            [
                'provinsi' => 'DKI Jakarta',
                'kabupaten' => 'Jakarta Pusat',
                'kecamatan' => 'Menteng',
                'kelurahan' => 'Menteng',
                'kodepos' => '10310',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Jawa Barat',
                'kabupaten' => 'Bandung',
                'kecamatan' => 'Bandung Wetan',
                'kelurahan' => 'Cihapit',
                'kodepos' => '40114',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Jawa Tengah',
                'kabupaten' => 'Semarang',
                'kecamatan' => 'Semarang Tengah',
                'kelurahan' => 'Kauman',
                'kodepos' => '50213',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        
        DB::table('wilayah')->insert($wilayahs);
    }
}