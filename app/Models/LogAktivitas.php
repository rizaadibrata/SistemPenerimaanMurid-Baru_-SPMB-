<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    
    protected $fillable = [
        'user_id', 'aksi', 'objek', 'objek_data', 'waktu', 'ip'
    ];
    
    protected $casts = [
        'objek_data' => 'array',
        'waktu' => 'datetime'
    ];
    
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'user_id');
    }
    
    public static function log($userId, $aksi, $objek, $objekData = null)
    {
        return self::create([
            'user_id' => $userId,
            'aksi' => $aksi,
            'objek' => $objek,
            'objek_data' => $objekData,
            'waktu' => now(),
            'ip' => request()->ip()
        ]);
    }
}