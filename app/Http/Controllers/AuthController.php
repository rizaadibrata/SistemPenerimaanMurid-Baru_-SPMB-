<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function showAdminLogin()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check in pengguna table for admin roles
        $pengguna = Pengguna::where('email', $request->email)
                           ->whereIn('role', ['admin', 'verifikator_adm', 'keuangan', 'kepsek'])
                           ->where('aktif', 1)
                           ->first();

        if ($pengguna && Hash::check($request->password, $pengguna->password_hash)) {
            // Create or get user for Laravel auth
            $user = User::firstOrCreate(
                ['email' => $pengguna->email],
                [
                    'name' => $pengguna->nama,
                    'password' => $request->password, // Use plain password, let User model hash it
                ]
            );

            Auth::login($user);
            $request->session()->put('user_role', $pengguna->role);
            
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau Anda tidak memiliki akses admin.',
        ])->withInput();
    }

    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }
}