<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtp;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        try {
            $otp = Otp::generateOtp($request->email);
            Mail::to($request->email)->send(new SendOtp($otp->otp, $request->email));

            return response()->json([
                'success' => true,
                'message' => 'OTP telah dikirim ke email Anda'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengirim OTP: ' . $e->getMessage()
            ], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        if (Otp::verifyOtp($request->email, $request->otp)) {
            return response()->json([
                'success' => true,
                'message' => 'OTP berhasil diverifikasi'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'OTP tidak valid atau sudah kadaluarsa'
        ], 422);
    }
}
