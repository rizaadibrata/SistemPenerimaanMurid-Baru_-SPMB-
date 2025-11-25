<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // Menampilkan daftar pendaftar yang sudah upload bukti pembayaran
    public function index()
    {
        $pendaftars = Pendaftar::with(['pengguna', 'jurusan'])
                              ->whereNotNull('bukti_pembayaran')
                              ->orderBy('created_at', 'desc')
                              ->get();
        return view('admin.keuangan.pembayaran.index', compact('pendaftars'));
    }

    // Verifikasi status pembayaran oleh bagian keuangan
    public function verifikasi(Request $request, Pendaftar $pendaftar)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:pending,lunas,ditolak',
            'catatan_pembayaran' => 'nullable|string'
        ]);

        // Update status pembayaran dengan mencatat siapa yang verifikasi dan kapan
        $pendaftar->update([
            'status_pembayaran' => $request->status_pembayaran,
            'catatan_pembayaran' => $request->catatan_pembayaran,
            'verifikator_pembayaran_id' => auth()->id(),
            'tanggal_verifikasi_pembayaran' => now()
        ]);

        return redirect()->route('admin.pembayaran.index')->with('success', 'Status pembayaran berhasil diupdate');
    }
}