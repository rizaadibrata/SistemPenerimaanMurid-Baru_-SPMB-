<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\PendaftarDataOrtu;
use App\Models\PendaftarAsalSekolah;
use App\Models\PendaftarBerkas;
use App\Models\Pembayaran;
use App\Models\LogAktivitas;
use App\Models\Pengguna;

class CheckRegistrationData extends Command
{
    protected $signature = 'ppdb:check-data';
    protected $description = 'Check current registration data count';

    public function handle()
    {
        $this->info('📊 Status Data Pendaftaran PPDB:');
        $this->info('');

        $pendaftarCount = Pendaftar::count();
        $dataSiswaCount = PendaftarDataSiswa::count();
        $dataOrtuCount = PendaftarDataOrtu::count();
        $asalSekolahCount = PendaftarAsalSekolah::count();
        $berkasCount = PendaftarBerkas::count();
        $pembayaranCount = Pembayaran::count();
        $logCount = LogAktivitas::count();
        $penggunaCount = Pengguna::where('role', 'pendaftar')->count();

        $this->table(
            ['Tabel', 'Jumlah Data'],
            [
                ['Pendaftar', $pendaftarCount],
                ['Data Siswa', $dataSiswaCount],
                ['Data Orang Tua', $dataOrtuCount],
                ['Asal Sekolah', $asalSekolahCount],
                ['Berkas', $berkasCount],
                ['Pembayaran', $pembayaranCount],
                ['Log Aktivitas', $logCount],
                ['Akun Pendaftar', $penggunaCount],
            ]
        );

        $total = $pendaftarCount + $dataSiswaCount + $dataOrtuCount + $asalSekolahCount + $berkasCount + $pembayaranCount + $logCount + $penggunaCount;

        if ($total == 0) {
            $this->info('');
            $this->info('✅ Database bersih! Tidak ada data pendaftaran.');
        } else {
            $this->info('');
            $this->info("📈 Total: {$total} record data pendaftaran");
        }

        return 0;
    }
}