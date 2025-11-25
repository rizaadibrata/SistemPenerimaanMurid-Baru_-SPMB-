<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_pilihan_2')->nullable()->after('jurusan_id');
            $table->foreign('jurusan_pilihan_2')->references('id')->on('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropForeign(['jurusan_pilihan_2']);
            $table->dropColumn('jurusan_pilihan_2');
        });
    }
};
