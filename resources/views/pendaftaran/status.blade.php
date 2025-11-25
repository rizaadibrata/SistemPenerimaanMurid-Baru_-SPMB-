@extends('layouts.main')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Status Pendaftaran</h1>
          <p class="mb-0">Pantau progress dan status pendaftaran Anda</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('pendaftaran.status') }}">Dashboard</a></li>
        <li class="current">Status Pendaftaran</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Status Section -->
<section class="section">
  <div class="container">
    
    <!-- User Info Header -->
    <div class="user-header mb-4" data-aos="fade-up">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="user-info">
            <h4>Selamat datang, {{ $pendaftar && $pendaftar->dataSiswa ? $pendaftar->dataSiswa->nama : Auth::user()->name }}!</h4>
            <p class="text-muted mb-0">
              <i class="bi bi-envelope me-2"></i>{{ Auth::user()->email }}
              @if($pendaftar && $pendaftar->dataSiswa && $pendaftar->dataSiswa->nisn)
                <span class="ms-3"><i class="bi bi-card-text me-2"></i>NISN: {{ $pendaftar->dataSiswa->nisn }}</span>
              @endif
              @if($pendaftar && $pendaftar->no_pendaftaran)
                <span class="ms-3"><i class="bi bi-hash me-2"></i>No. Pendaftaran: {{ $pendaftar->no_pendaftaran }}</span>
              @endif
            </p>
          </div>
        </div>
        <div class="col-md-4 text-md-end">
          @if(!Auth::check())
            <a href="{{ route('ppdb') }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Status Timeline -->
      <div class="col-lg-8">
        
        <!-- Current Status Card -->
        <div class="status-card mb-4" data-aos="fade-up">
          <div class="status-header">
            @if($pendaftar && $pendaftar->status == 'ADM_PASS')
              <div class="status-icon verified">
                <i class="bi bi-check-circle"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text verified">Terverifikasi</h3>
                <p class="text-muted mb-0">Dokumen Anda telah diverifikasi. Silakan lakukan pembayaran untuk menyelesaikan pendaftaran.</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'PAY')
              <div class="status-icon submitted">
                <i class="bi bi-clock-history"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text submitted">Menunggu Verifikasi Pembayaran</h3>
                <p class="text-muted mb-0">Bukti pembayaran telah diupload. Menunggu verifikasi dari staff keuangan.</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'PAID')
              <div class="status-icon accepted">
                <i class="bi bi-check-circle-fill"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text accepted">Pembayaran Terverifikasi</h3>
                <p class="text-muted mb-0">Pembayaran Anda telah terverifikasi. Menunggu pengumuman hasil.</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'ACCEPTED')
              <div class="status-icon accepted">
                <i class="bi bi-trophy-fill"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text accepted">SELAMAT! ANDA DITERIMA</h3>
                <p class="text-muted mb-0">Selamat! Anda telah diterima sebagai siswa SMK Bakti Nusantara 666.</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'PENDING_PAYMENT')
              <div class="status-icon submitted">
                <i class="bi bi-clock-history"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text submitted">Menunggu Verifikasi Pembayaran</h3>
                <p class="text-muted mb-0">Bukti pembayaran telah diupload. Menunggu verifikasi dari staff keuangan.</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT')
              <div class="status-icon rejected">
                <i class="bi bi-x-circle"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text rejected">Ditolak - Dapat Diperbaiki</h3>
                <p class="text-muted mb-0">{{ $pendaftar->catatan_verifikator ?: 'Dokumen Anda tidak memenuhi persyaratan verifikasi.' }}</p>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT_FINAL')
              <div class="status-icon rejected">
                <i class="bi bi-x-circle-fill"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text rejected">Ditolak - Tidak Memenuhi Syarat</h3>
                <p class="text-muted mb-0">{{ $pendaftar->catatan_verifikator ?: 'Anda tidak memenuhi syarat pendaftaran.' }}</p>
              </div>
            @else
              <div class="status-icon submitted">
                <i class="bi bi-clock-history"></i>
              </div>
              <div class="status-info">
                <h5>Status Saat Ini</h5>
                <h3 class="status-text submitted">Menunggu Verifikasi</h3>
                <p class="text-muted mb-0">Dokumen Anda sedang dalam proses verifikasi oleh admin</p>
              </div>
            @endif
          </div>
          
          <div class="status-meta">
            @if($pendaftar && $pendaftar->no_pendaftaran)
              <div class="registration-number mb-2">
                <strong class="text-primary">
                  <i class="bi bi-card-text me-1"></i>
                  Nomor Pendaftaran: {{ $pendaftar->no_pendaftaran }}
                  <button class="btn btn-sm btn-outline-primary ms-2" onclick="copyToClipboard('{{ $pendaftar->no_pendaftaran }}')"
                          title="Salin nomor pendaftaran">
                    <i class="bi bi-copy"></i>
                  </button>
                </strong>
              </div>
            @endif
            <small class="text-muted">
              <i class="bi bi-calendar me-1"></i>
              Tanggal Pendaftaran: 
              @if($pendaftar && $pendaftar->tanggal_daftar)
                {{ $pendaftar->tanggal_daftar->format('d F Y, H:i') }}
              @else
                -
              @endif
            </small>
          </div>
        </div>

        <!-- Progress Timeline -->
        <div class="timeline-card" data-aos="fade-up" data-aos-delay="200">
          <h5 class="mb-4"><i class="bi bi-list-check me-2"></i>Progress Pendaftaran</h5>
          
          <div class="timeline">
            <!-- Step 1: Registrasi -->
            <div class="timeline-item completed">
              <div class="timeline-marker">
                <i class="bi bi-check"></i>
              </div>
              <div class="timeline-content">
                <h6>Registrasi Akun</h6>
                <p class="text-muted">Akun berhasil dibuat</p>
                <small class="text-success">Selesai</small>
              </div>
            </div>
            
            <!-- Step 2: Formulir -->
            <div class="timeline-item completed">
              <div class="timeline-marker">
                <i class="bi bi-check"></i>
              </div>
              <div class="timeline-content">
                <h6>Formulir Pendaftaran</h6>
                <p class="text-muted">Mengisi data pribadi dan pilihan jurusan</p>
                <small class="text-success">Selesai</small>
              </div>
            </div>
            
            <!-- Step 3: Upload Berkas -->
            <div class="timeline-item completed">
              <div class="timeline-marker">
                <i class="bi bi-check"></i>
              </div>
              <div class="timeline-content">
                <h6>Upload Berkas</h6>
                <p class="text-muted">Upload dokumen persyaratan</p>
                <small class="text-success">Selesai</small>
              </div>
            </div>
            
            @if($pendaftar && in_array($pendaftar->status, ['ADM_PASS', 'PAY', 'PAID', 'ACCEPTED']))
              <!-- Step 4: Verifikasi -->
              <div class="timeline-item completed">
                <div class="timeline-marker">
                  <i class="bi bi-check"></i>
                </div>
                <div class="timeline-content">
                  <h6>Verifikasi Administrasi</h6>
                  <p class="text-muted">Pemeriksaan dokumen oleh admin</p>
                  <small class="text-success">Selesai</small>
                </div>
              </div>
              
              <!-- Step 5: Pembayaran -->
              @if($pendaftar->status == 'ADM_PASS')
                <div class="timeline-item active">
                  <div class="timeline-marker">
                    <i class="bi bi-credit-card"></i>
                  </div>
                  <div class="timeline-content">
                    <h6>Pembayaran</h6>
                    <p class="text-muted">Lakukan pembayaran biaya pendaftaran</p>
                    <small class="text-info">Menunggu Pembayaran</small>
                  </div>
                </div>
              @elseif($pendaftar->status == 'PAY')
                <div class="timeline-item active">
                  <div class="timeline-marker">
                    <i class="bi bi-clock"></i>
                  </div>
                  <div class="timeline-content">
                    <h6>Pembayaran</h6>
                    <p class="text-muted">Menunggu verifikasi pembayaran</p>
                    <small class="text-info">Sedang Diverifikasi</small>
                  </div>
                </div>
              @elseif(in_array($pendaftar->status, ['PAID', 'ACCEPTED']))
                <div class="timeline-item completed">
                  <div class="timeline-marker">
                    <i class="bi bi-check"></i>
                  </div>
                  <div class="timeline-content">
                    <h6>Pembayaran</h6>
                    <p class="text-muted">Pembayaran telah terverifikasi</p>
                    <small class="text-success">Selesai</small>
                  </div>
                </div>
              @endif
              
              <!-- Step 6: Pengumuman -->
              @if($pendaftar->status == 'ACCEPTED')
                <div class="timeline-item completed">
                  <div class="timeline-marker">
                    <i class="bi bi-trophy-fill"></i>
                  </div>
                  <div class="timeline-content">
                    <h6>Pengumuman Hasil</h6>
                    <p class="text-muted">Selamat! Anda diterima sebagai siswa</p>
                    <small class="text-success">DITERIMA</small>
                  </div>
                </div>
              @else
                <div class="timeline-item pending">
                  <div class="timeline-marker">
                    <i class="bi bi-circle"></i>
                  </div>
                  <div class="timeline-content">
                    <h6>Pengumuman Hasil</h6>
                    <p class="text-muted">Pengumuman kelulusan seleksi</p>
                    <small class="text-muted">Menunggu</small>
                  </div>
                </div>
              @endif
            @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT')
              <!-- Step 4: Verifikasi Ditolak -->
              <div class="timeline-item rejected">
                <div class="timeline-marker">
                  <i class="bi bi-x"></i>
                </div>
                <div class="timeline-content">
                  <h6>Verifikasi Administrasi</h6>
                  <p class="text-muted">{{ $pendaftar->catatan_verifikator ?: 'Dokumen tidak memenuhi persyaratan' }}</p>
                  <small class="text-danger">Ditolak</small>
                </div>
              </div>
              
              <!-- Step 5: Perbaikan Data -->
              <div class="timeline-item pending">
                <div class="timeline-marker">
                  <i class="bi bi-arrow-clockwise"></i>
                </div>
                <div class="timeline-content">
                  <h6>Perbaikan Data</h6>
                  <p class="text-muted">Perbaiki data sesuai catatan verifikator dan ajukan ulang</p>
                  <small class="text-warning">Menunggu Perbaikan</small>
                </div>
              </div>
            @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT_FINAL')
              <!-- Step 4: Verifikasi Ditolak Final -->
              <div class="timeline-item rejected">
                <div class="timeline-marker">
                  <i class="bi bi-x-circle-fill"></i>
                </div>
                <div class="timeline-content">
                  <h6>Verifikasi Administrasi</h6>
                  <p class="text-muted">{{ $pendaftar->catatan_verifikator ?: 'Tidak memenuhi syarat pendaftaran' }}</p>
                  <small class="text-danger">Ditolak Final</small>
                </div>
              </div>
            @else
              <!-- Step 4: Verifikasi -->
              <div class="timeline-item active">
                <div class="timeline-marker">
                  <i class="bi bi-clock"></i>
                </div>
                <div class="timeline-content">
                  <h6>Verifikasi Administrasi</h6>
                  <p class="text-muted">Pemeriksaan dokumen oleh admin</p>
                  <small class="text-info">Sedang Diproses</small>
                </div>
              </div>
              
              <!-- Step 5: Pengumuman -->
              <div class="timeline-item pending">
                <div class="timeline-marker">
                  <i class="bi bi-circle"></i>
                </div>
                <div class="timeline-content">
                  <h6>Pengumuman Hasil</h6>
                  <p class="text-muted">Pengumuman kelulusan seleksi</p>
                  <small class="text-muted">Menunggu</small>
                </div>
              </div>
            @endif
          </div>
        </div>

      </div>
      
      <!-- Sidebar Info -->
      <div class="col-lg-4">
        
        <!-- Quick Actions -->
        @if($pendaftar && $pendaftar->status == 'PAID')
        <div class="info-card mb-4" data-aos="fade-left" data-aos-delay="300">
          <h6><i class="bi bi-lightning me-2"></i>Aksi Cepat</h6>
          
          <div class="action-buttons">
            <button class="btn btn-outline-secondary btn-sm w-100 mb-2" onclick="window.print()">
              <i class="bi bi-printer me-2"></i>Cetak Status
            </button>
          </div>
        </div>
        @endif



        <!-- Data Summary -->
        <div class="info-card mb-4" data-aos="fade-left" data-aos-delay="400">
          <h6><i class="bi bi-info-circle me-2"></i>Ringkasan Data</h6>
          
          <div class="data-summary">
            @if($pendaftar)
              <div class="summary-item">
                <span class="label">Jurusan Pilihan:</span>
                <span class="value">{{ $pendaftar->jurusan->nama ?? '-' }}</span>
              </div>
              
              <div class="summary-item">
                <span class="label">Asal Sekolah:</span>
                <span class="value">{{ $pendaftar->asalSekolah->nama_sekolah ?? '-' }}</span>
              </div>
              
              <div class="summary-item">
                <span class="label">Tanggal Lahir:</span>
                <span class="value">
                  @if($pendaftar->dataSiswa && $pendaftar->dataSiswa->tgl_lahir)
                    {{ $pendaftar->dataSiswa->tgl_lahir->format('d F Y') }}
                  @else
                    -
                  @endif
                </span>
              </div>
              
              <div class="summary-item">
                <span class="label">Status:</span>
                <span class="value">
                  @if($pendaftar->status == 'SUBMIT')
                    <span class="badge bg-warning">Menunggu Verifikasi</span>
                  @elseif($pendaftar->status == 'ADM_PASS')
                    <span class="badge bg-success">Lulus Administrasi</span>
                  @elseif($pendaftar->status == 'PAY')
                    <span class="badge bg-warning">Menunggu Verifikasi Pembayaran</span>
                  @elseif($pendaftar->status == 'PENDING_PAYMENT')
                    <span class="badge bg-warning">Menunggu Verifikasi Pembayaran</span>
                  @elseif($pendaftar->status == 'ADM_REJECT')
                    <span class="badge bg-danger">Ditolak</span>
                  @elseif($pendaftar->status == 'ADM_REJECT_FINAL')
                    <span class="badge bg-dark">Ditolak Final</span>
                  @elseif($pendaftar->status == 'PAID')
                    <span class="badge bg-primary">Lunas</span>
                  @elseif($pendaftar->status == 'ACCEPTED')
                    <span class="badge bg-success">DITERIMA</span>
                  @else
                    <span class="badge bg-secondary">{{ $pendaftar->status }}</span>
                  @endif
                </span>
              </div>
            @else
              <div class="summary-item">
                <span class="label">Data belum tersedia</span>
                <span class="value">-</span>
              </div>
            @endif
          </div>
        </div>

        <!-- Contact Info -->
        <div class="info-card" data-aos="fade-left" data-aos-delay="500">
          <h6><i class="bi bi-headset me-2"></i>Butuh Bantuan?</h6>
          
          <div class="contact-info">
            <div class="contact-item">
              <i class="bi bi-telephone text-primary"></i>
              <div>
                <strong>Telepon</strong>
                <p>(021) 123-4567</p>
              </div>
            </div>
            
            <div class="contact-item">
              <i class="bi bi-whatsapp text-success"></i>
              <div>
                <strong>WhatsApp</strong>
                <p>0812-3456-7890</p>
              </div>
            </div>
            
            <div class="contact-item">
              <i class="bi bi-envelope text-info"></i>
              <div>
                <strong>Email</strong>
                <p>info@smkbn666.sch.id</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        @if($pendaftar)
        <div class="info-card mt-4" data-aos="fade-left" data-aos-delay="600">
          <div class="d-grid gap-3">
            @if($pendaftar->status == 'ACCEPTED')
              <button class="btn btn-success btn-lg py-3" onclick="cetakKartu()">
                <i class="bi bi-printer me-2"></i>Cetak Kartu Siswa
              </button>
            @elseif(!in_array($pendaftar->status, ['ADM_REJECT_FINAL', 'ACCEPTED']))
              @if($pendaftar && !in_array($pendaftar->status, ['ADM_REJECT', 'ADM_REJECT_FINAL', 'ADM_PASS', 'PAY', 'PAID']))
                <a href="{{ route('pendaftaran.edit') }}" class="btn btn-outline-primary">
                  <i class="bi bi-pencil-square me-2"></i>Edit Data
                </a>
              @endif
              @if($pendaftar && $pendaftar->berkas->count() == 0)
                <a href="{{ route('pendaftaran.upload') }}" class="btn btn-warning btn-lg py-3" style="background-color: #ffc107; color: white; border-color: #ffc107;">
                  <i class="bi bi-cloud-upload me-2"></i>Upload Berkas
                </a>
              @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT')
                <div class="alert alert-danger mb-3" style="word-wrap: break-word; overflow-wrap: break-word; max-width: 100%; font-size: 0.75rem; padding: 0.5rem;">
                  <h6 class="alert-heading" style="font-size: 0.8rem; margin-bottom: 0.25rem;"><i class="bi bi-exclamation-triangle me-1"></i>Ditolak</h6>
                  @if($pendaftar->catatan_verifikator)
                    <p class="mb-0" style="font-size: 0.7rem;">{{ $pendaftar->catatan_verifikator }}</p>
                  @else
                    <p class="mb-0" style="font-size: 0.7rem;">Perbaiki data sesuai catatan.</p>
                  @endif
                </div>
                <a href="{{ route('pendaftaran.edit') }}" class="btn btn-danger btn-lg py-3 w-100 mb-2">
                  <i class="bi bi-pencil-square me-2"></i>Perbaiki Data
                </a>
              @elseif($pendaftar && $pendaftar->status == 'ADM_REJECT_FINAL')
                <div class="alert alert-dark mb-3" style="word-wrap: break-word; overflow-wrap: break-word; max-width: 100%; font-size: 0.75rem; padding: 0.5rem;">
                  <h6 class="alert-heading" style="font-size: 0.8rem; margin-bottom: 0.25rem;"><i class="bi bi-x-circle-fill me-1"></i>Ditolak Final</h6>
                  @if($pendaftar->catatan_verifikator)
                    <p class="mb-0" style="font-size: 0.7rem;">{{ $pendaftar->catatan_verifikator }}</p>
                  @else
                    <p class="mb-0" style="font-size: 0.7rem;">Anda tidak memenuhi syarat pendaftaran.</p>
                  @endif
                </div>
                <button class="btn btn-dark btn-lg py-3 w-100 mb-2" disabled>
                  <i class="bi bi-x-circle-fill me-2"></i>Tidak Dapat Diperbaiki
                </button>
              @elseif($pendaftar && $pendaftar->status == 'ADM_PASS')
                <a href="{{ route('pendaftaran.pembayaran') }}" class="btn btn-warning btn-lg py-3" style="background-color: #ffc107; color: white; border-color: #ffc107;">
                  <i class="bi bi-credit-card me-2"></i>Selesaikan Pembayaran
                </a>
              @elseif($pendaftar && $pendaftar->status == 'PAY')
                <button class="btn btn-info btn-lg py-3" disabled>
                  <i class="bi bi-clock me-2"></i>Menunggu Verifikasi Pembayaran
                </button>
              @elseif($pendaftar && $pendaftar->status == 'PAID')
                <button class="btn btn-success btn-lg py-3" disabled>
                  <i class="bi bi-check-circle me-2"></i>Pembayaran Terverifikasi
                </button>
              @endif
            @endif
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

.breadcrumbs * {
  color: black !important;
}

.section {
  padding: 4rem 0;
  background: #f8f9fa;
}

/* Navbar override for pendaftaran pages */
.header .branding {
  background: #f8f9fa !important;
}

.header .branding .sitename,
.header .branding .navmenu ul li a {
  color: black !important;
}

.header .branding .navmenu ul li a:hover {
  color: rgba(0,0,0,0.7) !important;
}

/* Blue background text color override */
.btn-primary,
.btn-primary *,
.progress-step.active *,
.progress-step.completed *,
.status-icon *,
.section-icon *,
.form-icon *,
.upload-icon,
.info-icon *,
.feature-icon *,
.access-icon *,
.security-icon *,
.cta-card *,
[style*="background"][style*="blue"] *,
[style*="background"][style*="#007bff"] *,
[class*="bg-primary"] *,
[class*="bg-blue"] * {
  color: white !important;
}
.user-header {
  background: white;
  border-radius: 15px;
  padding: 1.5rem;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.user-info h4 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.status-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border: 1px solid #f0f0f0;
}

.status-header {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}

.status-icon {
  width: 80px;
  height: 80px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 2rem;
  margin-right: 1.5rem;
  color: white;
}

.status-icon.draft {
  background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
}

.status-icon.submitted {
  background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
}

.status-icon.verified {
  background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.status-icon.accepted {
  background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.status-icon.rejected {
  background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.status-info h5 {
  color: #6c757d;
  font-size: 0.9rem;
  font-weight: 500;
  margin-bottom: 0.25rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.status-text {
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.status-text.draft {
  color: #6c757d;
}

.status-text.submitted {
  color: #ffc107;
}

.status-text.verified {
  color: #007bff;
}

.status-text.accepted {
  color: #28a745;
}

.status-text.rejected {
  color: #dc3545;
}

.status-meta {
  margin-top: 1rem;
  padding-top: 1rem;
  border-top: 1px solid #f0f0f0;
}

.timeline-card {
  background: white;
  border-radius: 20px;
  padding: 2rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border: 1px solid #f0f0f0;
}

.timeline {
  position: relative;
  padding-left: 2rem;
}

.timeline::before {
  content: '';
  position: absolute;
  left: 15px;
  top: 0;
  bottom: 0;
  width: 2px;
  background: #e9ecef;
}

.timeline-item {
  position: relative;
  margin-bottom: 2rem;
}

.timeline-item:last-child {
  margin-bottom: 0;
}

.timeline-marker {
  position: absolute;
  left: -2rem;
  top: 0;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.8rem;
  font-weight: 700;
  background: #e9ecef;
  color: #6c757d;
  border: 3px solid white;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.timeline-item.completed .timeline-marker {
  background: #28a745;
  color: white;
}

.timeline-item.active .timeline-marker {
  background: var(--accent-color);
  color: white;
  animation: pulse 2s infinite;
}

.timeline-item.rejected .timeline-marker {
  background: #dc3545;
  color: white;
}

.timeline-content h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.timeline-content p {
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
}

.info-card {
  background: white;
  border-radius: 15px;
  padding: 1.5rem;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  border: 1px solid #f0f0f0;
}

.info-card h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 1rem;
}

.action-buttons .btn {
  border-radius: 8px;
  font-weight: 500;
}

.data-summary .summary-item {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 0.75rem;
  padding-bottom: 0.75rem;
  border-bottom: 1px solid #f0f0f0;
}

.data-summary .summary-item:last-child {
  margin-bottom: 0;
  padding-bottom: 0;
  border-bottom: none;
}

.summary-item .label {
  font-weight: 500;
  color: #6c757d;
  font-size: 0.9rem;
  flex: 1;
}

.summary-item .value {
  font-weight: 600;
  color: var(--heading-color);
  font-size: 0.9rem;
  text-align: right;
  flex: 1;
}

.contact-info .contact-item {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}

.contact-info .contact-item:last-child {
  margin-bottom: 0;
}

.contact-item i {
  font-size: 1.2rem;
  margin-right: 1rem;
  width: 20px;
}

.contact-item div strong {
  display: block;
  font-size: 0.9rem;
  font-weight: 600;
  color: var(--heading-color);
}

.contact-item div p {
  margin-bottom: 0;
  font-size: 0.8rem;
  color: #6c757d;
}

@keyframes pulse {
  0% {
    box-shadow: 0 0 0 0 rgba(13, 110, 253, 0.7);
  }
  70% {
    box-shadow: 0 0 0 10px rgba(13, 110, 253, 0);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(13, 110, 253, 0);
  }
}

@media (max-width: 768px) {
  .status-header {
    flex-direction: column;
    text-align: center;
  }
  
  .status-icon {
    margin-right: 0;
    margin-bottom: 1rem;
  }
  
  .timeline {
    padding-left: 1.5rem;
  }
  
  .timeline-marker {
    left: -1.5rem;
  }
  
  .user-header .row {
    text-align: center;
  }
  
  .user-header .col-md-4 {
    margin-top: 1rem;
  }
}

.btn-outline-primary {
  background: white;
  border: 2px solid var(--accent-color);
  color: var(--accent-color);
}

.btn-outline-primary:hover {
  background: var(--accent-color);
  border-color: var(--accent-color);
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media print {
  .btn, .breadcrumbs, .action-buttons {
    display: none !important;
  }
  
  .status-card, .timeline-card, .info-card {
    box-shadow: none !important;
    border: 1px solid #ddd !important;
  }
}
</style>

<script>
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(function() {
    // Show success message
    const toast = document.createElement('div');
    toast.className = 'alert alert-success position-fixed';
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 250px;';
    toast.innerHTML = '<i class="bi bi-check-circle me-2"></i>Nomor pendaftaran berhasil disalin!';
    document.body.appendChild(toast);
    
    setTimeout(() => {
      toast.remove();
    }, 3000);
  }).catch(function(err) {
    console.error('Could not copy text: ', err);
  });
}

// Keep session alive
setInterval(function() {
  fetch('{{ route("pendaftaran.keep-alive") }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-Requested-With': 'XMLHttpRequest',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
    },
    body: JSON.stringify({})
  }).then(response => {
    if (!response.ok && response.status === 401) {
      // Session expired, redirect to login
      window.location.href = '{{ route("pendaftaran.login") }}';
    }
  }).catch(function(error) {
    console.log('Session keep-alive failed:', error);
  });
}, 300000); // Every 5 minutes

// Replace current history entry to prevent going back to previous page
if (window.location.pathname.includes('/status')) {
  history.replaceState(null, null, window.location.href);
}

// No navigation restrictions - users can freely navigate

function cetakKartu() {
  window.open('{{ route("pendaftaran.cetak-kartu") }}', '_blank', 'width=900,height=700');
}

</script>

<!-- Modal Edit Data -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDataModalLabel">
          <i class="bi bi-pencil-square me-2"></i>Edit Data Pendaftaran
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('pendaftaran.edit.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="row g-3">
            <div class="col-md-6">
              <label for="edit_nisn" class="form-label">NISN</label>
              <input type="text" class="form-control" id="edit_nisn" name="nisn" 
                     value="{{ $pendaftar && $pendaftar->dataSiswa ? $pendaftar->dataSiswa->nisn : '' }}" placeholder="Masukkan NISN">
            </div>
            <div class="col-md-6">
              <label for="edit_tempat_lahir" class="form-label">Tempat Lahir</label>
              <input type="text" class="form-control" id="edit_tempat_lahir" name="tempat_lahir" 
                     value="{{ $pendaftar && $pendaftar->dataSiswa ? $pendaftar->dataSiswa->tmp_lahir : '' }}" placeholder="Tempat lahir">
            </div>
            <div class="col-md-6">
              <label for="edit_tanggal_lahir" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="edit_tanggal_lahir" name="tanggal_lahir" 
                     value="{{ $pendaftar && $pendaftar->dataSiswa && $pendaftar->dataSiswa->tgl_lahir ? $pendaftar->dataSiswa->tgl_lahir->format('Y-m-d') : '' }}">
            </div>
            <div class="col-md-6">
              <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ ($pendaftar && $pendaftar->dataSiswa && $pendaftar->dataSiswa->jk == 'L') ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ ($pendaftar && $pendaftar->dataSiswa && $pendaftar->dataSiswa->jk == 'P') ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>
            <div class="col-12">
              <label for="edit_alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="edit_alamat" name="alamat" rows="3" 
                        placeholder="Alamat lengkap">{{ $pendaftar && $pendaftar->dataSiswa ? $pendaftar->dataSiswa->alamat : '' }}</textarea>
            </div>
            <div class="col-12">
              <label for="edit_asal_sekolah" class="form-label">Asal Sekolah</label>
              <input type="text" class="form-control" id="edit_asal_sekolah" name="asal_sekolah" 
                     value="{{ $pendaftar && $pendaftar->asalSekolah ? $pendaftar->asalSekolah->nama_sekolah : '' }}" placeholder="Nama sekolah asal">
            </div>
            <div class="col-md-6">
              <label for="edit_nama_ayah" class="form-label">Nama Ayah</label>
              <input type="text" class="form-control" id="edit_nama_ayah" name="nama_ayah" 
                     value="{{ $pendaftar && $pendaftar->dataOrtu ? $pendaftar->dataOrtu->nama_ayah : '' }}" placeholder="Nama ayah">
            </div>
            <div class="col-md-6">
              <label for="edit_nama_ibu" class="form-label">Nama Ibu</label>
              <input type="text" class="form-control" id="edit_nama_ibu" name="nama_ibu" 
                     value="{{ $pendaftar && $pendaftar->dataOrtu ? $pendaftar->dataOrtu->nama_ibu : '' }}" placeholder="Nama ibu">
            </div>
            <div class="col-md-6">
              <label for="edit_no_hp_ortu" class="form-label">No. HP Orang Tua</label>
              <input type="text" class="form-control" id="edit_no_hp_ortu" name="no_hp_ortu" 
                     value="{{ $pendaftar && $pendaftar->dataOrtu ? ($pendaftar->dataOrtu->hp_ayah ?? $pendaftar->dataOrtu->hp_ibu) : '' }}" placeholder="Nomor HP">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-check-lg me-2"></i>Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection