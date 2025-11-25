@extends('admin.layouts.main')

@section('title', 'Calon Siswa Diterima')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Calon Siswa Diterima</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Siswa yang Diterima</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Tanggal Diterima</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $pendaftar->firstItem() + $index }}</td>
                        <td>{{ $item->no_pendaftaran }}</td>
                        <td>{{ $item->pengguna->nama }}</td>
                        <td>{{ $item->jurusan->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal_diterima ? $item->tanggal_diterima->format('d/m/Y') : $item->updated_at->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada siswa yang diterima</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pendaftar->links() }}
    </div>
</div>
@endsection