@extends('layouts.main')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Profile Pengguna</h1>
          <p class="mb-0">Kelola informasi akun dan data pribadi Anda</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('pendaftaran.status') }}">Dashboard</a></li>
        <li class="current">Profile</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Profile Section -->
<section class="section">
  <div class="container">
    
    <div class="row">
      <!-- Profile Info -->
      <div class="col-lg-4">
        <div class="profile-card" data-aos="fade-right">
          <div class="profile-header">
            <div class="profile-avatar-large">
              <i class="bi bi-person-circle"></i>
            </div>
            <h4>{{ Auth::user()->name }}</h4>
            <p class="text-muted">{{ Auth::user()->email }}</p>
            @if($pendaftar && $pendaftar->no_pendaftaran)
              <span class="badge bg-primary">{{ $pendaftar->no_pendaftaran }}</span>
            @endif
          </div>
          
          <div class="profile-stats">
            <div class="stat-item">
              <div class="stat-value">
                @if($pendaftar)
                  @if($pendaftar->status == 'PAID')
                    <span class="badge bg-success">Lunas</span>
                  @elseif($pendaftar->status == 'ADM_PASS')
                    <span class="badge bg-info">Lulus Administrasi</span>
                  @elseif($pendaftar->status == 'SUBMIT')
                    <span class="badge bg-warning">Menunggu Verifikasi</span>
                  @elseif($pendaftar->status == 'ADM_REJECT')
                    <span class="badge bg-danger">Ditolak</span>
                  @else
                    <span class="badge bg-secondary">{{ $pendaftar->status }}</span>
                  @endif
                @else
                  <span class="badge bg-secondary">Belum Mendaftar</span>
                @endif
              </div>
              <div class="stat-label">Status Pendaftaran</div>
            </div>
            
            <div class="stat-item">
              <div class="stat-value">
                @if($pendaftar && $pendaftar->tanggal_daftar)
                  {{ $pendaftar->tanggal_daftar->format('d M Y') }}
                @else
                  -
                @endif
              </div>
              <div class="stat-label">Tanggal Daftar</div>
            </div>
          </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="action-card" data-aos="fade-right" data-aos-delay="200">
          <h6><i class="bi bi-lightning me-2"></i>Aksi Cepat</h6>
          <div class="action-buttons">
            <a href="{{ route('pendaftaran.status') }}" class="btn btn-outline-primary btn-sm w-100 mb-2">
              <i class="bi bi-clipboard-check me-2"></i>Lihat Status
            </a>
            @if($pendaftar && !in_array($pendaftar->status, ['PAID']))
              <a href="{{ route('pendaftaran.edit') }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
                <i class="bi bi-pencil-square me-2"></i>Edit Data
              </a>
            @endif
            <form action="{{ route('pendaftaran.logout') }}" method="POST" class="d-inline w-100">
              @csrf
              <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                <i class="bi bi-box-arrow-right me-2"></i>Logout
              </button>
            </form>
          </div>
        </div>
      </div>
      
      <!-- Profile Details -->
      <div class="col-lg-8">
        
        <!-- Account Information -->
        <div class="info-card mb-4" data-aos="fade-left">
          <div class="card-header">
            <h5><i class="bi bi-person me-2"></i>Informasi Akun</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="info-item">
                  <label>Nama Lengkap</label>
                  <p>{{ Auth::user()->name }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label>Email</label>
                  <p>{{ Auth::user()->email }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label>Nomor HP</label>
                  <p>{{ $pengguna->hp ?? '-' }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label>Tanggal Bergabung</label>
                  <p>{{ Auth::user()->created_at->format('d F Y') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        @if($pendaftar)
        <!-- Personal Information -->
        <div class="info-card mb-4" data-aos="fade-left" data-aos-delay="200">
          <div class="card-header">
            <h5><i class="bi bi-card-text me-2"></i>Data Pribadi</h5>
          </div>
          <div class="card-body">
            <div class="row">
              @if($pendaftar->dataSiswa)
                <div class="col-md-6">
                  <div class="info-item">
                    <label>NISN</label>
                    <p>{{ $pendaftar->dataSiswa->nisn ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>NIK</label>
                    <p>{{ $pendaftar->dataSiswa->nik ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Tempat Lahir</label>
                    <p>{{ $pendaftar->dataSiswa->tmp_lahir ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Tanggal Lahir</label>
                    <p>{{ $pendaftar->dataSiswa->tgl_lahir ? $pendaftar->dataSiswa->tgl_lahir->format('d F Y') : '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Jenis Kelamin</label>
                    <p>{{ $pendaftar->dataSiswa->jk == 'L' ? 'Laki-laki' : ($pendaftar->dataSiswa->jk == 'P' ? 'Perempuan' : '-') }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Kode Pos</label>
                    <p>{{ $pendaftar->dataSiswa->kode_pos ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="info-item">
                    <label>Alamat</label>
                    <p>{{ $pendaftar->dataSiswa->alamat ?? '-' }}</p>
                  </div>
                </div>
              @else
                <div class="col-12">
                  <p class="text-muted">Data pribadi belum dilengkapi</p>
                </div>
              @endif
            </div>
          </div>
        </div>
        
        <!-- Education Information -->
        <div class="info-card mb-4" data-aos="fade-left" data-aos-delay="300">
          <div class="card-header">
            <h5><i class="bi bi-mortarboard me-2"></i>Informasi Pendidikan</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="info-item">
                  <label>Jurusan Pilihan 1</label>
                  <p>{{ $pendaftar->jurusan->nama ?? '-' }}</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label>Jurusan Pilihan 2</label>
                  <p>{{ $pendaftar->jurusanPilihan2->nama ?? '-' }}</p>
                </div>
              </div>
              @if($pendaftar->asalSekolah)
                <div class="col-md-6">
                  <div class="info-item">
                    <label>NPSN</label>
                    <p>{{ $pendaftar->asalSekolah->npsn ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Kabupaten Sekolah</label>
                    <p>{{ $pendaftar->asalSekolah->kabupaten ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-12">
                  <div class="info-item">
                    <label>Asal Sekolah</label>
                    <p>{{ $pendaftar->asalSekolah->nama_sekolah ?? '-' }}</p>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
        
        <!-- Parent Information -->
        <div class="info-card" data-aos="fade-left" data-aos-delay="400">
          <div class="card-header">
            <h5><i class="bi bi-people me-2"></i>Data Orang Tua</h5>
          </div>
          <div class="card-body">
            <div class="row">
              @if($pendaftar->dataOrtu)
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Nama Ayah</label>
                    <p>{{ $pendaftar->dataOrtu->nama_ayah ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Nama Ibu</label>
                    <p>{{ $pendaftar->dataOrtu->nama_ibu ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Pekerjaan Ayah</label>
                    <p>{{ $pendaftar->dataOrtu->pekerjaan_ayah ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>Pekerjaan Ibu</label>
                    <p>{{ $pendaftar->dataOrtu->pekerjaan_ibu ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>HP Ayah</label>
                    <p>{{ $pendaftar->dataOrtu->hp_ayah ?? '-' }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-item">
                    <label>HP Ibu</label>
                    <p>{{ $pendaftar->dataOrtu->hp_ibu ?? '-' }}</p>
                  </div>
                </div>
              @else
                <div class="col-12">
                  <p class="text-muted">Data orang tua belum dilengkapi</p>
                </div>
              @endif
            </div>
          </div>
        </div>
        @else
        <!-- No Registration Data -->
        <div class="info-card" data-aos="fade-left">
          <div class="card-body text-center py-5">
            <i class="bi bi-clipboard-x display-1 text-muted mb-3"></i>
            <h5>Belum Ada Data Pendaftaran</h5>
            <p class="text-muted mb-4">Anda belum melakukan pendaftaran. Silakan lengkapi formulir pendaftaran terlebih dahulu.</p>
            <a href="{{ route('pendaftaran.form') }}" class="btn btn-primary">
              <i class="bi bi-plus-circle me-2"></i>Mulai Pendaftaran
            </a>
          </div>
        </div>
        @endif
        
      </div>
    </div>
  </div>
</section>

<style>
:root {
  --accent-color: #007bff;
  --heading-color: #2c3e50;
}

.page-title {
  background: #f1f3f4;
  color: black;
  padding: 4rem 0 2rem;
}

.page-title .heading-title {
  font-size: 2.5rem;
  font-weight: 700;
  margin-bottom: 1rem;
  color: black !important;
}

.page-title p {
  color: black !important;
}

.breadcrumbs {
  background: #f8f9fa !important;
  padding: 1rem 0;
}

.breadcrumbs ol {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  align-items: center;
}

.breadcrumbs li {
  color: black !important;
}

.breadcrumbs li:not(:last-child)::after {
  content: '/';
  margin: 0 0.5rem;
  color: black !important;
}

.breadcrumbs a {
  color: black !important;
  text-decoration: none;
}

.breadcrumbs a:hover {
  color: rgba(0,0,0,0.7) !important;
}

.breadcrumbs .current {
  color: black !important;
}

.section {
  padding: 4rem 0;
  background: #f8f9fa;
}

.profile-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  text-align: center;
  margin-bottom: 2rem;
}

.profile-header {
  margin-bottom: 2rem;
}

.profile-avatar-large {
  margin-bottom: 1rem;
}

.profile-avatar-large i {
  font-size: 80px;
  color: var(--accent-color);
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.profile-header h4 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.profile-stats {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.stat-item {
  padding: 1rem;
  background: #f8f9fa;
  border-radius: 10px;
}

.stat-value {
  font-size: 1.1rem;
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.stat-label {
  font-size: 0.9rem;
  color: #6c757d;
}

.action-card {
  background: white;
  border-radius: 15px;
  padding: 1.5rem;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.action-card h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 1rem;
}

.action-buttons .btn {
  border-radius: 8px;
  font-weight: 500;
}

.info-card {
  background: white;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  overflow: hidden;
}

.card-header {
  background: #f8f9fa;
  padding: 1.5rem;
  border-bottom: 1px solid #e9ecef;
}

.card-header h5 {
  color: var(--heading-color);
  font-weight: 600;
  margin: 0;
}

.card-body {
  padding: 1.5rem;
}

.info-item {
  margin-bottom: 1.5rem;
}

.info-item:last-child {
  margin-bottom: 0;
}

.info-item label {
  font-weight: 600;
  color: #6c757d;
  font-size: 0.9rem;
  display: block;
  margin-bottom: 0.25rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.info-item p {
  color: var(--heading-color);
  font-weight: 500;
  margin: 0;
  font-size: 1rem;
}

@media (max-width: 768px) {
  .profile-stats {
    flex-direction: column;
  }
  
  .stat-item {
    text-align: center;
  }
  
  .info-item {
    margin-bottom: 1rem;
  }
}
</style>

@endsection