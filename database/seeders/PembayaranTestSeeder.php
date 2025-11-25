<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;
use App\Models\Pembayaran;

class PembayaranTestSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil pendaftar yang berstatus PENDING_PAYMENT
        $pendaftarPendingPayment = Pendaftar::where('status', 'PENDING_PAYMENT')->first();
        
        if ($pendaftarPendingPayment) {
            Pembayaran::create([
                'pendaftar_id' => $pendaftarPendingPayment->id,
                'nominal' => 500000,
                'tanggal_bayar' => now(),
                'bukti_transfer' => 'uploads/pembayaran/bukti_transfer_test.jpg',
                'status' => 'PENDING',
                'keterangan' => null
            ]);
        }
        
        // Ambil pendaftar yang berstatus PAID untuk contoh pembayaran yang sudah verified
        $pendaftarPaid = Pendaftar::where('status', 'PAID')->first();
        
        if ($pendaftarPaid) {
            Pembayaran::create([
                'pendaftar_id' => $pendaftarPaid->id,
                'nominal' => 500000,
                'tanggal_bayar' => now()->subDays(1),
                'bukti_transfer' => 'uploads/pembayaran/bukti_transfer_verified.jpg',
                'status' => 'VERIFIED',
                'keterangan' => 'Pembayaran telah diverifikasi'
            ]);
        }
        
        $this->command->info('Data pembayaran test berhasil ditambahkan!');
    }
}