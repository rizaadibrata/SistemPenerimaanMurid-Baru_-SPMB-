<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use App\Models\PendaftarAsalSekolah;
use App\Models\Wilayah;

class KepsekController extends Controller
{
    public function dashboard()
    {
        $data = [
            'totalPendaftar' => Pendaftar::count(),
            'terverifikasi' => Pendaftar::where('status', 'ADM_PASS')->count(),
            'diterima' => Pendaftar::where('status', 'ACCEPTED')->count(),
            'totalPembayaran' => Pembayaran::where('status', 'VERIFIED')->sum('nominal'),
            'chartData' => $this->getChartData(),
            'statusData' => $this->getStatusData(),
            'wilayahData' => $this->getWilayahData(),
        ];
        
        return view('kepsek.dashboard', $data);
    }

    public function daftarCalonSiswa()
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan'])
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);
        
        return view('kepsek.daftar-calon', compact('pendaftar'));
    }

    public function calonSiswaDiterima()
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan'])
                              ->where('status', 'ACCEPTED')
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);
        
        return view('kepsek.diterima', compact('pendaftar'));
    }

    public function rekapPembayaran()
    {
        $pembayaran = Pembayaran::with(['pendaftar'])
                                ->where('status', 'VERIFIED')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
        
        return view('kepsek.rekap-pembayaran', compact('pembayaran'));
    }

    public function dataAsalSekolah()
    {
        $asalSekolah = PendaftarAsalSekolah::with(['pendaftar'])
                                          ->selectRaw('nama_sekolah, COUNT(*) as jumlah')
                                          ->groupBy('nama_sekolah')
                                          ->orderBy('jumlah', 'desc')
                                          ->paginate(10);
        
        return view('kepsek.asal-sekolah', compact('asalSekolah'));
    }

    public function asalWilayah()
    {
        $wilayah = \DB::table('wilayah')
                      ->leftJoin('pendaftar_data_siswa', 'pendaftar_data_siswa.wilayah_id', '=', 'wilayah.id')
                      ->select(
                          'wilayah.provinsi',
                          'wilayah.kabupaten', 
                          'wilayah.kecamatan',
                          'wilayah.kelurahan',
                          \DB::raw('COUNT(pendaftar_data_siswa.pendaftar_id) as jumlah')
                      )
                      ->groupBy('wilayah.id', 'wilayah.provinsi', 'wilayah.kabupaten', 'wilayah.kecamatan', 'wilayah.kelurahan')
                      ->having(\DB::raw('COUNT(pendaftar_data_siswa.pendaftar_id)'), '>', 0)
                      ->orderBy('jumlah', 'desc')
                      ->paginate(10);
        
        return view('kepsek.asal-wilayah', compact('wilayah'));
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
            'submit' => Pendaftar::where('status', 'SUBMIT')->count(),
            'terverifikasi' => Pendaftar::where('status', 'ADM_PASS')->count(),
            'diterima' => Pendaftar::where('status', 'ACCEPTED')->count(),
        ];
    }

    private function getWilayahData()
    {
        $wilayah = \DB::table('wilayah')
                      ->leftJoin('pendaftar_data_siswa', 'pendaftar_data_siswa.wilayah_id', '=', 'wilayah.id')
                      ->select(
                          'wilayah.kabupaten',
                          \DB::raw('COUNT(pendaftar_data_siswa.pendaftar_id) as jumlah')
                      )
                      ->groupBy('wilayah.kabupaten')
                      ->having(\DB::raw('COUNT(pendaftar_data_siswa.pendaftar_id)'), '>', 0)
                      ->orderBy('jumlah', 'desc')
                      ->limit(10)
                      ->get();
        
        if ($wilayah->isEmpty()) {
            return [
                'labels' => [],
                'data' => []
            ];
        }
        
        return [
            'labels' => $wilayah->pluck('kabupaten')->toArray(),
            'data' => $wilayah->pluck('jumlah')->toArray()
        ];
    }
}