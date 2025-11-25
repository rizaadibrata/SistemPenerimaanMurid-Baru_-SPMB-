@extends('admin.layouts.main')

@section('title', 'Kelola Gelombang')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Kelola Gelombang</h1>
        <p class="mb-0 text-gray-600">Pendaftaran PPDB</p>
    </div>
    <a href="{{ route('admin.gelombang.create') }}" class="btn btn-primary">
        <i class="fas fa-plus fa-sm"></i> Tambah Gelombang
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Gelombang Pendaftaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Gelombang</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Biaya Pendaftaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gelombangs ?? [] as $index => $gelombang)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $gelombang->nama }}</td>
                        <td>{{ date('d/m/Y', strtotime($gelombang->tanggal_mulai)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($gelombang->tanggal_selesai)) }}</td>
                        <td>Rp {{ number_format($gelombang->harga, 0, ',', '.') }}</td>
                        <td>
                            @if($gelombang->aktif)
                                <span class="badge badge-success">Aktif</span>
                            @else
                                <span class="badge badge-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.gelombang.edit', $gelombang) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.gelombang.destroy', $gelombang) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus gelombang ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data gelombang</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection