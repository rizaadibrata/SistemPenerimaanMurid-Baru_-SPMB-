<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Menampilkan daftar semua jurusan diurutkan berdasarkan nama
    public function index()
    {
        $jurusans = Jurusan::orderBy('nama')->get();
        return view('admin.admin.jurusan.index', compact('jurusans'));
    }

    // Menampilkan form untuk menambah jurusan baru
    public function create()
    {
        return view('admin.admin.jurusan.create');
    }

    // Menyimpan data jurusan baru dengan validasi kode unik
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:jurusan',
            'nama' => 'required',
            'kuota' => 'required|integer|min:1'
        ], [
            'kode.unique' => 'Kode jurusan sudah digunakan'
        ]);

        Jurusan::create($request->all());
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    // Menampilkan form edit untuk jurusan tertentu
    public function edit(Jurusan $jurusan)
    {
        return view('admin.admin.jurusan.edit', compact('jurusan'));
    }

    // Update data jurusan yang sudah ada
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'kode' => 'required|unique:jurusan,kode,' . $jurusan->id,
            'nama' => 'required',
            'kuota' => 'required|integer|min:1'
        ], [
            'kode.unique' => 'Kode jurusan sudah digunakan'
            // ini tuu error ketika kode duplikat atau udah ada di database
        ]);

        $jurusan->update($request->all());
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil diupdate');
    }

    // Menghapus data jurusan dari database
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        return redirect()->route('admin.jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
