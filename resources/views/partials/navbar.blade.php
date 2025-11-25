<header id="header" class="header fixed-top">



  <div class="branding d-flex align-items-center" style="backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(15px); background: transparent !important;">

    <div class="container position-relative d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/logopng.png') }}" alt="Logo" style="height: 100px; width: auto; margin-right: 15px;">
        <h1 class="sitename" style="font-weight: 800; font-size: 1.4rem; letter-spacing: 0.3px; white-space: nowrap;">SMK BAKTI NUSANTARA 666</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ url('/') }}" {{ request()->is('/') ? 'class=active' : '' }}>Home</a></li>
          <li><a href="{{ url('/about') }}" {{ request()->is('about') ? 'class=active' : '' }}>Tentang</a></li>
          <li><a href="{{ route('jurusan') }}" {{ request()->is('jurusan') ? 'class=active' : '' }}>Jurusan</a></li>
          <li><a href="{{ url('/fasilitas') }}" {{ request()->is('fasilitas') ? 'class=active' : '' }}>Fasilitas</a></li>
          <li><a href="{{ route('prestasi') }}" {{ request()->is('prestasi') ? 'class=active' : '' }}>Prestasi</a></li>
          <li><a href="{{ route('ppdb') }}" {{ request()->is('ppdb') ? 'class=active' : '' }}>Informasi SPMB</a></li>
          <li><a href="{{ url('/contact') }}" {{ request()->is('contact') ? 'class=active' : '' }}>Kontak</a></li>
          
          @if(Auth::check())
            <li class="dropdown profile-dropdown">
              <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="profile-avatar">
                  <i class="bi bi-person-circle"></i>
                </div>
                <span class="profile-name">{{ Auth::user()->name }}</span>
                <i class="bi bi-chevron-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('pendaftaran.profile') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('pendaftaran.status') }}"><i class="bi bi-clipboard-check me-2"></i>Status</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="{{ route('pendaftaran.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="bi bi-box-arrow-right me-2"></i>Log out
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>

  </div>

</header>
