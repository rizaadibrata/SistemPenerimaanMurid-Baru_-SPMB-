<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    // Menampilkan daftar semua pendaftar dengan relasi pengguna dan jurusan
    public function index()
    {
        $pendaftars = Pendaftar::with(['pengguna', 'jurusan'])->orderBy('created_at', 'desc')->get();
        return view('admin.verifikator_adm.pendaftar.index', compact('pendaftars'));
    }

    // Menampilkan detail lengkap pendaftar untuk proses verifikasi
    public function show(Pendaftar $pendaftar)
    {
        // Load semua relasi yang diperlukan untuk verifikasi
        $pendaftar->load(['pengguna', 'jurusan', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'berkas']);
        return view('admin.verifikator_adm.pendaftar.show', compact('pendaftar'));
    }

    // Proses verifikasi data pendaftar oleh verifikator administrasi
    public function verifikasi(Request $request, Pendaftar $pendaftar)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:pending,terverifikasi,ditolak',
            'catatan_verifikasi' => 'nullable|string'
        ]);

        // Update status verifikasi dengan mencatat siapa yang verifikasi dan kapan
        $pendaftar->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_verifikasi' => $request->catatan_verifikasi,
            'verifikator_id' => auth()->id(),
            'tanggal_verifikasi' => now()
        ]);

        return redirect()->route('admin.pendaftar.index')->with('success', 'Status verifikasi berhasil diupdate');
    }
}