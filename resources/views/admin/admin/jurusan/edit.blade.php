@extends('admin.layouts.main')

@section('title', 'Edit Jurusan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Jurusan</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.jurusan.update', $jurusan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Kode Jurusan</label>
                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $jurusan->kode) }}" required>
                @error('kode')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $jurusan->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Kuota</label>
                <input type="number" name="kuota" class="form-control @error('kuota') is-invalid @enderror" value="{{ old('kuota', $jurusan->kuota) }}" required>
                @error('kuota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Status</label>
                <select name="aktif" class="form-control" required>
                    <option value="1" {{ old('aktif', $jurusan->aktif) == '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('aktif', $jurusan->aktif) == '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection