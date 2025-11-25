<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pendaftar;

class UpdatePendaftarStatusSeeder extends Seeder
{
    public function run(): void
    {
        $pendaftars = Pendaftar::all();

        foreach ($pendaftars as $index => $pendaftar) {
            switch ($pendaftar->no_pendaftaran) {
                case 'PPDB2025110006':
                    // Rezdika - sudah ADM_REJECT_FINAL.
                    break;
                case 'PPDB2025110005':
                    // Alif Nur Imam - set ke SUBMIT (menunggu verifikasi)
                    $pendaftar->update(['status' => 'SUBMIT']);
                    break;
                case 'PPDB2025110004':
                    // Rasyidi Raya - set ke ADM_PASS (terverifikasi)
                    $pendaftar->update(['status' => 'ADM_PASS']);
                    break;
                case 'PPDB2025110003':
                    // Riza Adibrata - set ke PENDING_PAYMENT (menunggu pembayaran)
                    $pendaftar->update(['status' => 'PENDING_PAYMENT']);
                    break;
                case 'PPDB2025110002':
                    // Raihan Fauzan - set ke PAID (lunas)
                    $pendaftar->update(['status' => 'PAID']);
                    break;
                case 'PPDB2025110001':
                    // Surya Maulana - set ke ADM_REJECT (ditolak, bisa diperbaiki)
                    $pendaftar->update([
                        'status' => 'ADM_REJECT',
                        'catatan_verifikator' => 'Berkas ijazah tidak jelas, mohon upload ulang dengan kualitas yang lebih baik.'
                    ]);
                    break;
                default:
                    // Untuk pendaftar lain, biarkan DRAFT atau set random status
                    if ($pendaftar->status === 'DRAFT') {
                        $statuses = ['SUBMIT', 'ADM_PASS', 'PENDING_PAYMENT'];
                        $randomStatus = $statuses[array_rand($statuses)];
                        $pendaftar->update(['status' => $randomStatus]);
                    }
                    break;
            }
        }

        $this->command->info('Status pendaftar berhasil diupdate!');
    }
}
