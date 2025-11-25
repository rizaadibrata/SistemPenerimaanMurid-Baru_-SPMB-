<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\Gelombang;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $pengguna = Pengguna::where('email', $request->email)
                           ->where('aktif', 1)
                           ->first();

        if ($pengguna && Hash::check($request->password, $pengguna->password_hash)) {
            // Find or create corresponding User record
            $user = User::firstOrCreate(
                ['email' => $pengguna->email],
                [
                    'name' => $pengguna->nama,
                    'password' => $pengguna->password_hash
                ]
            );
            
            Auth::login($user);
            session(['admin_role' => $pengguna->role]);
            
            // Log login activity
            \App\Models\LogAktivitas::log($pengguna->id, 'LOGIN', 'ADMIN_LOGIN', [
                'role' => $pengguna->role,
                'email' => $pengguna->email
            ]);
            
            // Redirect based on role
            if ($pengguna->role === 'keuangan') {
                return redirect()->route('keuangan.dashboard');
            }
            
            if ($pengguna->role === 'verifikator_adm') {
                return redirect()->route('verifikator.dashboard');
            }
            
            if ($pengguna->role === 'kepsek') {
                return redirect()->route('kepsek.dashboard');
            }
            
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        $data = [];
        $role = session('admin_role', 'admin');
        
        if (in_array($role, ['admin', 'verifikator_adm'])) {
            $data['totalPendaftar'] = Pendaftar::count();
            $data['terverifikasi'] = Pendaftar::where('status', 'ADM_PASS')->count();
            $data['menungguVerifikasi'] = Pendaftar::where('status', 'SUBMIT')->count();
            $data['ditolak'] = Pendaftar::where('status', 'ADM_REJECT')->count();
        }
        
        if (in_array($role, ['admin', 'keuangan'])) {
            $data['sudahBayar'] = Pendaftar::where('status', 'PAID')->count();
        }
        
        $data['jurusanAktif'] = Jurusan::where('aktif', 1)->count();
        $data['totalJurusan'] = Jurusan::count();
        $data['totalGelombang'] = Gelombang::count();
        $data['gelombangAktif'] = Gelombang::where('aktif', 1)->count();
        $data['totalPengguna'] = \App\Models\Pengguna::where('aktif', 1)->count();
        
        // Data untuk chart
        $data['chartData'] = $this->getChartData();
        $data['statusData'] = $this->getStatusData();
        $data['jurusanStats'] = $this->getJurusanStats();
        $data['recentActivity'] = $this->getRecentActivity();
        
        return view('admin.dashboard', $data);
    }
    
    private function getChartData()
    {
        $monthlyData = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $count = Pendaftar::whereYear('tanggal_daftar', $date->year)
                             ->whereMonth('tanggal_daftar', $date->month)
                             ->count();
            $monthlyData[] = $count;
        }
        return $monthlyData;
    }
    
    private function getStatusData()
    {
        return [
            'draft' => Pendaftar::where('status', 'DRAFT')->count(),
            'submit' => Pendaftar::where('status', 'SUBMIT')->count(),
            'terverifikasi' => Pendaftar::where('status', 'ADM_PASS')->count(),
            'ditolak' => Pendaftar::where('status', 'ADM_REJECT')->count(),
            'lunas' => Pendaftar::where('status', 'PAID')->count(),
        ];
    }
    
    private function getJurusanStats()
    {
        return Jurusan::withCount('pendaftar')
                     ->where('aktif', 1)
                     ->orderBy('pendaftar_count', 'desc')
                     ->limit(5)
                     ->get();
    }
    
    private function getRecentActivity()
    {
        return Pendaftar::with(['pengguna', 'jurusan'])
                       ->orderBy('created_at', 'desc')
                       ->limit(5)
                       ->get();
    }

    public function gelombang()
    {
        return view('admin.gelombang.index');
    }

    public function wilayah()
    {
        return view('admin.wilayah.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}