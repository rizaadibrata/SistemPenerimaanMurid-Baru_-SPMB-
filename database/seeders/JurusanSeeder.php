<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $jurusans = [
            ['kode' => 'PPLG', 'nama' => 'Pengembangan Perangkat Lunak dan Gim', 'deskripsi' => 'Jurusan yang mempelajari pemrograman dan pengembangan game', 'kuota' => 36, 'aktif' => true],
            ['kode' => 'DKV', 'nama' => 'Desain Komunikasi Visual', 'deskripsi' => 'Jurusan yang mempelajari desain grafis dan komunikasi visual', 'kuota' => 36, 'aktif' => true],
            ['kode' => 'ANM', 'nama' => 'Animasi', 'deskripsi' => 'Jurusan yang mempelajari pembuatan animasi 2D dan 3D', 'kuota' => 36, 'aktif' => true],
            ['kode' => 'BDP', 'nama' => 'Pemasaran', 'deskripsi' => 'Jurusan yang mempelajari strategi pemasaran dan bisnis', 'kuota' => 36, 'aktif' => true],
            ['kode' => 'AKT', 'nama' => 'Akuntansi', 'deskripsi' => 'Jurusan yang mempelajari pembukuan dan keuangan', 'kuota' => 36, 'aktif' => true],
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }
    }
}