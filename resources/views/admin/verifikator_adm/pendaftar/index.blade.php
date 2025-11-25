@extends('admin.layouts.main')

@section('title', 'Data Pendaftar')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pendaftar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Status Verifikasi</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftars as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->no_pendaftaran }}</td>
                        <td>{{ $pendaftar->pengguna->nama }}</td>
                        <td>{{ $pendaftar->jurusan->nama }}</td>
                        <td>
                            @if($pendaftar->status_verifikasi == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @elseif($pendaftar->status_verifikasi == 'terverifikasi')
                                <span class="badge badge-success">Terverifikasi</span>
                            @else
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>{{ $pendaftar->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.pendaftar.show', $pendaftar) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection