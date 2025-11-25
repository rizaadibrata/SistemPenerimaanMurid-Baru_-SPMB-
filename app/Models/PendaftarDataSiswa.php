<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarDataSiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_data_siswa';
    protected $primaryKey = 'pendaftar_id';
    public $incrementing = false;

    protected $fillable = [
        'pendaftar_id', 'nik', 'nisn', 'nama', 'jk', 'tmp_lahir',
        'tgl_lahir', 'alamat', 'kode_pos', 'wilayah_id', 'village_id'
    ];

    protected $casts = [
        'tgl_lahir' => 'date',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}