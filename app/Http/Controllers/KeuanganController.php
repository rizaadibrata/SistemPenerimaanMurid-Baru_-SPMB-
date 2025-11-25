<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Pembayaran;

class KeuanganController extends Controller
{
    public function dashboard()
    {
        $data = [
            'totalPembayaran' => Pembayaran::count(),
            'menungguVerifikasi' => Pembayaran::where('status', 'PENDING')->count(),
            'terverifikasi' => Pembayaran::where('status', 'VERIFIED')->count(),
            'ditolak' => Pembayaran::where('status', 'REJECTED')->count(),
            'totalNominal' => Pembayaran::where('status', 'VERIFIED')->sum('nominal'),
        ];
        
        return view('keuangan.dashboard', $data);
    }

    public function verifikasiPembayaran()
    {
        $pendaftar = Pendaftar::with(['dataSiswa', 'pengguna', 'pembayaran'])
                              ->where('status', 'PENDING_PAYMENT')
                              ->orderBy('updated_at', 'desc')
                              ->paginate(10);
        
        return view('keuangan.verifikasi', compact('pendaftar'));
    }

    public function rekapPembayaran()
    {
        $pembayaran = Pembayaran::with(['pendaftar'])
                                ->where('status', 'VERIFIED')
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
        
        return view('keuangan.rekap', compact('pembayaran'));
    }

    public function daftarPembayaran()
    {
        $pembayaran = Pembayaran::with(['pendaftar'])
                                ->orderBy('created_at', 'desc')
                                ->paginate(10);
        
        return view('keuangan.daftar', compact('pembayaran'));
    }

    public function verifikasi(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        if ($request->status === 'VERIFIED') {
            $pengguna = \App\Models\Pengguna::where('email', auth()->user()->email)->first();
            $pembayaran->pendaftar->update([
                'status' => 'ACCEPTED',
                'user_verifikasi_payment' => $pengguna->nama ?? auth()->user()->name,
                'tgl_verifikasi_payment' => now(),
                'tanggal_diterima' => now()
            ]);
        }

        return back()->with('success', 'Status pembayaran berhasil diperbarui');
    }
}