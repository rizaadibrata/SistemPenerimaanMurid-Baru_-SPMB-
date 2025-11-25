@extends('admin.layouts.main')

@section('title', 'Edit Pengguna')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Pengguna</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.pengguna.update', $pengguna) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pengguna->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $pengguna->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror" value="{{ old('hp', $pengguna->hp) }}" required>
                @error('hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Password <small class="text-muted">(kosongkan jika tidak ingin mengubah)</small></label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control @error('role') is-invalid @enderror" required>
                    <option value="admin" {{ old('role', $pengguna->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="verifikator_adm" {{ old('role', $pengguna->role) == 'verifikator_adm' ? 'selected' : '' }}>Verifikator Admin</option>
                    <option value="keuangan" {{ old('role', $pengguna->role) == 'keuangan' ? 'selected' : '' }}>Keuangan</option>
                    <option value="kepsek" {{ old('role', $pengguna->role) == 'kepsek' ? 'selected' : '' }}>Kepala Sekolah</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Status</label>
                <select name="aktif" class="form-control" required>
                    <option value="1" {{ old('aktif', $pengguna->aktif) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('aktif', $pengguna->aktif) == '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection