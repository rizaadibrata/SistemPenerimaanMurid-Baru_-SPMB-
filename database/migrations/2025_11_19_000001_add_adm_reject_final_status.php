<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->enum('status', ['DRAFT', 'SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'ADM_REJECT_FINAL', 'PAY_PENDING', 'PAID'])->after('jurusan_pilihan_2');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->enum('status', ['DRAFT', 'SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'PAY_PENDING', 'PAID'])->after('jurusan_pilihan_2');
        });
    }
};