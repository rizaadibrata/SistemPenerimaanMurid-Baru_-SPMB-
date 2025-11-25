@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
        <p class="mb-0 text-gray-600">Kelola Data Master - Bakti Nusantara 666</p>
    </div>
    <div class="d-none d-sm-inline-block">
        <div class="btn btn-sm btn-outline-primary">
            <i class="fas fa-calendar fa-sm"></i> {{ date('d F Y') }}
        </div>
    </div>
</div>

<!-- Statistics Row -->
<div class="row">
    @if(in_array(session('admin_role'), ['admin', 'verifikator_adm']))
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPendaftar ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Menunggu Verifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $menungguVerifikasi ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $terverifikasi ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ditolak</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ditolak ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Second Statistics Row -->
<div class="row">
    @if(in_array(session('admin_role'), ['admin', 'keuangan']))
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sudah Bayar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sudahBayar ?? 0 }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Jurusan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalJurusan ?? 0 }}</div>
                        <div class="text-xs text-success">{{ $jurusanAktif ?? 0 }} aktif</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Gelombang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGelombang ?? 0 }}</div>
                        <div class="text-xs text-success">{{ $gelombangAktif ?? 0 }} aktif</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Total Pengguna</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPengguna ?? 0 }}</div>
                        <div class="text-xs text-success">Aktif</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
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
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, Admin</h6>
            </div>
            <div class="card-body">
                <p class="mb-2">Anda login sebagai <strong class="text-primary">Admin</strong></p>
                <p class="mb-3">Gunakan menu di sidebar untuk mengelola sistem PPDB Bakti Nusantara 666.</p>
                
                @if(session('admin_role') === 'admin')
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>Info:</strong> Sebagai admin, Anda memiliki akses penuh ke semua fitur sistem.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                @endif
                
                <div class="text-center mt-3">
                    <i class="fas fa-school fa-3x text-gray-300 mb-2"></i>
                    <h6 class="text-gray-600">Bakti Nusantara 666</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="col-xl-3 col-lg-3 mb-4">
        @if(in_array(session('admin_role'), ['admin']))
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-primary btn-sm btn-block mb-2">
                    <i class="fas fa-graduation-cap"></i> Jurusan
                </a>
                <a href="{{ route('admin.pengguna.index') }}" class="btn btn-success btn-sm btn-block mb-2">
                    <i class="fas fa-users"></i> Pengguna
                </a>
                <a href="{{ route('admin.gelombang.index') }}" class="btn btn-info btn-sm btn-block mb-2">
                    <i class="fas fa-calendar-alt"></i> Gelombang
                </a>
                <a href="{{ route('admin.wilayah.index') }}" class="btn btn-warning btn-sm btn-block">
                    <i class="fas fa-map-marker-alt"></i> Wilayah
                </a>
            </div>
        </div>
        @else
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Menu Tersedia</h6>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-user-shield fa-3x text-gray-300 mb-3"></i>
                <p class="text-gray-600">Menu sesuai dengan role Anda tersedia di sidebar</p>
            </div>
        </div>
        @endif
    </div>
        
    <!-- Jurusan Populer Card -->
    <div class="col-xl-3 col-lg-3 mb-4">
        <div class="card shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jurusan Terpopuler</h6>
            </div>
            <div class="card-body">
                @if(isset($jurusanStats) && $jurusanStats->count() > 0)
                    @foreach($jurusanStats as $jurusan)
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <div class="font-weight-bold text-sm">{{ $jurusan->nama }}</div>
                            <div class="text-xs text-gray-600">{{ $jurusan->kode }}</div>
                        </div>
                        <span class="badge badge-primary">{{ $jurusan->pendaftar_count }}</span>
                    </div>
                    @if(!$loop->last)<hr class="my-2">@endif
                    @endforeach
                @else
                    <div class="text-center">
                        <i class="fas fa-graduation-cap fa-3x text-gray-300 mb-3"></i>
                        <p class="text-gray-600 text-sm mb-0">Belum ada data pendaftar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity Row -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
            </div>
            <div class="card-body">
                @if(isset($recentActivity) && $recentActivity->count() > 0)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>No. Pendaftaran</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentActivity as $activity)
                            <tr>
                                <td>{{ $activity->no_pendaftaran }}</td>
                                <td>{{ $activity->pengguna->nama ?? 'N/A' }}</td>
                                <td>{{ $activity->jurusan->nama ?? 'N/A' }}</td>
                                <td>
                                    @switch($activity->status)
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
                                            <span class="badge badge-light">{{ $activity->status }}</span>
                                    @endswitch
                                </td>
                                <td>{{ $activity->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p class="text-gray-600 mb-0">Belum ada aktivitas terbaru</p>
                @endif
            </div>
        </div>
    </div>
</div>

@if(in_array(session('admin_role'), ['admin', 'kepsek']))
<!-- Content Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Pendaftaran</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status Pendaftar</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Menunggu ({{ $statusData['submit'] ?? 0 }})
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Terverifikasi ({{ $statusData['terverifikasi'] ?? 0 }})
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Lunas ({{ $statusData['lunas'] ?? 0 }})
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
if (ctx) {
    var chartData = {!! json_encode($chartData ?? [1, 2, 1, 3, 2, 4, 3, 5, 4, 6, 5, 7]) !!};
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pendaftar",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: chartData
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10
            }
        }
    });
}

// Pie Chart Example
var ctx2 = document.getElementById("myPieChart");
if (ctx2) {
    var statusData = {
        submit: {{ $statusData['submit'] ?? 2 }},
        terverifikasi: {{ $statusData['terverifikasi'] ?? 3 }},
        lunas: {{ $statusData['lunas'] ?? 1 }}
    };
    var myPieChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ["Menunggu Verifikasi", "Terverifikasi", "Lunas"],
            datasets: [{
                data: [statusData.submit, statusData.terverifikasi, statusData.lunas],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)"
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80
        }
    });
}
</script>
@endpush