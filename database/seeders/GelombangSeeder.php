<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gelombang;

class GelombangSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus semua data gelombang
        Gelombang::truncate();
        
        $gelombangs = [
            [
                'nama' => 'Gelombang 1',
                'tanggal_mulai' => '2025-05-05',
                'tanggal_selesai' => '2025-10-10',
                'aktif' => true,
                'harga' => 2000000
            ],
            [
                'nama' => 'Gelombang 2',
                'tanggal_mulai' => '2025-11-11',
                'tanggal_selesai' => '2026-01-01',
                'aktif' => true,
                'harga' => 5000000
            ],
        ];

        foreach ($gelombangs as $gelombang) {
            Gelombang::create($gelombang);
        }
    }
}
