<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\PendaftarDataOrtu;
use App\Models\PendaftarAsalSekolah;
use App\Models\PendaftarBerkas;
use App\Models\Gelombang;
use App\Models\Jurusan;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function updateForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20', 
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'npsn' => 'required|string|max:20',
            'kabupaten_sekolah' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_pilihan_1' => 'required|exists:jurusan,id',
            'jurusan_pilihan_2' => 'required|exists:jurusan,id|different:jurusan_pilihan_1',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_hp_ortu' => 'required|string|max:20',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
        ], [
            'jurusan_pilihan_2.different' => 'Jurusan pilihan 2 harus berbeda dengan jurusan pilihan 1.',
        ]);

        try {
            $pengguna = Pengguna::where('email', Auth::user()->email)->first();
            $pendaftar = Pendaftar::where('user_id', $pengguna->id)->first();

            if (!$pendaftar) {
                return back()->withErrors(['error' => 'Data pendaftaran tidak ditemukan.'])->withInput();
            }

            $currentGelombang = Gelombang::getCurrentGelombang();
            
            if (!$currentGelombang) {
                return back()->withErrors(['error' => 'Tidak ada gelombang pendaftaran yang aktif saat ini.'])->withInput();
            }

            $pendaftar->update([
                'jurusan_id' => $request->jurusan_pilihan_1,
                'jurusan_pilihan_2' => $request->jurusan_pilihan_2,
                'gelombang_id' => $currentGelombang->id
            ]);
            
            $dataSiswa = $pendaftar->dataSiswa;
            $wilayahId = $dataSiswa->wilayah_id;
            if ($dataSiswa->village_id) {
                $wilayahId = $this->getWilayahIdFromVillage($dataSiswa->village_id);
            }
            
            $pendaftar->dataSiswa()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nik' => $request->nik,
                    'nisn' => $request->nisn,
                    'nama' => $request->nama_lengkap,
                    'jk' => $request->jenis_kelamin,
                    'tmp_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'village_id' => $dataSiswa->village_id ?? null,
                    'wilayah_id' => $wilayahId,
                ]
            );
            
            $pendaftar->dataOrtu()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nama_ayah' => $request->nama_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah ?? 'Tidak Diketahui',
                    'hp_ayah' => $request->no_hp_ortu,
                    'nama_ibu' => $request->nama_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu ?? 'Tidak Diketahui',
                    'hp_ibu' => $request->no_hp_ortu,
                ]
            );
            
            $pendaftar->asalSekolah()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->asal_sekolah,
                    'kabupaten' => $request->kabupaten_sekolah,
                    'nilai_rata' => 0.00,
                ]
            );

            return redirect()->route('pendaftaran.upload')->with('success', 'Data berhasil diperbarui! Silakan periksa berkas persyaratan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()])->withInput();
        }
    }
}
