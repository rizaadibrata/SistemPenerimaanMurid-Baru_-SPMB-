@extends('admin.layouts.main')

@section('title', 'Data Pengguna')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
    <a href="{{ route('admin.pengguna.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengguna
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>HP</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penggunas as $pengguna)
                    <tr>
                        <td>{{ $pengguna->nama }}</td>
                        <td>{{ $pengguna->email }}</td>
                        <td>{{ $pengguna->hp }}</td>
                        <td>
                            <span class="badge badge-info">{{ ucfirst(str_replace('_', ' ', $pengguna->role)) }}</span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $pengguna->aktif ? 'success' : 'secondary' }}">
                                {{ $pengguna->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.pengguna.edit', $pengguna) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.pengguna.destroy', $pengguna) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pengguna ini?')">Hapus</button>
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