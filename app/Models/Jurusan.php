<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// kolom yang diizinkan untuk diisi massal jadi kaya laci yg boleh diisi sama org lain
// cuma boleh dipake buat nyimpen data2 tertentu aja

class Jurusan extends Model
{
    //membuat data dummy secara otomatis data palsu pada tabel jurusan
    // contoo : php artisan tinker -> Jurusan::factory()->count(10)->create();
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
        'kode', 'nama', 'deskripsi', 'kuota', 'aktif'
    ];

    // // Casts bikin data lebih mudah dipake dengan tipe yang tepat
    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function pendaftar()
    {
        // satu data ini punya banyak data pendaftar
        return $this->hasMany(Pendaftar::class);
    }
}
