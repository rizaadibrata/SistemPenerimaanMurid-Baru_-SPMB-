<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Jurusan;

// Controller untuk mengelola verifikasi pendaftaran siswa
// Menangani dashboard, daftar pendaftar, verifikasi berkas, dan CRUD data pendaftar
class VerifikatorController extends Controller
{
    // Menampilkan dashboard verifikator dengan statistik pendaftar

    public function dashboard()
    {
        $data = [
            'totalPendaftar' => Pendaftar::count(),
            'menungguVerifikasi' => Pendaftar::where('status', 'SUBMIT')->count(),
            'terverifikasi' => Pendaftar::where('status', 'ADM_PASS')->count(),
            'ditolak' => Pendaftar::whereIn('status', ['ADM_REJECT', 'ADM_REJECT_FINAL'])->count(),
        ];

        return view('verifikator.dashboard', $data);
    }

    // Menampilkan daftar semua pendaftar dengan pagination
    public function daftarPendaftar()
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan'])
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('verifikator.daftar', compact('pendaftar'));
    }

    // Menampilkan daftar pendaftar yang menunggu verifikasi berkas
    public function verifikasiBerkas()
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan', 'berkas'])
                              ->where('status', 'SUBMIT')
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('verifikator.verifikasi', compact('pendaftar'));
    }

    // Menampilkan detail lengkap pendaftar berdasarkan ID
    public function detail($id)
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'berkas'])
                              ->findOrFail($id);

        return view('verifikator.detail', compact('pendaftar'));
    }

    // Memproses verifikasi pendaftar (terima/tolak) dan kirim notifikasi email
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:ADM_PASS,ADM_REJECT',
            'keterangan' => 'required_if:status,ADM_REJECT|string|max:1000',
            'jenis_tolak' => 'required_if:status,ADM_REJECT|in:berkas,data,syarat,lainnya'
        ], [
            'keterangan.required_if' => 'Keterangan wajib diisi untuk penolakan',
            'keterangan.max' => 'Keterangan maksimal 1000 karakter',
            'jenis_tolak.required_if' => 'Jenis penolakan wajib dipilih',
            'jenis_tolak.in' => 'Jenis penolakan tidak valid'
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        
        // Tentukan status berdasarkan jenis penolakan
        $finalStatus = $request->status;
        if ($request->status === 'ADM_REJECT') {
            $jenisTolak = $request->input('jenis_tolak');
            // Jika tolak karena tidak memenuhi syarat, set status ke ADM_REJECT_FINAL (tidak bisa perbaikan)
            // Jenis lainnya masih bisa perbaikan
            $finalStatus = $jenisTolak === 'syarat' ? 'ADM_REJECT_FINAL' : 'ADM_REJECT';
        }
        
        $pendaftar->update([
            'status' => $finalStatus,
            'catatan_verifikator' => $request->keterangan
        ]);

        // Kirim email notifikasi jika ditolak
        if ($request->status === 'ADM_REJECT') {
            try {
                \Mail::to($pendaftar->pengguna->email)->send(new \App\Mail\VerifikasiDitolak($pendaftar));
            } catch (\Exception $e) {
                \Log::error('Failed to send rejection email: ' . $e->getMessage());
            }
        }

        $message = $request->status === 'ADM_PASS' ?
            'Pendaftar berhasil diterima' :
            ($finalStatus === 'ADM_REJECT_FINAL' ? 
                'Pendaftar ditolak secara final (tidak memenuhi syarat)' : 
                'Pendaftar ditolak dan dapat melakukan perbaikan data');

        return back()->with('success', $message);
    }

    // Menampilkan form edit data pendaftar
    public function edit($id)
    {
        $pendaftar = Pendaftar::with(['pengguna', 'jurusan', 'dataSiswa', 'dataOrtu', 'asalSekolah'])->findOrFail($id);
        $jurusans = Jurusan::where('aktif', 1)->get();

        return view('verifikator.edit', compact('pendaftar', 'jurusans'));
    }

    // Memperbarui data pendaftar
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'jurusan_id' => 'required|exists:jurusan,id',
        ]);

        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->update(['jurusan_id' => $request->jurusan_id]);

        if ($pendaftar->dataSiswa) {
            $pendaftar->dataSiswa->update([
                'nama' => $request->nama,
                'nisn' => $request->nisn,
                'nik' => $request->nik,
                'jk' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
            ]);
        }

        return redirect()->route('verifikator.daftar')->with('success', 'Data pendaftar berhasil diperbarui');
    }

    // Menghapus data pendaftar
    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('verifikator.daftar')->with('success', 'Data pendaftar berhasil dihapus');
    }
}
