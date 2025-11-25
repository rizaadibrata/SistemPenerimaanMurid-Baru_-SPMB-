<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gelombang;
use Illuminate\Http\Request;

class GelombangController extends Controller
{
    // Menampilkan daftar semua gelombang, diurutkan dari yang terbaru
    public function index()
    {
        $gelombangs = Gelombang::orderBy('created_at', 'desc')->get();
        return view('admin.gelombang.index', compact('gelombangs'));
    }

    // Menampilkan form untuk menambah gelombang baru
    public function create()
    {
        return view('admin.gelombang.create');
    }

    // Menyimpan data gelombang baru ke database dengan validasi
    public function store(Request $request)
    {
        // Validasi input: nama harus unik, tanggal selesai harus setelah tanggal mulai
        $request->validate([
            'nama' => 'required|string|max:255|unique:gelombang',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'harga' => 'required|numeric|min:0',
            'aktif' => 'boolean'
        ], [
            'nama.unique' => 'Nama gelombang sudah digunakan'
        ]);

        // Simpan data ke database
        Gelombang::create($request->all());
        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil ditambahkan');
    }

    // Menampilkan form edit untuk gelombang tertentu
    public function edit(Gelombang $gelombang)
    {
        return view('admin.gelombang.edit', compact('gelombang'));
        // compact itu buat ngirim data ke view
    }

    // Memperbarui data gelombang yang udah ada
    public function update(Request $request, Gelombang $gelombang)
    {
        // Validasi input nama harus unik kecuali untuk data yang sedang diedit
        $request->validate([
            'nama' => 'required|string|max:255|unique:gelombang,nama,' . $gelombang->id,
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'harga' => 'required|numeric|min:0',
            'aktif' => 'boolean'
        ], [
            'nama.unique' => 'Nama gelombang sudah digunakan'
        ]);

        // Update data di database
        $gelombang->update($request->all());
        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil diperbarui');
    }

    // Menghapus data gelombang dari database
    public function destroy(Gelombang $gelombang)
    {
        $gelombang->delete();
        return redirect()->route('admin.gelombang.index')->with('success', 'Gelombang berhasil dihapus');
    }
}
