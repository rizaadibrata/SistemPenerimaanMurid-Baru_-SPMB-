<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function adminLogin()
    {
        $logs = LogAktivitas::with('pengguna')
            ->whereHas('pengguna', function($query) {
                $query->whereIn('role', ['admin', 'verifikator_adm', 'keuangan', 'kepsek']);
            })
            ->where('aksi', 'LOGIN')
            ->orderBy('waktu', 'desc')
            ->paginate(20);
            
        return view('admin.log-aktivitas.admin-login', compact('logs'));
    }
    
    public function userLogin()
    {
        $logs = LogAktivitas::with('pengguna')
            ->whereHas('pengguna', function($query) {
                $query->where('role', 'pendaftar');
            })
            ->where('aksi', 'LOGIN')
            ->orderBy('waktu', 'desc')
            ->paginate(20);
            
        return view('admin.log-aktivitas.user-login', compact('logs'));
    }
}