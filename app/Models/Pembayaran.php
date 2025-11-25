<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    
    protected $fillable = [
        'pendaftar_id',
        'nominal',
        'bukti_transfer',
        'status',
        'keterangan',
        'tanggal_bayar'
    ];

    protected $casts = [
        'tanggal_bayar' => 'date'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}