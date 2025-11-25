<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan laporan lengkap PPDB untuk kepala sekolah
    public function index()
    {
        // Hitung total pendaftar secara keseluruhan
        $totalPendaftar = Pendaftar::count();
        // Hitung pendaftar yang sudah terverifikasi
        $terverifikasi = Pendaftar::where('status_verifikasi', 'terverifikasi')->count();
        // Hitung pendaftar yang sudah lunas pembayaran
        $sudahBayar = Pendaftar::where('status_pembayaran', 'lunas')->count();
        
        // Buat laporan per jurusan dengan menghitung jumlah pendaftar, terverifikasi, dan lunas
        $laporanJurusan = Jurusan::withCount([
            'pendaftar',
            'pendaftar as terverifikasi_count' => function($query) {
                $query->where('status_verifikasi', 'terverifikasi');
            },
            'pendaftar as lunas_count' => function($query) {
                $query->where('status_pembayaran', 'lunas');
            }
        ])->get();

        return view('admin.kepsek.laporan.index', compact(
            'totalPendaftar', 'terverifikasi', 'sudahBayar', 'laporanJurusan'
        ));
    }
}