@extends('admin.layouts.main')

@section('title', 'Data Asal Sekolah')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Asal Sekolah</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Asal Sekolah Pendaftar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Jumlah Pendaftar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($asalSekolah as $index => $item)
                    <tr>
                        <td>{{ $asalSekolah->firstItem() + $index }}</td>
                        <td>{{ $item->nama_sekolah }}</td>
                        <td>{{ $item->jumlah }} siswa</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Belum ada data asal sekolah</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $asalSekolah->links() }}
    </div>
</div>
@endsection