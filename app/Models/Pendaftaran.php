<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'user_id', 'no_pendaftaran', 'nisn', 'tempat_lahir', 'tanggal_lahir',
        'jenis_kelamin', 'alamat', 'asal_sekolah', 'jurusan_pilihan_1',
        'nama_ayah', 'nama_ibu', 'no_hp_ortu', 'berkas_ijazah', 'berkas_kk',
        'berkas_akta', 'pas_foto', 'sertifikat_prestasi', 'sktm',
        'status', 'tanggal_daftar'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_daftar' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateNoPendaftaran()
    {
        $year = date('Y');
        $lastNumber = self::where('no_pendaftaran', 'like', $year . '%')
                         ->orderBy('no_pendaftaran', 'desc')
                         ->first();
        
        if ($lastNumber) {
            $number = intval(substr($lastNumber->no_pendaftaran, 4)) + 1;
        } else {
            $number = 1;
        }
        
        return $year . str_pad($number, 4, '0', STR_PAD_LEFT);
    }
}