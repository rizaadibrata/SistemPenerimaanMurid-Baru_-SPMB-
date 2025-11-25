<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembayaran;
use App\Models\Pendaftar;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $pendaftars = Pendaftar::limit(5)->get();

        foreach ($pendaftars as $index => $pendaftar) {
            Pembayaran::create([
                'pendaftar_id' => $pendaftar->id,
                'nominal' => 500000,
                'bukti_transfer' => 'bukti_transfer_' . ($index + 1) . '.jpg',
                'status' => $index < 2 ? 'PENDING' : ($index < 4 ? 'VERIFIED' : 'REJECTED'),
                'tanggal_bayar' => now()->subDays(rand(1, 30)),
                'keterangan' => $index >= 4 ? 'Bukti transfer tidak jelas' : null
            ]);
        }
    }
}

// Kalo index kurang dari 2 → status = PENDING (MENUNGGU DIPROSES / BELUM DICEK)
// Kalo index kurang dari 4 → status = VERIFIED (DISETUJUI / LULUS / VALID)
// Selain itu → status = REJECTED (DITOLAK / TIDAK VALID)
