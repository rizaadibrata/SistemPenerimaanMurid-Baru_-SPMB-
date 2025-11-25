<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// kolom yang diizinkan untuk diisi massal jadi kaya laci yg boleh diisi sama orang lain
// cuma boleh dipake buat nyimpen data2 tertentu aja
class Gelombang extends Model
{
     //membuat data dummy secara otomatis data palsu pada tabel jurusan
    // contoo : php artisan tinker -> Jurusan::factory()->count(10)->create();
    use HasFactory;
    protected $table = 'gelombang';
    protected $fillable = [
        'nama', 'tanggal_mulai', 'tanggal_selesai', 'aktif', 'harga'
    ];

    // Casts bikin data lebih mudah dipake dengan tipe yang bener
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'aktif' => 'boolean',
        'harga' => 'decimal:2',
    ];

    public function pendaftar()
    {
        // satu data ini punya banyak data pendaftar
        return $this->hasMany(Pendaftar::class);
    }
    //  biar ga manual cri data stu stu
    public static function getCurrentGelombang()
    {
        //toDateString biar formatnya yyyy-mm-dd
        $today = now()->toDateString();
        // cari gelombang yang aktif dan tanggalnya sesuai dengan hari ini
        return self::where('tanggal_mulai', '<=', $today)
                   ->where('tanggal_selesai', '>=', $today)
                   ->where('aktif', true)
                   ->first();
    }
}
