<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan foreign key untuk pendaftar_asal_sekolah
        if (!$this->foreignKeyExists('pendaftar_asal_sekolah', 'fk_pendaftar_asal_sekolah_pendaftar')) {
            Schema::table('pendaftar_asal_sekolah', function (Blueprint $table) {
                $table->foreign('pendaftar_id', 'fk_pendaftar_asal_sekolah_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            });
        }
        
        // Tambahkan foreign key untuk pendaftar_berkas
        if (!$this->foreignKeyExists('pendaftar_berkas', 'fk_pendaftar_berkas_pendaftar')) {
            Schema::table('pendaftar_berkas', function (Blueprint $table) {
                $table->foreign('pendaftar_id', 'fk_pendaftar_berkas_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            });
        }
        
        // Tambahkan foreign key untuk log_aktivitas jika ada
        if (Schema::hasTable('log_aktivitas') && Schema::hasColumn('log_aktivitas', 'user_id')) {
            if (!$this->foreignKeyExists('log_aktivitas', 'fk_log_aktivitas_user')) {
                Schema::table('log_aktivitas', function (Blueprint $table) {
                    $table->foreign('user_id', 'fk_log_aktivitas_user')->references('id')->on('pengguna')->onDelete('cascade');
                });
            }
        }
    }

    public function down(): void
    {
        Schema::table('pendaftar_asal_sekolah', function (Blueprint $table) {
            $table->dropForeign('fk_pendaftar_asal_sekolah_pendaftar');
        });
        
        Schema::table('pendaftar_berkas', function (Blueprint $table) {
            $table->dropForeign('fk_pendaftar_berkas_pendaftar');
        });
        
        if (Schema::hasTable('log_aktivitas')) {
            Schema::table('log_aktivitas', function (Blueprint $table) {
                $table->dropForeign('fk_log_aktivitas_user');
            });
        }
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