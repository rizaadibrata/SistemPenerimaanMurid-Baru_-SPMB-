<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\Gelombang;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function pendaftar(Request $request)
    {
        $query = Pendaftar::with(['pengguna', 'dataSiswa', 'jurusan', 'gelombang']);

        if ($request->gelombang_id) {
            $query->where('gelombang_id', $request->gelombang_id);
        }

        if ($request->jurusan_id) {
            $query->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $pendaftar = $query->orderBy('created_at', 'desc')->get();
        $jurusans = Jurusan::where('aktif', 1)->get();
        $gelombangs = Gelombang::where('aktif', 1)->get();

        return view('admin.laporan.pendaftar', compact('pendaftar', 'jurusans', 'gelombangs'));
    }

    public function statistik()
    {
        $statistikJurusan = DB::table('pendaftar')
            ->join('jurusan', 'pendaftar.jurusan_id', '=', 'jurusan.id')
            ->select('jurusan.nama', DB::raw('count(*) as total'))
            ->groupBy('jurusan.id', 'jurusan.nama')
            ->get();

        $statistikStatus = DB::table('pendaftar')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $statistikGelombang = DB::table('pendaftar')
            ->join('gelombang', 'pendaftar.gelombang_id', '=', 'gelombang.id')
            ->select('gelombang.nama', DB::raw('count(*) as total'))
            ->groupBy('gelombang.id', 'gelombang.nama')
            ->get();

        return view('admin.laporan.statistik', compact(
            'statistikJurusan', 'statistikStatus', 'statistikGelombang'
        ));
    }
}