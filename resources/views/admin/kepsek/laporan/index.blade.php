@extends('admin.layouts.main')

@section('title', 'Laporan PPDB')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporan PPDB</h1>
</div>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPendaftar }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Terverifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $terverifikasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah Bayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sudahBayar }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Persentase</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPendaftar > 0 ? round(($terverifikasi / $totalPendaftar) * 100, 1) : 0 }}%</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-percentage fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Per Jurusan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Jurusan</th>
                        <th>Kuota</th>
                        <th>Total Pendaftar</th>
                        <th>Terverifikasi</th>
                        <th>Sudah Bayar</th>
                        <th>Persentase Terisi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporanJurusan as $jurusan)
                    <tr>
                        <td>{{ $jurusan->nama }}</td>
                        <td>{{ $jurusan->kuota }}</td>
                        <td>{{ $jurusan->pendaftar_count }}</td>
                        <td>{{ $jurusan->terverifikasi_count }}</td>
                        <td>{{ $jurusan->lunas_count }}</td>
                        <td>
                            @php
                                $persentase = $jurusan->kuota > 0 ? round(($jurusan->pendaftar_count / $jurusan->kuota) * 100, 1) : 0;
                            @endphp
                            <div class="progress">
                                <div class="progress-bar" style="width: {{ min($persentase, 100) }}%">
                                    {{ $persentase }}%
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection