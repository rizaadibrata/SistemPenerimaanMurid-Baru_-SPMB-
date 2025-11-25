<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    @if(request()->is('keuangan*'))
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('keuangan.dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <div class="sidebar-brand-text mx-2"><strong>KEUANGAN</strong></div>
        </a>
    @elseif(request()->is('verifikator*'))
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('verifikator.dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-file-check"></i>
            </div>
            <div class="sidebar-brand-text mx-2"><strong>VERIFIKATOR</strong></div>
        </a>
    @elseif(request()->is('kepsek*'))
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('kepsek.dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="sidebar-brand-text mx-2"><strong>KEPSEK</strong></div>
        </a>
    @else
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="sidebar-brand-text mx-2"><strong>ADMIN</strong></div>
        </a>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard', 'keuangan.dashboard', 'verifikator.dashboard') ? 'active' : '' }}">
        @if(request()->is('keuangan*'))
            <a class="nav-link" href="{{ route('keuangan.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @elseif(request()->is('verifikator*'))
            <a class="nav-link" href="{{ route('verifikator.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @elseif(request()->is('kepsek*'))
            <a class="nav-link" href="{{ route('kepsek.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @else
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        @endif
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if(request()->is('keuangan*'))
        <!-- Heading -->
        <div class="sidebar-heading text-uppercase">Kelola Pembayaran</div>

        <!-- Nav Item - Verifikasi Pembayaran -->
        <li class="nav-item {{ request()->routeIs('keuangan.verifikasi') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('keuangan.verifikasi') }}">
                <i class="fas fa-fw fa-search"></i>
                <span>Verifikasi Pembayaran</span>
            </a>
        </li>

        <!-- Nav Item - Rekap Pembayaran -->
        <li class="nav-item {{ request()->routeIs('keuangan.rekap') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('keuangan.rekap') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Rekap Pembayaran</span>
            </a>
        </li>

        <!-- Nav Item - Daftar Pembayaran -->
        <li class="nav-item {{ request()->routeIs('keuangan.daftar') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('keuangan.daftar') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Daftar Pembayaran</span>
            </a>
        </li>
    @elseif(request()->is('verifikator*'))
        <!-- Heading -->
        <div class="sidebar-heading text-uppercase">Verifikasi Berkas</div>

        <!-- Nav Item - Verifikasi Berkas -->
        <li class="nav-item {{ request()->routeIs('verifikator.verifikasi') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('verifikator.verifikasi') }}">
                <i class="fas fa-fw fa-file-check"></i>
                <span>Verifikasi Berkas</span>
            </a>
        </li>

        <!-- Nav Item - Daftar Pendaftar -->
        <li class="nav-item {{ request()->routeIs('verifikator.daftar') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('verifikator.daftar') }}">
                <i class="fas fa-fw fa-list"></i>
                <span>Daftar Pendaftar</span>
            </a>
        </li>
    @elseif(request()->is('kepsek*'))
        <!-- Heading -->
        <div class="sidebar-heading text-uppercase">Laporan & Data</div>

        <!-- Nav Item - Daftar Calon -->
        <li class="nav-item {{ request()->routeIs('kepsek.daftar-calon') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kepsek.daftar-calon') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Daftar Calon Siswa</span>
            </a>
        </li>

        <!-- Nav Item - Siswa Diterima -->
        <li class="nav-item {{ request()->routeIs('kepsek.diterima') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kepsek.diterima') }}">
                <i class="fas fa-fw fa-check-circle"></i>
                <span>Siswa Diterima</span>
            </a>
        </li>

        <!-- Nav Item - Rekap Pembayaran -->
        <li class="nav-item {{ request()->routeIs('kepsek.rekap-pembayaran') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kepsek.rekap-pembayaran') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>Rekap Pembayaran</span>
            </a>
        </li>

        <!-- Nav Item - Asal Sekolah -->
        <li class="nav-item {{ request()->routeIs('kepsek.asal-sekolah') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kepsek.asal-sekolah') }}">
                <i class="fas fa-fw fa-school"></i>
                <span>Data Asal Sekolah</span>
            </a>
        </li>

        <!-- Nav Item - Asal Wilayah -->
        <li class="nav-item {{ request()->routeIs('kepsek.asal-wilayah') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kepsek.asal-wilayah') }}">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Data Asal Wilayah</span>
            </a>
        </li>
    @else
        <!-- Heading -->
        <div class="sidebar-heading text-uppercase">Data Master</div>

        <!-- Nav Item - Jurusan -->
        <li class="nav-item {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.jurusan.index') }}">
                <i class="fas fa-fw fa-graduation-cap"></i>
                <span>Jurusan</span>
            </a>
        </li>

        <!-- Nav Item - Gelombang -->
        <li class="nav-item {{ request()->routeIs('admin.gelombang.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.gelombang.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Gelombang</span>
            </a>
        </li>

        <!-- Nav Item - Wilayah -->
        <li class="nav-item {{ request()->routeIs('admin.wilayah.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.wilayah.index') }}">
                <i class="fas fa-fw fa-map-marker-alt"></i>
                <span>Wilayah</span>
            </a>
        </li>

        <!-- Nav Item - Pengguna -->
        <li class="nav-item {{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.pengguna.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Pengguna</span>
            </a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>