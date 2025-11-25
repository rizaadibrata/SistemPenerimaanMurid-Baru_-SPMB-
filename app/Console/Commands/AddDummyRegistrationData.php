<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pengguna;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\Wilayah;
use App\Models\Jurusan;
use App\Models\Gelombang;

class AddDummyRegistrationData extends Command
{
    protected $signature = 'ppdb:add-dummy-data';
    protected $description = 'Add dummy registration data for testing';

    public function handle()
    {
        $this->info('Menambahkan data dummy untuk testing grafik...');

        // Data dummy wilayah
        $wilayahData = [
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Bogor', 'kecamatan' => 'Cibinong', 'kelurahan' => 'Cibinong', 'kodepos' => '16911'],
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Depok', 'kecamatan' => 'Pancoran Mas', 'kelurahan' => 'Depok', 'kodepos' => '16431'],
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Bekasi', 'kecamatan' => 'Bekasi Timur', 'kelurahan' => 'Bekasi', 'kodepos' => '17113'],
            ['provinsi' => 'DKI Jakarta', 'kabupaten' => 'Jakarta Selatan', 'kecamatan' => 'Kebayoran Baru', 'kelurahan' => 'Senayan', 'kodepos' => '12190'],
            ['provinsi' => 'Jawa Barat', 'kabupaten' => 'Tangerang', 'kecamatan' => 'Tangerang', 'kelurahan' => 'Tangerang', 'kodepos' => '15111'],
        ];

        // Insert wilayah jika belum ada
        foreach ($wilayahData as $w) {
            Wilayah::firstOrCreate($w);
        }

        $jurusan = Jurusan::first();
        $gelombang = Gelombang::first();
        
        if (!$jurusan || !$gelombang) {
            $this->error('Jurusan atau Gelombang tidak ditemukan. Jalankan seeder terlebih dahulu.');
            return;
        }

        // Buat data dummy pendaftar
        for ($i = 1; $i <= 15; $i++) {
            $pengguna = Pengguna::create([
                'nama' => "Siswa Test {$i}",
                'email' => "siswa{$i}@test.com",
                'hp' => "08123456789{$i}",
                'password_hash' => bcrypt('password'),
                'role' => 'pendaftar',
                'aktif' => 1
            ]);

            $pendaftar = Pendaftar::create([
                'user_id' => $pengguna->id,
                'tanggal_daftar' => now()->subDays(rand(1, 30)),
                'no_pendaftaran' => 'PPDB' . date('Y') . str_pad($i, 4, '0', STR_PAD_LEFT),
                'gelombang_id' => $gelombang->id,
                'jurusan_id' => $jurusan->id,
                'status' => 'SUBMIT'
            ]);

            // Pilih wilayah secara random
            $wilayah = Wilayah::inRandomOrder()->first();
            
            PendaftarDataSiswa::create([
                'pendaftar_id' => $pendaftar->id,
                'nik' => '327' . str_pad($i, 13, '0', STR_PAD_LEFT),
                'nisn' => '00' . str_pad($i, 8, '0', STR_PAD_LEFT),
                'nama' => "Siswa Test {$i}",
                'jk' => $i % 2 == 0 ? 'L' : 'P',
                'tmp_lahir' => 'Jakarta',
                'tgl_lahir' => now()->subYears(16)->subDays(rand(1, 365)),
                'alamat' => "Jalan Test No. {$i}",
                'wilayah_id' => $wilayah->id
            ]);
        }

        $this->info('✅ Berhasil menambahkan 15 data dummy pendaftar');
        $this->info('Grafik asal wilayah sekarang dapat dilihat di dashboard Kepsek');
    }
}