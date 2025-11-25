<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE pendaftar MODIFY COLUMN status ENUM('DRAFT', 'SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'ADM_REJECT_FINAL', 'PENDING_PAYMENT', 'PAID') NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pendaftar MODIFY COLUMN status ENUM('DRAFT', 'SUBMIT', 'ADM_PASS', 'ADM_REJECT', 'PENDING_PAYMENT', 'PAID') NOT NULL");
    }
};