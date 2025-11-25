@extends('admin.layouts.main')

@section('title', 'Daftar Pendaftar')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pendaftar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Semua Pendaftar</h6>
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
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $pendaftar->firstItem() + $index }}</td>
                        <td>{{ $item->no_pendaftaran }}</td>
                        <td>{{ $item->pengguna->nama }}</td>
                        <td>{{ $item->jurusan->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal_daftar->format('d/m/Y') }}</td>
                        <td>
                            @switch($item->status)
                                @case('DRAFT')
                                    <span class="badge badge-secondary">Draft</span>
                                    @break
                                @case('SUBMIT')
                                    <span class="badge badge-warning">Menunggu Verifikasi</span>
                                    @break
                                @case('ADM_PASS')
                                    <span class="badge badge-success">Terverifikasi</span>
                                    @break
                                @case('ADM_REJECT')
                                    <span class="badge badge-danger">Ditolak</span>
                                    @break
                                @case('ADM_REJECT_FINAL')
                                    <span class="badge badge-dark">Ditolak Final</span>
                                    @break
                                @case('PENDING_PAYMENT')
                                    <span class="badge badge-primary">Menunggu Pembayaran</span>
                                    @break
                                @case('PAID')
                                    <span class="badge badge-info">Lunas</span>
                                    @break
                                @case('ACCEPTED')
                                    <span class="badge badge-success">Diterima</span>
                                    @break
                                @default
                                    <span class="badge badge-light">{{ $item->status }}</span>
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('verifikator.detail', $item->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('verifikator.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('verifikator.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus" onclick="return confirm('Yakin hapus data pendaftar ini?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data pendaftar</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pendaftar->links() }}
    </div>
</div>
@endsection
