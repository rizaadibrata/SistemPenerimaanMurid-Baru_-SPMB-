@extends('admin.layouts.main')

@section('title', 'Rekap Pembayaran')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Pembayaran</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran Terverifikasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama</th>
                        <th>Nominal</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembayaran as $index => $item)
                    <tr>
                        <td>{{ $pembayaran->firstItem() + $index }}</td>
                        <td>{{ $item->pendaftar->no_pendaftaran }}</td>
                        <td>{{ $item->pendaftar->pengguna->nama }}</td>
                        <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal_bayar->format('d/m/Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pembayaran terverifikasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pembayaran->links() }}
    </div>
</div>
@endsection