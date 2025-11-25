<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Gelombang;
use App\Models\Wilayah;

class MasterController extends Controller
{
    // Jurusan Management
    public function jurusan()
    {
        $jurusans = Jurusan::orderBy('kode')->get();
        return view('admin.master.jurusan', compact('jurusan'));
    }

    public function storeJurusan(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:jurusan,kode',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0',
        ]);

        Jurusan::create($request->all());
        return redirect()->back()->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function updateJurusan(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:10|unique:jurusan,kode,' . $id,
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kuota' => 'required|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->back()->with('success', 'Jurusan berhasil diupdate');
    }

    // Gelombang Management
    public function gelombang()
    {
        $gelombangs = Gelombang::orderBy('tanggal_mulai')->get();
        return view('admin.master.gelombang', compact('gelombangs'));
    }

    public function storeGelombang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
        ]);

        Gelombang::create($request->all());
        return redirect()->back()->with('success', 'Gelombang berhasil ditambahkan');
    }

    public function updateGelombang(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'aktif' => 'boolean',
        ]);

        $gelombang = Gelombang::findOrFail($id);
        $gelombang->update($request->all());
        return redirect()->back()->with('success', 'Gelombang berhasil diupdate');
    }

    // Wilayah Management
    public function wilayah()
    {
        $wilayahs = Wilayah::orderBy('provinsi')->orderBy('kabupaten')->get();
        return view('admin.master.wilayah', compact('wilayahs'));
    }

    public function storeWilayah(Request $request)
    {
        $request->validate([
            'provinsi' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kelurahan' => 'required|string|max:100',
            'kodepos' => 'required|string|max:10',
        ]);

        Wilayah::create($request->all());
        return redirect()->back()->with('success', 'Wilayah berhasil ditambahkan');
    }
}
