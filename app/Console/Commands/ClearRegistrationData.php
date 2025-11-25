<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\PendaftarDataOrtu;
use App\Models\PendaftarAsalSekolah;
use App\Models\PendaftarBerkas;
use App\Models\Pembayaran;
use App\Models\LogAktivitas;
use App\Models\Pengguna;

class ClearRegistrationData extends Command
{
    protected $signature = 'ppdb:clear-data {--force : Force the operation without confirmation}';
    protected $description = 'Clear all registration data from PPDB system';

    public function handle()
    {
        if (!$this->option('force')) {
            if (!$this->confirm('Apakah Anda yakin ingin menghapus SEMUA data pendaftaran? Tindakan ini tidak dapat dibatalkan!')) {
                $this->info('Operasi dibatalkan.');
                return;
            }
        }

        $this->info('Memulai penghapusan data pendaftaran...');

        try {
            // Disable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            // Count data sebelum dihapus
            $berkasCount = PendaftarBerkas::count();
            $pembayaranCount = Pembayaran::count();
            $asalSekolahCount = PendaftarAsalSekolah::count();
            $dataOrtuCount = PendaftarDataOrtu::count();
            $dataSiswaCount = PendaftarDataSiswa::count();
            $pendaftarCount = Pendaftar::count();
            $logCount = LogAktivitas::count();
            $penggunaCount = Pengguna::where('role', 'pendaftar')->count();

            // Hapus semua data dengan truncate
            PendaftarBerkas::truncate();
            $this->info("✓ Menghapus {$berkasCount} berkas pendaftar");

            Pembayaran::truncate();
            $this->info("✓ Menghapus {$pembayaranCount} data pembayaran");

            PendaftarAsalSekolah::truncate();
            $this->info("✓ Menghapus {$asalSekolahCount} data asal sekolah");

            PendaftarDataOrtu::truncate();
            $this->info("✓ Menghapus {$dataOrtuCount} data orang tua");

            PendaftarDataSiswa::truncate();
            $this->info("✓ Menghapus {$dataSiswaCount} data siswa");

            Pendaftar::truncate();
            $this->info("✓ Menghapus {$pendaftarCount} data pendaftar");

            LogAktivitas::truncate();
            $this->info("✓ Menghapus {$logCount} log aktivitas");

            // Hapus pengguna dengan role 'pendaftar'
            Pengguna::where('role', 'pendaftar')->delete();
            $this->info("✓ Menghapus {$penggunaCount} akun pengguna pendaftar");

            // Enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            $this->info('');
            $this->info('🎉 Semua data pendaftaran berhasil dihapus!');
            $this->info('📊 Ringkasan:');
            $this->info("   - {$pendaftarCount} pendaftar");
            $this->info("   - {$dataSiswaCount} data siswa");
            $this->info("   - {$dataOrtuCount} data orang tua");
            $this->info("   - {$asalSekolahCount} data asal sekolah");
            $this->info("   - {$berkasCount} berkas");
            $this->info("   - {$pembayaranCount} pembayaran");
            $this->info("   - {$logCount} log aktivitas");
            $this->info("   - {$penggunaCount} akun siswa");

        } catch (\Exception $e) {
            $this->error('❌ Terjadi kesalahan: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}