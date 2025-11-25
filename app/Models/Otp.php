<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    protected $fillable = ['email', 'otp', 'expires_at', 'used'];
    protected $casts = ['expires_at' => 'datetime'];

    public static function generateOtp($email)
    {
        // Delete expired OTPs
        self::where('email', $email)->where('expires_at', '<', now())->delete();
        
        // Generate 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        return self::create([
            'email' => $email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);
    }

    public static function verifyOtp($email, $otp)
    {
        $record = self::where('email', $email)
                      ->where('otp', $otp)
                      ->where('used', false)
                      ->where('expires_at', '>', now())
                      ->first();

        if ($record) {
            $record->update(['used' => true]);
            return true;
        }

        return false;
    }

    public function isExpired()
    {
        return $this->expires_at < now();
    }
}
