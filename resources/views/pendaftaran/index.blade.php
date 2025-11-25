@extends('layouts.main')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Pendaftaran Siswa Baru</h1>
          <p class="mb-0">Bergabunglah dengan SMK Bakti Nusantara 666 dan wujudkan masa depan cemerlang Anda</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Pendaftaran</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Registration Process Section -->
<section class="section">
  <div class="container" data-aos="fade-up">

    <!-- Hero Section -->
    <div class="row align-items-center mb-5">
      <div class="col-lg-6" data-aos="fade-right">
        <div class="registration-hero">
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left">
        <div class="registration-image">
        </div>
      </div>
    </div>

    <!-- Registration Steps -->
    <div class="registration-steps mb-5" data-aos="fade-up" style="margin-top: -150px;">
      <div class="row">
        <div class="col-12 text-center mb-4">
          <h3>Alur Pendaftaran</h3>
          <p class="text-muted">Ikuti langkah-langkah berikut untuk menyelesaikan pendaftaran Anda</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="step-card text-center">
            <div class="step-number">1</div>
            <div class="step-icon">
              <i class="bi bi-person-plus"></i>
            </div>
            <h5>Registrasi Akun</h5>
            <p class="small text-muted">Buat akun dengan email dan password</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="step-card text-center">
            <div class="step-number">2</div>
            <div class="step-icon">
              <i class="bi bi-file-text"></i>
            </div>
            <h5>Formulir Pendaftaran</h5>
            <p class="small text-muted">Lengkapi data pribadi dan pilih jurusan</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="step-card text-center">
            <div class="step-number">3</div>
            <div class="step-icon">
              <i class="bi bi-cloud-upload"></i>
            </div>
            <h5>Upload Berkas</h5>
            <p class="small text-muted">Upload dokumen pendukung</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="400">
          <div class="step-card text-center">
            <div class="step-number">4</div>
            <div class="step-icon">
              <i class="bi bi-check-circle"></i>
            </div>
            <h5>Verifikasi</h5>
            <p class="small text-muted">Menunggu verifikasi administrasi</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="500">
          <div class="step-card text-center">
            <div class="step-number">5</div>
            <div class="step-icon">
              <i class="bi bi-credit-card"></i>
            </div>
            <h5>Pembayaran</h5>
            <p class="small text-muted">Lakukan pembayaran biaya pendaftaran</p>
          </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mb-4" data-aos="fade-up" data-aos-delay="600">
          <div class="step-card text-center">
            <div class="step-number">6</div>
            <div class="step-icon">
              <i class="bi bi-download"></i>
            </div>
            <h5>Cetak Kartu</h5>
            <p class="small text-muted">Download kartu pendaftaran</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Call to Action -->
    <div class="cta-section text-center" data-aos="fade-up" style="margin-top: -50px;">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="cta-card" style="background: white; color: black; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
            <h3 class="mb-3" style="color: black !important;">Siap Memulai Pendaftaran?</h3>
            <p class="mb-4" style="color: #6c757d !important;">Jangan lewatkan kesempatan emas ini! Daftarkan diri Anda sekarang dan raih masa depan yang cerah bersama SMK Bakti Nusantara 666.</p>

            <div class="cta-buttons">
              <a href="{{ route('pendaftaran.register') }}" class="btn btn-primary btn-lg me-3">
                <i class="bi bi-person-plus me-2" style="color: white;"></i>Mulai Pendaftaran
              </a>
              <a href="{{ route('pendaftaran.login') }}" class="btn btn-lg" style="background: white; color: #007bff !important; border: 1px solid #007bff;">
                <i class="bi bi-box-arrow-in-right me-2" style="color: #007bff !important;"></i>Sudah Punya Akun?
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Information Cards -->
    <div class="info-cards mt-5" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-calendar-event"></i>
            </div>
            <h5>Jadwal Pendaftaran</h5>
            <p>Pendaftaran dibuka sepanjang tahun dengan gelombang pendaftaran yang berbeda.</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check text-success me-2"></i>Gelombang 1: Januari - Maret</li>
              <li><i class="bi bi-check text-success me-2"></i>Gelombang 2: April - Juni</li>
              <li><i class="bi bi-check text-success me-2"></i>Gelombang 3: Juli - September</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-file-earmark-check"></i>
            </div>
            <h5>Persyaratan</h5>
            <p>Dokumen yang harus disiapkan untuk proses pendaftaran:</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-check text-success me-2"></i>Ijazah/Rapor SMP</li>
              <li><i class="bi bi-check text-success me-2"></i>Kartu Keluarga</li>
              <li><i class="bi bi-check text-success me-2"></i>Akta Kelahiran</li>
              <li><i class="bi bi-check text-success me-2"></i>Pas Foto 3x4</li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
          <div class="info-card">
            <div class="info-icon">
              <i class="bi bi-headset"></i>
            </div>
            <h5>Bantuan</h5>
            <p>Butuh bantuan dalam proses pendaftaran? Hubungi kami:</p>
            <ul class="list-unstyled">
              <li><i class="bi bi-telephone text-primary me-2"></i>(021) 123-4567</li>
              <li><i class="bi bi-envelope text-primary me-2"></i>info@smkbn666.sch.id</li>
              <li><i class="bi bi-whatsapp text-success me-2"></i>0812-3456-7890</li>
            </ul>
          </div>
        </div>
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
.registration-hero {
  padding: 2rem 0;
}

.highlight-stats {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  border-radius: 15px;
  padding: 2rem;
  margin-top: 2rem;
}

.stat-item h3 {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}

.registration-steps {
  background: #f8f9fa;
  border-radius: 20px;
  padding: 3rem 2rem;
}

.step-card {
  position: relative;
  padding: 2rem 1rem;
  background: white;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  height: 100%;
}

.step-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.step-number {
  position: absolute;
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  width: 30px;
  height: 30px;
  background: var(--accent-color);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 0.9rem;
}

.step-icon {
  font-size: 2.5rem;
  color: var(--accent-color);
  margin: 1rem 0;
}

.step-card h5 {
  color: var(--heading-color);
  margin-bottom: 0.5rem;
  font-weight: 600;
}

.cta-section {
  margin: 4rem 0;
}

.cta-card {
  background: linear-gradient(135deg, var(--accent-color) 0%, #0056b3 100%);
  color: white;
  padding: 3rem 2rem;
  border-radius: 20px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.1);
}

.cta-buttons .btn {
  padding: 0.75rem 2rem;
  border-radius: 50px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.info-cards .info-card {
  background: white;
  padding: 2rem;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s ease;
  height: 100%;
}

.info-cards .info-card:hover {
  transform: translateY(-5px);
}

.info-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, var(--accent-color) 0%, #0056b3 100%);
  color: white;
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  margin-bottom: 1rem;
}

.info-card h5 {
  color: var(--heading-color);
  margin-bottom: 1rem;
  font-weight: 600;
}

.info-card ul li {
  padding: 0.25rem 0;
  font-size: 0.9rem;
}

@media (max-width: 768px) {
  .highlight-stats {
    padding: 1.5rem;
  }

  .registration-steps {
    padding: 2rem 1rem;
  }

  .cta-card {
    padding: 2rem 1rem;
  }

  .cta-buttons .btn {
    display: block;
    width: 100%;
    margin-bottom: 1rem;
  }
}
</style>
@endsection
