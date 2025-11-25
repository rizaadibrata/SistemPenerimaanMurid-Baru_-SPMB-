@extends('admin.layouts.main')

@section('title', 'Dashboard Keuangan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800">Dashboard Keuangan</h1>
        <p class="mb-0 text-gray-600">Kelola Pembayaran PPDB</p>
    </div>
    <div class="d-none d-sm-inline-block">
        <div class="btn btn-sm btn-outline-primary">
            <i class="fas fa-calendar fa-sm"></i> {{ date('d F Y') }}
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Total Pembayaran Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pembayaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPembayaran }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
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

    <!-- Total Nominal Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Nominal</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalNominal, 0, ',', '.') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Welcome Card -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Selamat Datang, Staff Keuangan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p class="mb-2">Anda login sebagai <strong class="text-primary">Staff Keuangan</strong></p>
                        <p class="mb-3">Gunakan menu di sidebar untuk mengelola pembayaran PPDB SMK Bina Nusantara.</p>
                        
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <i class="fas fa-info-circle"></i>
                            <strong>Info:</strong> Verifikasi pembayaran siswa dengan teliti untuk memastikan keakuratan data.
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <i class="fas fa-money-check-alt fa-5x mb-3" style="color: #1cc88a;"></i>
                        <h6 style="color: #1cc88a; font-weight: 600;">Keuangan PPDB</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Menu Keuangan</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('keuangan.verifikasi') }}" class="btn btn-warning btn-sm btn-block mb-2">
                    <i class="fas fa-search"></i> Verifikasi Pembayaran
                </a>
                <a href="{{ route('keuangan.rekap') }}" class="btn btn-success btn-sm btn-block mb-2">
                    <i class="fas fa-chart-bar"></i> Rekap Pembayaran
                </a>
                <a href="{{ route('keuangan.daftar') }}" class="btn btn-info btn-sm btn-block">
                    <i class="fas fa-list"></i> Daftar Pembayaran
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Pembayaran Bulanan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="paymentChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status Pembayaran</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="paymentStatusChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Menunggu ({{ $menungguVerifikasi ?? 2 }})
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Terverifikasi ({{ $terverifikasi ?? 5 }})
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Payment Chart
var ctx1 = document.getElementById("paymentChart");
if (ctx1) {
    var paymentData = {!! json_encode($chartData ?? [2, 4, 3, 6, 5, 8, 7, 9, 8, 10, 9, 12]) !!};
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
            datasets: [{
                label: "Pembayaran",
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
                data: paymentData
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

// Payment Status Chart
var ctx2 = document.getElementById("paymentStatusChart");
if (ctx2) {
    var statusData = {
        menunggu: {{ $menungguVerifikasi ?? 2 }},
        terverifikasi: {{ $terverifikasi ?? 5 }}
    };
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ["Menunggu Verifikasi", "Terverifikasi"],
            datasets: [{
                data: [statusData.menunggu, statusData.terverifikasi],
                backgroundColor: ['#f6c23e', '#1cc88a'],
                hoverBackgroundColor: ['#dda20a', '#17a673'],
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