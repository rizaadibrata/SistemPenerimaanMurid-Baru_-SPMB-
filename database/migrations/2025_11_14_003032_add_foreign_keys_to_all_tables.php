<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pastikan semua tabel menggunakan InnoDB engine
        DB::statement('ALTER TABLE gelombang ENGINE=InnoDB');
        DB::statement('ALTER TABLE jurusan ENGINE=InnoDB');
        DB::statement('ALTER TABLE wilayah ENGINE=InnoDB');
        DB::statement('ALTER TABLE pengguna ENGINE=InnoDB');
        DB::statement('ALTER TABLE pendaftar ENGINE=InnoDB');
        DB::statement('ALTER TABLE pendaftar_data_siswa ENGINE=InnoDB');
        DB::statement('ALTER TABLE pendaftar_data_ortu ENGINE=InnoDB');
        DB::statement('ALTER TABLE users ENGINE=InnoDB');
        
        // Tambahkan foreign key jika belum ada
        if (!$this->foreignKeyExists('pendaftar', 'fk_pendaftar_user')) {
            Schema::table('pendaftar', function (Blueprint $table) {
                $table->foreign('user_id', 'fk_pendaftar_user')->references('id')->on('pengguna')->onDelete('cascade');
            });
        }
        
        if (!$this->foreignKeyExists('pendaftar', 'fk_pendaftar_gelombang')) {
            Schema::table('pendaftar', function (Blueprint $table) {
                $table->foreign('gelombang_id', 'fk_pendaftar_gelombang')->references('id')->on('gelombang')->onDelete('cascade');
            });
        }
        
        if (!$this->foreignKeyExists('pendaftar', 'fk_pendaftar_jurusan')) {
            Schema::table('pendaftar', function (Blueprint $table) {
                $table->foreign('jurusan_id', 'fk_pendaftar_jurusan')->references('id')->on('jurusan')->onDelete('cascade');
            });
        }
        
        if (!$this->foreignKeyExists('pendaftar_data_siswa', 'fk_pendaftar_data_siswa_pendaftar')) {
            Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
                $table->foreign('pendaftar_id', 'fk_pendaftar_data_siswa_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            });
        }
        
        if (!$this->foreignKeyExists('pendaftar_data_siswa', 'fk_pendaftar_data_siswa_wilayah')) {
            Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
                $table->foreign('wilayah_id', 'fk_pendaftar_data_siswa_wilayah')->references('id')->on('wilayah')->onDelete('cascade');
            });
        }
        
        if (!$this->foreignKeyExists('pendaftar_data_ortu', 'fk_pendaftar_data_ortu_pendaftar')) {
            Schema::table('pendaftar_data_ortu', function (Blueprint $table) {
                $table->foreign('pendaftar_id', 'fk_pendaftar_data_ortu_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropForeign('fk_pendaftar_user');
            $table->dropForeign('fk_pendaftar_gelombang');
            $table->dropForeign('fk_pendaftar_jurusan');
        });
        
        Schema::table('pendaftar_data_siswa', function (Blueprint $table) {
            $table->dropForeign('fk_pendaftar_data_siswa_pendaftar');
            $table->dropForeign('fk_pendaftar_data_siswa_wilayah');
        });
        
        Schema::table('pendaftar_data_ortu', function (Blueprint $table) {
            $table->dropForeign('fk_pendaftar_data_ortu_pendaftar');
        });
    }
    
    private function foreignKeyExists($table, $key)
    {
        $result = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = DATABASE() 
            AND TABLE_NAME = '$table' 
            AND CONSTRAINT_NAME = '$key'
        ");
        
        return count($result) > 0;
    }
};