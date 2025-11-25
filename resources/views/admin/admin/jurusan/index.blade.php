@extends('admin.layouts.main')

@section('title', 'Data Jurusan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
    <a href="{{ route('admin.jurusan.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Jurusan
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Jurusan</th>
                        <th>Kuota</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jurusans as $jurusan)
                    <tr>
                        <td>{{ $jurusan->kode }}</td>
                        <td>{{ $jurusan->nama }}</td>
                        <td>{{ $jurusan->kuota }}</td>
                        <td>
                            <span class="badge badge-{{ $jurusan->aktif ? 'success' : 'secondary' }}">
                                {{ $jurusan->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.jurusan.edit', $jurusan) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.jurusan.destroy', $jurusan) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection