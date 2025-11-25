@extends('admin.layouts.main')

@section('title', 'Edit Data Pendaftar')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data Pendaftar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $pendaftar->no_pendaftaran }} - {{ $pendaftar->pengguna->nama }}</h6>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('verifikator.update', $pendaftar->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ $pendaftar->dataSiswa->nama ?? '' }}" required>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>NISN</label>
                    <input type="text" name="nisn" class="form-control" value="{{ $pendaftar->dataSiswa->nisn ?? '' }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{ $pendaftar->dataSiswa->nik ?? '' }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" {{ $pendaftar->dataSiswa->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $pendaftar->dataSiswa->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Jurusan</label>
                    <select name="jurusan_id" class="form-control" required>
                        <option value="">Pilih Jurusan</option>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" {{ $pendaftar->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                                {{ $jurusan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $pendaftar->dataSiswa->alamat ?? '' }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('verifikator.daftar') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
