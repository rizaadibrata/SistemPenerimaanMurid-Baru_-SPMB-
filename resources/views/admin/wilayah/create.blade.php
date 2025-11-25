@extends('admin.layouts.main')

@section('title', 'Tambah Wilayah')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Tambah Wilayah</h1>
        <p class="mb-0 text-gray-600">Tambah data wilayah baru</p>
    </div>
    <a href="{{ route('admin.wilayah.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Wilayah</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.wilayah.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" 
                               id="provinsi" name="provinsi" value="{{ old('provinsi') }}" required>
                        @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kabupaten">Kabupaten/Kota</label>
                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" 
                               id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}">
                        @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" 
                               id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                        @error('kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelurahan">Kelurahan/Desa</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" 
                               id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
                        @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kodepos">Kode Pos</label>
                        <input type="text" class="form-control @error('kodepos') is-invalid @enderror" 
                               id="kodepos" name="kodepos" value="{{ old('kodepos') }}" maxlength="10">
                        @error('kodepos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.wilayah.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection