@extends('admin.layouts.main')

@section('title', 'Dashboard Verifikator')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Dashboard Verifikator</h1>
        <p class="mb-0 text-gray-600">Verifikasi Berkas Pendaftar</p>
    </div>
    <div class="d-none d-sm-inline-block">
        <div class="btn btn-sm btn-outline-primary">
            <i class="fas fa-calendar fa-sm"></i> {{ date('d F Y') }}
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Total Pendaftar Card -->
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

    <!-- Menunggu Verifikasi Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Verifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menungguVerifikasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terverifikasi Card -->
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

    <!-- Ditolak Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ditolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ditolak }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Content Row -->
<div class="row">
    <!-- Welcome Card -->
    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, Verifikator</h6>
            </div>
            <div class="card-body">
                <p class="mb-2">Anda login sebagai <strong class="text-primary">Verifikator</strong></p>
                <p class="mb-3">Gunakan menu di sidebar untuk verifikasi berkas pendaftar PPDB Bakti Nusantara 666.</p>
                
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>Info:</strong> Periksa berkas pendaftar dengan teliti sebelum melakukan verifikasi.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                
                <div class="text-center mt-3">
                    <i class="fas fa-file-check fa-3x text-gray-300 mb-2"></i>
                    <h6 class="text-gray-600">Bakti Nusantara 666</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="col-xl-3 col-lg-3 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Menu Verifikator</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('verifikator.verifikasi') }}" class="btn btn-warning btn-sm btn-block mb-2">
                    <i class="fas fa-search"></i> Verifikasi Berkas
                </a>
                <a href="{{ route('verifikator.daftar') }}" class="btn btn-info btn-sm btn-block">
                    <i class="fas fa-list"></i> Daftar Pendaftar
                </a>
            </div>
        </div>
    </div>

    <!-- Status Summary Card -->
    <div class="col-xl-3 col-lg-3 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ringkasan Status</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <div class="font-weight-bold text-sm">Menunggu</div>
                        <div class="text-xs text-gray-600">Perlu Verifikasi</div>
                    </div>
                    <span class="badge badge-warning">{{ $menungguVerifikasi ?? 0 }}</span>
                </div>
                <hr class="my-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <div class="font-weight-bold text-sm">Terverifikasi</div>
                        <div class="text-xs text-gray-600">Sudah Disetujui</div>
                    </div>
                    <span class="badge badge-success">{{ $terverifikasi ?? 0 }}</span>
                </div>
                <hr class="my-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="font-weight-bold text-sm">Ditolak</div>
                        <div class="text-xs text-gray-600">Tidak Memenuhi</div>
                    </div>
                    <span class="badge badge-danger">{{ $ditolak ?? 0 }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection