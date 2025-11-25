<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $table = 'wilayah';

    protected $fillable = [
        'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kodepos'
    ];

    public function pendaftarDataSiswa()
    {
        // has mny 1:n
        return $this->hasMany(PendaftarDataSiswa::class, 'village_id');
    }
}
