<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari pendaftar..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Cari pendaftar...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-bell fa-fw text-warning"></i>
                <span class="badge badge-danger badge-counter" id="notificationCount" style="display: none;">0</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" id="notificationDropdown">
                <h6 class="dropdown-header">Notifikasi</h6>
                <div id="notificationList">
                    <div class="dropdown-item text-center text-gray-500">
                        <i class="fas fa-check-circle fa-2x mb-2"></i>
                        <p class="mb-0">Tidak ada notifikasi baru</p>
                    </div>
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Notifikasi</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-envelope fa-fw text-info"></i>
                <span class="badge badge-danger badge-counter" id="messageCount" style="display: none;">0</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" id="messageDropdown">
                <h6 class="dropdown-header">Pesan</h6>
                <div id="messageList">
                    <div class="dropdown-item text-center text-gray-500">
                        <i class="fas fa-envelope-open fa-2x mb-2"></i>
                        <p class="mb-0">Tidak ada pesan baru</p>
                    </div>
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="#">Lihat Semua Pesan</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - Quick Actions -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="quickActionsDropdown" role="button" data-toggle="dropdown">
                <i class="fas fa-plus fa-fw text-success"></i>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <h6 class="dropdown-header">Tambah Data</h6>
                <a class="dropdown-item" href="{{ route('admin.jurusan.create') }}">
                    <i class="fas fa-graduation-cap fa-sm fa-fw mr-2 text-primary"></i>
                    Jurusan Baru
                </a>
                <a class="dropdown-item" href="{{ route('admin.gelombang.create') }}">
                    <i class="fas fa-calendar-alt fa-sm fa-fw mr-2 text-info"></i>
                    Gelombang Baru
                </a>
                <a class="dropdown-item" href="{{ route('admin.pengguna.create') }}">
                    <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-success"></i>
                    Pengguna Baru
                </a>
            </div>
        </li>

        <!-- Nav Item - Settings -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link" href="#">
                <i class="fas fa-cogs fa-fw text-warning"></i>
            </a>
        </li>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <strong>Administrator</strong>
                </span>
                <img class="img-profile rounded-circle" src="{{ asset('assets_admin/img/undraw_profile.svg') }}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                <div class="dropdown-header">
                    <i class="fas fa-user-shield fa-sm mr-1"></i>
                    Administrator
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-warning"></i>
                    Pengaturan
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-info"></i>
                    Log Aktivitas
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>