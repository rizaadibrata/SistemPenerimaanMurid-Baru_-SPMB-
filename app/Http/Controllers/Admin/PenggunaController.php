<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    // Menampilkan daftar pengguna dengan role admin, verifikator, keuangan, dan kepsek
    public function index()
    {
        $penggunas = Pengguna::whereIn('role', ['admin', 'verifikator_adm', 'keuangan', 'kepsek'])
                            ->orderBy('nama')->get();
        return view('admin.admin.pengguna.index', compact('penggunas'));
    }

    // Menampilkan form untuk menambah pengguna baru
    public function create()
    {
        return view('admin.admin.pengguna.create');
    }

    // Menyimpan data pengguna baru dengan validasi dan enkripsi password
    public function store(Request $request)
    {
        // Validasi input dengan aturan email unik dan password minimal 6 karakter
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pengguna',
            'hp' => 'required',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,verifikator_adm,keuangan,kepsek'
        ]);

        // Simpan pengguna baru dengan password yang di-hash
        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'hp' => $request->hp,
            'password_hash' => Hash::make($request->password),
            'role' => $request->role,
            'aktif' => 1
        ]);

        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    // Menampilkan form edit untuk pengguna tertentu
    public function edit(Pengguna $pengguna)
    {
        return view('admin.admin.pengguna.edit', compact('pengguna'));
    }

    // Update data pengguna dengan validasi email unik kecuali untuk data yang sedang diedit
    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
            'hp' => 'required',
            'role' => 'required|in:admin,verifikator_adm,keuangan,kepsek'
        ]);

        $data = $request->only(['nama', 'email', 'hp', 'role', 'aktif']);
        
        // Update password hanya jika diisi
        if ($request->password) {
            $data['password_hash'] = Hash::make($request->password);
        }

        $pengguna->update($data);
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil diupdate');
    }

    // Menghapus data pengguna dari database
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('admin.pengguna.index')->with('success', 'Pengguna berhasil dihapus');
    }
}