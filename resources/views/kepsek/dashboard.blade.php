@extends('admin.layouts.main')

@section('title', 'Dashboard Kepala Sekolah')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-0 text-gray-800" style="white-space: nowrap;">Dashboard Kepala Sekolah</h1>
        <p class="mb-0 text-gray-600">Monitoring PPDB - Bakti Nusantara 666</p>
    </div>
    <div class="d-none d-sm-inline-block">
        <div class="btn btn-sm btn-outline-primary">
            <i class="fas fa-calendar fa-sm"></i> {{ date('d F Y') }}
        </div>
    </div>
</div>

<!-- Content Row -->
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
                        <i class="fas fa-users fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Diterima</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diterima }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-check fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Pembayaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-chart-line fa-2x text-gray-300"></i>
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
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Terverifikasi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $terverifikasi }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row mb-4">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Pendaftaran Bulanan</h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="position: relative; height: 300px;">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status Pendaftar</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Asal Wilayah -->
<div class="row mb-5">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Asal Wilayah Pendaftar (Top 10 Kabupaten)</h6>
            </div>
            <div class="card-body">
                @if(empty($wilayahData['labels']))
                    <div class="text-center py-5">
                        <i class="fas fa-chart-bar fa-3x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">Belum Ada Data Pendaftar</h5>
                        <p class="text-gray-400">Grafik akan muncul setelah ada siswa yang mendaftar</p>
                    </div>
                @else
                    <div class="chart-area" style="position: relative; height: 400px;">
                        <canvas id="wilayahChart"></canvas>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Distribusi Asal Wilayah</h6>
            </div>
            <div class="card-body">
                @if(empty($wilayahData['labels']))
                    <div class="text-center py-5">
                        <i class="fas fa-chart-pie fa-3x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">Belum Ada Data</h5>
                    </div>
                @else
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="wilayahPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        @foreach($wilayahData['labels'] as $index => $label)
                            <span class="mr-2">
                                <i class="fas fa-circle" style="color: {{ ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69', '#6f42c1', '#e83e8c', '#fd7e14'][$index % 10] }}"></i>
                                {{ $label }}: {{ $wilayahData['data'][$index] }} pendaftar
                            </span><br>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
var ctx = document.getElementById("myAreaChart");
var chartData = {!! json_encode($chartData) !!};
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Pendaftar",
            data: chartData,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)"
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true
    }
});

var ctx2 = document.getElementById("myPieChart");
var statusData = {!! json_encode($statusData) !!};
var myPieChart = new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ["Menunggu", "Terverifikasi", "Diterima"],
        datasets: [{
            data: [statusData.submit, statusData.terverifikasi, statusData.diterima],
            backgroundColor: ['#f6c23e', '#1cc88a', '#36b9cc']
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true
    }
});

// Grafik Asal Wilayah
var wilayahData = {!! json_encode($wilayahData) !!};
if (wilayahData.labels.length > 0) {
    var ctx3 = document.getElementById("wilayahChart");
    var wilayahChart = new Chart(ctx3, {
        type: 'line',
        data: {
            labels: wilayahData.labels,
            datasets: [{
                label: "Pendaftar",
                data: wilayahData.data,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                borderWidth: 2,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0,0,0,.1)"
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: true,
                        color: "rgba(0,0,0,.1)"
                    }
                }]
            },
            legend: {
                display: true
            }
        }
    });

    // Pie Chart Wilayah
    var ctx4 = document.getElementById("wilayahPieChart");
    var colors = ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69', '#6f42c1', '#e83e8c', '#fd7e14'];
    var wilayahPieChart = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            labels: wilayahData.labels,
            datasets: [{
                data: wilayahData.data,
                backgroundColor: colors.slice(0, wilayahData.labels.length)
            }]
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            }
        }
    });
}

</script>
@endpush