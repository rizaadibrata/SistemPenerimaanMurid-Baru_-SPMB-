<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    // Menampilkan daftar semua wilayah diurutkan berdasarkan ID
    public function index()
    {
        $wilayahs = Wilayah::orderBy('id')->get();
        return view('admin.wilayah.index', compact('wilayahs'));
    }

    // Menampilkan form untuk menambah wilayah baru
    public function create()
    {
        return view('admin.wilayah.create');
    }

    // Menyimpan data wilayah baru dengan validasi
    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kodepos' => 'nullable|string|max:10'
        ]);

        Wilayah::create($request->all());
        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil ditambahkan');
    }

    // Menampilkan form edit untuk wilayah tertentu
    public function edit(Wilayah $wilayah)
    {
        return view('admin.wilayah.edit', compact('wilayah'));
    }

    // Update data wilayah yang sudah ada
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'kelurahan' => 'nullable|string|max:255',
            'kodepos' => 'nullable|string|max:10'
        ]);

        $wilayah->update($request->all());
        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil diperbarui');
    }

    // Menghapus data wilayah dari database
    public function destroy(Wilayah $wilayah)
    {
        $wilayah->delete();
        return redirect()->route('admin.wilayah.index')->with('success', 'Wilayah berhasil dihapus');
    }
}