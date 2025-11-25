@extends('admin.layouts.main')

@section('title', 'Data Asal Wilayah')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Asal Wilayah</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Asal Wilayah Pendaftar</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Jumlah Pendaftar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wilayah as $index => $item)
                    <tr>
                        <td>{{ $wilayah->firstItem() + $index }}</td>
                        <td>{{ $item->provinsi }}</td>
                        <td>{{ $item->kabupaten }}</td>
                        <td>{{ $item->kecamatan }}</td>
                        <td>{{ $item->kelurahan }}</td>
                        <td>{{ $item->jumlah }} siswa</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data asal wilayah</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $wilayah->links() }}
    </div>
</div>
@endsection