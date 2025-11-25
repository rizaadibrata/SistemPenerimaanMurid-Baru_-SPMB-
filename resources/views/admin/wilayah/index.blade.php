@extends('admin.layouts.main')

@section('title', 'Kelola Wilayah')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Kelola Wilayah</h1>
        <p class="mb-0 text-gray-600">Data Wilayah Indonesia</p>
    </div>

</div>

<div class="card shadow mb-4 fade-in">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Wilayah Indonesia</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Kelurahan</th>
                        <th>Kode Pos</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($wilayahs ?? [] as $index => $wilayah)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $wilayah->provinsi }}</td>
                        <td>{{ $wilayah->kabupaten }}</td>
                        <td>{{ $wilayah->kecamatan }}</td>
                        <td>{{ $wilayah->kelurahan }}</td>
                        <td>{{ $wilayah->kodepos }}</td>
                        <td>
                            <a href="{{ route('admin.wilayah.edit', $wilayah) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.wilayah.destroy', $wilayah) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus wilayah ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data wilayah</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection