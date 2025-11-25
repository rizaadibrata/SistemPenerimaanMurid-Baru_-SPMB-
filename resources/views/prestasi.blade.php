@extends('layouts.main')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<style>
.hero-title {
  background: linear-gradient(135deg, #1e40af, #2563eb, #1d4ed8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  font-weight: 700;
}

.hero-stats {
  background: rgba(255, 255, 255, 0.7);
  border-radius: 16px;
  padding: 20px;
  display: flex;
  gap: 24px;
  margin-top: 24px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
  backdrop-filter: blur(20px);
  animation: statsSlideIn 0.8s ease-out;
}

@keyframes statsSlideIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.stat-item {
  display: flex;
  align-items: center;
  gap: 12px;
  flex: 1;
  transition: all 0.3s ease;
  padding: 8px;
  border-radius: 12px;
}

.stat-item:hover {
  background: rgba(255, 255, 255, 0.6);
  transform: translateY(-2px);
}

.stat-icon-small {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  color: white;
  flex-shrink: 0;
  transition: all 0.3s ease;
  animation: iconFloat 3s ease-in-out infinite;
}

@keyframes iconFloat {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-3px); }
}

.stat-icon-small.gold {
  background: linear-gradient(135deg, #f59e0b, #d97706);
  animation-delay: 0s;
}

.stat-icon-small.blue {
  background: linear-gradient(135deg, #6366f1, #4f46e5);
  animation-delay: 0.5s;
}

.stat-icon-small.green {
  background: linear-gradient(135deg, #10b981, #047857);
  animation-delay: 1s;
}

.stat-item:hover .stat-icon-small {
  transform: scale(1.1) rotate(5deg);
  animation: none;
}

.stat-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.stat-num {
  font-size: 1.1rem;
  font-weight: 700;
  color: #1e293b;
  line-height: 1;
  transition: color 0.3s ease;
}

.stat-desc {
  font-size: 0.8rem;
  color: #64748b;
  line-height: 1;
  font-weight: 500;
}

.stat-item:hover .stat-num {
  color: #0f172a;
}

@media (max-width: 768px) {
  .hero-stats {
    flex-direction: column;
    gap: 16px;
    padding: 16px;
  }

  .stat-item {
    justify-content: center;
  }
}
</style>
@endpush

@section('title', 'Prestasi - SMK Bakti Nusantara 666')

@section('body-class', 'prestasi-page')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Prestasi SMK Bakti Nusantara 666</h1>
          <p class="mb-0">
            SMK Bakti Nusantara 666 selalu mendorong siswanya untuk berprestasi di berbagai bidang. Hasilnya, banyak siswa kami yang berhasil meraih penghargaan bergengsi dan membawa nama baik sekolah di tingkat provinsi hingga nasional.
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Prestasi</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="row align-items-start">
      <div class="col-lg-6 order-lg-2" data-aos="fade-left">
        <div class="hero-image" style="max-width: 450px; max-height: 450px; overflow: hidden; margin: 0 auto;">
          <img src="{{ asset('assets/img/health/juara.jpg') }}" alt="Prestasi SMK" style="width: 110%; height: 110%; object-fit: cover; margin: -5% 0 0 -5%; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1" data-aos="fade-right">
        <div class="floating-trophies">
          <div class="trophy trophy-1"><i class="bi bi-trophy"></i></div>
          <div class="trophy trophy-2"><i class="bi bi-award"></i></div>
          <div class="trophy trophy-3"><i class="bi bi-star"></i></div>
        </div>
        <h1 class="hero-title">Prestasi SMK Bakti Nusantara</h1>
        <p class="hero-description">SMK Bakti Nusantara 666 selalu mendorong siswanya untuk berprestasi di berbagai bidang. Hasilnya, banyak siswa kami yang berhasil meraih penghargaan bergengsi dan membawa nama baik sekolah di tingkat provinsi hingga nasional.</p>
        <div class="prestasi-links mt-3">
          <a href="#prestasi-section" class="btn btn-primary me-2 mb-2">
            <i class="bi bi-list-ul me-2"></i>
            Semua Prestasi
          </a>
          <a href="#prestasi-section" class="btn btn-outline-primary me-2 mb-2">
            <i class="bi bi-book me-2"></i>
            Prestasi Akademik
          </a>
          <a href="#prestasi-section" class="btn btn-outline-primary mb-2">
            <i class="bi bi-trophy me-2"></i>
            Prestasi Non-Akademik
          </a>
        </div>

        <div class="hero-stats mt-4">
          <div class="stat-item">
            <div class="stat-icon-small gold">
              <i class="bi bi-award"></i>
            </div>
            <div class="stat-text">
              <span class="stat-num">120+</span>
              <span class="stat-desc">Penghargaan</span>
            </div>
          </div>
          <div class="stat-item">
            <div class="stat-icon-small blue">
              <i class="bi bi-mortarboard"></i>
            </div>
            <div class="stat-text">
              <span class="stat-num">50+</span>
              <span class="stat-desc">Prestasi Akademik</span>
            </div>
          </div>
          <div class="stat-item">
            <div class="stat-icon-small green">
              <i class="bi bi-star"></i>
            </div>
            <div class="stat-text">
              <span class="stat-num">40+</span>
              <span class="stat-desc">Prestasi Non-Akademik</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Prestasi Section -->
<section id="prestasi-section" class="prestasi-section">
  <div class="container">
    <div class="section-header text-center mb-5" data-aos="fade-up">
      <h2 class="section-title">Prestasi Terbaru</h2>
      <p class="section-description">Pencapaian membanggakan siswa-siswi SMK Bakti Nusantara 666</p>
    </div>

    <div class="row">
      <!-- Prestasi 1 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/1.jpg') }}" alt="Juara 1 LKS" class="img-fluid">
            <div class="prestasi-badge">
              <i class="bi bi-trophy-fill"></i>
              <span>Juara 1</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">Indonesian Youth Science Competition (IYSC) 2022</h4>
            <p class="prestasi-category">Bidang Akuntansi</p>
            <p class="prestasi-description">Diva Lathifah - XII AKT 2, Juara 2 Akuntansi Tingkat Nasional. Aulizahra Hayunisa - XII AKT 1, Juara Harapan 2 Tingkat Nasional. Dhimas Noor Hidayat - XII AKT 1, Peringkat 10 Tingkat Nasional.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2022</span>
              <span class="prestasi-level">Tingkat Nasional</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Prestasi 2 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/2.jpg') }}" alt="Juara 1 Programming" class="img-fluid">
            <div class="prestasi-badge">
              <i class="bi bi-trophy-fill"></i>
              <span>Juara 1</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">Kejuruan Pemasaran & Prestasi</h4>
            <p class="prestasi-category">Bidang Pemasaran</p>
            <p class="prestasi-description">Meraih prestasi gemilang dalam kompetisi kejuruan pemasaran tingkat nasional dengan menunjukkan kemampuan strategi pemasaran dan inovasi bisnis yang luar biasa.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2024</span>
              <span class="prestasi-level">Tingkat Nasional</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Prestasi 3 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/3.jpg') }}" alt="Juara Harapan 2" class="img-fluid">
            <div class="prestasi-badge bronze">
              <i class="bi bi-award-fill"></i>
              <span>Juara Harapan 2</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">Lomba Baca Puisi</h4>
            <p class="prestasi-category">Universitas Islam Nusantara</p>
            <p class="prestasi-description">Meraih Juara Harapan 2 dalam Lomba Baca Puisi di Universitas Islam Nusantara dengan penampilan yang memukau dan penghayatan yang mendalam.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2024</span>
              <span class="prestasi-level">Tingkat Universitas</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Prestasi 4 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/4.jpg') }}" alt="Juara 1 Best Student" class="img-fluid">
            <div class="prestasi-badge">
              <i class="bi bi-trophy-fill"></i>
              <span>Juara 1</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">Paskibra HUT RI ke-78</h4>
            <p class="prestasi-category">Kecamatan Cileunyi</p>
            <p class="prestasi-description">Telah menjalankan tugas Paskibra HUT RI ke-78 di Kecamatan Cileunyi. Shely Agustine S - XI AKT 1 dan Neng Maelani - XI AKT 2 dengan penuh dedikasi dan kebanggaan.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2023</span>
              <span class="prestasi-level">Tingkat Kecamatan</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Prestasi 5 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/5.jpg') }}" alt="Team Work" class="img-fluid">
            <div class="prestasi-badge">
              <i class="bi bi-trophy-fill"></i>
              <span>Juara 1</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">Perwakilan Pelajar Jawa Barat</h4>
            <p class="prestasi-category">Upacara HUT RI ke-78</p>
            <p class="prestasi-description">Nadya Alya Putri, siswi kelas XII DKV 2 SMK Bakti Nusantara 666, menjadi Perwakilan Pelajar Jawa Barat dalam Upacara Peringatan HUT RI ke-78 di Istana Negara.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2023</span>
              <span class="prestasi-level">Tingkat Nasional</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Prestasi 6 -->
      <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
        <div class="prestasi-card">
          <div class="prestasi-image">
            <img src="{{ asset('assets/prestasi/6.jpg') }}" alt="Juara 3 IT Software" class="img-fluid">
            <div class="prestasi-badge bronze">
              <i class="bi bi-award-fill"></i>
              <span>Juara 3</span>
            </div>
          </div>
          <div class="prestasi-content">
            <h4 class="prestasi-title">IT Software Solution For Business</h4>
            <p class="prestasi-category">Kab. Bandung</p>
            <p class="prestasi-description">Muhammad Syahid - XI PPLG 2, meraih Juara 3 di bidang IT Software Solution For Business Kabupaten Bandung dengan solusi inovatif dan aplikatif.</p>
            <div class="prestasi-meta">
              <span class="prestasi-year">2023</span>
              <span class="prestasi-level">Tingkat Kabupaten</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistics Section -->
    <div class="statistics-section mt-5" data-aos="fade-up">
      <div class="floating-elements">
        <div class="floating-shape shape-1"></div>
        <div class="floating-shape shape-2"></div>
        <div class="floating-shape shape-3"></div>
      </div>
      <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-trophy"></i>
            </div>
            <div class="stat-number">25+</div>
            <div class="stat-label">Total Prestasi</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-award"></i>
            </div>
            <div class="stat-number">10</div>
            <div class="stat-label">Juara 1</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-star"></i>
            </div>
            <div class="stat-number">8</div>
            <div class="stat-label">Tingkat Nasional</div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="stat-card">
            <div class="stat-icon">
              <i class="bi bi-people"></i>
            </div>
            <div class="stat-number">50+</div>
            <div class="stat-label">Siswa Berprestasi</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

<style>
* {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

.hero-section {
  padding: 4rem 0;
  background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
  position: relative;
  overflow: hidden;
}

.floating-trophies {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 0;
}

.trophy {
  position: absolute;
  color: rgba(59, 130, 246, 0.15);
  font-size: 2rem;
  animation: trophyFloat 8s ease-in-out infinite;
}

.trophy-1 {
  top: 10%;
  right: 20%;
  animation-delay: 0s;
}

.trophy-2 {
  top: 60%;
  right: 10%;
  font-size: 1.5rem;
  animation-delay: 2s;
}

.trophy-3 {
  top: 30%;
  right: 5%;
  font-size: 1.8rem;
  animation-delay: 4s;
}

@keyframes trophyFloat {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
    opacity: 0.1;
  }
  25% {
    transform: translateY(-20px) rotate(5deg);
    opacity: 0.2;
  }
  50% {
    transform: translateY(-10px) rotate(-3deg);
    opacity: 0.15;
  }
  75% {
    transform: translateY(-25px) rotate(8deg);
    opacity: 0.25;
  }
}

.hero-title, .hero-description, .prestasi-links, .hero-stats {
  position: relative;
  z-index: 1;
}

.hero-stats {
  background: rgba(255, 255, 255, 0.7);
  border-radius: 16px;
  padding: 20px;
  display: flex;
  gap: 24px;
  margin-top: 24px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
  backdrop-filter: blur(20px);
  animation: statsSlideIn 0.8s ease-out;
}

@keyframes statsSlideIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.stat-item {
  display: flex;
  align-items: center;
  gap: 12px;
  flex: 1;
  transition: all 0.3s ease;
  padding: 8px;
  border-radius: 12px;
}

.stat-item:hover {
  background: rgba(255, 255, 255, 0.6);
  transform: translateY(-2px);
}

.stat-icon-small {
  width: 36px;
  height: 36px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1rem;
  color: white;
  flex-shrink: 0;
  transition: all 0.3s ease;
  animation: iconFloat 3s ease-in-out infinite;
}

@keyframes iconFloat {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-3px); }
}

.stat-icon-small.gold {
  background: linear-gradient(135deg, #f59e0b, #d97706);
  animation-delay: 0s;
}

.stat-icon-small.blue {
  background: linear-gradient(135deg, #6366f1, #4f46e5);
  animation-delay: 0.5s;
}

.stat-icon-small.green {
  background: linear-gradient(135deg, #10b981, #047857);
  animation-delay: 1s;
}

.stat-item:hover .stat-icon-small {
  transform: scale(1.1) rotate(5deg);
  animation: none;
}

.stat-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.stat-num {
  font-size: 1.1rem;
  font-weight: 700;
  color: #1e293b;
  line-height: 1;
  transition: color 0.3s ease;
}

.stat-desc {
  font-size: 0.8rem;
  color: #64748b;
  line-height: 1;
  font-weight: 500;
}

.stat-item:hover .stat-num {
  color: #0f172a;
}

@media (max-width: 768px) {
  .hero-stats {
    flex-direction: column;
    gap: 16px;
    padding: 16px;
  }

  .stat-item {
    justify-content: center;
  }
}

.hero-title {
  font-family: 'Poppins', sans-serif;
  font-size: 2.5rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 1rem;
  letter-spacing: -0.5px;
}

.hero-description {
  font-size: 1.1rem;
  color: #666;
  line-height: 1.6;
  margin-bottom: 2rem;
}

.hero-image {
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(13,110,253,0.15);
  position: relative;
  max-width: 450px;
  max-height: 450px;
  margin: 0 auto;
}

.hero-image img {
  width: 110%;
  height: 110%;
  object-fit: cover;
  margin: -5% 0 0 -5%;
}

.hero-image::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(45deg, rgba(13,110,253,0.1), transparent);
  animation: heroGlow 4s ease-in-out infinite alternate;
}

@keyframes heroGlow {
  0% { opacity: 0.3; }
  100% { opacity: 0.7; }
}

.prestasi-section {
  padding: 5rem 0;
}

.section-header {
  margin-bottom: 4rem;
}

.section-title {
  font-family: 'Poppins', sans-serif;
  font-size: 2.2rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 0.5rem;
  position: relative;
  display: inline-block;
}

.section-title::after {
  content: '';
  position: absolute;
  bottom: 0px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 3px;
  background: linear-gradient(135deg, #0d6efd, #6610f2);
  border-radius: 2px;
  animation: titleUnderline 3s ease-in-out infinite;
}

@keyframes titleUnderline {
  0%, 100% { width: 60px; }
  50% { width: 80px; }
}

.section-description {
  font-size: 1.1rem;
  color: #666;
  max-width: 600px;
  margin: 0 auto;
}

.prestasi-card {
  background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(13,110,253,0.08), 0 5px 15px rgba(0,0,0,0.04);
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  border: 1px solid rgba(13,110,253,0.06);
  height: 100%;
  position: relative;
  animation: cardFloat 6s ease-in-out infinite;
}

@keyframes cardFloat {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-5px); }
}

.prestasi-card:hover {
  transform: translateY(-15px) scale(1.02);
  box-shadow: 0 30px 80px rgba(13,110,253,0.2), 0 15px 35px rgba(0,0,0,0.12);
  border-color: rgba(13,110,253,0.2);
  animation: none;
}

.prestasi-image {
  position: relative;
  height: 150px;
  overflow: hidden;
}

.prestasi-image::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
  transition: left 0.8s ease;
  z-index: 2;
}

.prestasi-card:hover .prestasi-image::before {
  left: 100%;
}

.prestasi-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: transform 0.4s ease;
}

.prestasi-card:hover .prestasi-image img {
  transform: scale(1.15) rotate(2deg);
}

.prestasi-badge {
  position: absolute;
  top: 15px;
  right: 15px;
  background: linear-gradient(135deg, #ffd700, #ffed4e);
  color: #1a1a1a;
  padding: 6px 12px;
  border-radius: 20px;
  font-size: 0.8rem;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 4px;
  box-shadow: 0 4px 12px rgba(255,215,0,0.3);
  animation: badgePulse 2s ease-in-out infinite;
  z-index: 3;
}

@keyframes badgePulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.05); }
}

.prestasi-badge.silver {
  background: linear-gradient(135deg, #c0c0c0, #e8e8e8);
}

.prestasi-badge.bronze {
  background: linear-gradient(135deg, #cd7f32, #daa520);
}

.prestasi-badge.special {
  background: linear-gradient(135deg, #0d6efd, #6610f2);
  color: white;
}

.prestasi-content {
  padding: 1.5rem;
}

.prestasi-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: #1a1a1a;
  margin-bottom: 0.5rem;
}

.prestasi-category {
  font-size: 0.85rem;
  color: #0d6efd;
  font-weight: 500;
  margin-bottom: 0.8rem;
}

.prestasi-description {
  font-size: 0.9rem;
  color: #666;
  line-height: 1.5;
  margin-bottom: 1rem;
}

.prestasi-meta {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 1rem;
  border-top: 1px solid rgba(13,110,253,0.1);
}

.prestasi-year {
  font-size: 0.8rem;
  color: #0d6efd;
  font-weight: 600;
}

.prestasi-level {
  font-size: 0.8rem;
  color: #666;
  background: rgba(13,110,253,0.1);
  padding: 4px 8px;
  border-radius: 12px;
}

.statistics-section {
  background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
  border-radius: 24px;
  padding: 3rem 2rem;
  margin-top: 4rem;
}

.stat-card {
  text-align: center;
  padding: 1.5rem;
  transition: all 0.3s ease;
  border-radius: 15px;
}

.stat-card:hover {
  transform: translateY(-5px);
  background: rgba(13,110,253,0.05);
}

.stat-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #0d6efd, #6610f2);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
  box-shadow: 0 8px 25px rgba(13,110,253,0.3);
  animation: iconSpin 8s linear infinite;
  transition: all 0.3s ease;
}

@keyframes iconSpin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.stat-card:hover .stat-icon {
  animation: none;
  transform: scale(1.1);
}

.stat-icon i {
  font-size: 1.5rem;
  color: white;
}

.stat-number {
  font-size: 2.5rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 0.5rem;
}

.stat-label {
  font-size: 0.9rem;
  color: #666;
  font-weight: 500;
}

.floating-elements {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  overflow: hidden;
}

.floating-shape {
  position: absolute;
  border-radius: 50%;
  background: linear-gradient(135deg, rgba(13,110,253,0.1), rgba(102,16,242,0.1));
  animation: floatUpDown 6s ease-in-out infinite;
}

.shape-1 {
  width: 60px;
  height: 60px;
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.shape-2 {
  width: 40px;
  height: 40px;
  top: 60%;
  right: 15%;
  animation-delay: 2s;
}

.shape-3 {
  width: 80px;
  height: 80px;
  bottom: 20%;
  left: 20%;
  animation-delay: 4s;
}

@keyframes floatUpDown {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  33% { transform: translateY(-20px) rotate(120deg); }
  66% { transform: translateY(10px) rotate(240deg); }
}

.prestasi-content {
  padding: 1.5rem;
  position: relative;
  overflow: hidden;
}

.prestasi-content::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #0d6efd, transparent);
  animation: contentSlide 3s ease-in-out infinite;
}

@keyframes contentSlide {
  0% { left: -100%; }
  50% { left: 100%; }
  100% { left: -100%; }
}

@media (max-width: 768px) {
  .hero-title {
    font-size: 2rem;
  }

  .section-title {
    font-size: 1.8rem;
  }

  .prestasi-image {
    height: 120px;
  }

  .statistics-section {
    padding: 2rem 1rem;
  }

  .stat-number {
    font-size: 2rem;
  }

  .floating-shape {
    display: none;
  }
}

.hero-stats {
  position: relative;
  overflow: hidden;
}

.hero-stats::before {
  content: '🏆';
  position: absolute;
  top: -10px;
  right: 10%;
  font-size: 1.2rem;
  opacity: 0.3;
  animation: trophyBounce 4s ease-in-out infinite;
  animation-delay: 0s;
}

.hero-stats::after {
  content: '🥇';
  position: absolute;
  bottom: -5px;
  left: 15%;
  font-size: 1rem;
  opacity: 0.25;
  animation: trophyBounce 5s ease-in-out infinite;
  animation-delay: 2s;
}

@keyframes trophyBounce {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
    opacity: 0.2;
  }
  25% {
    transform: translateY(-8px) rotate(5deg);
    opacity: 0.4;
  }
  50% {
    transform: translateY(-4px) rotate(-3deg);
    opacity: 0.3;
  }
  75% {
    transform: translateY(-10px) rotate(8deg);
    opacity: 0.35;
  }
}

/* Enhanced Icon Styles */
.stat-icon-small {
  width: 44px !important;
  height: 44px !important;
  border-radius: 14px !important;
  font-size: 1.2rem !important;
  box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
  animation: iconGlow 3s ease-in-out infinite !important;
}

@keyframes iconGlow {
  0%, 100% {
    transform: translateY(0px) scale(1);
    filter: brightness(1);
  }
  50% {
    transform: translateY(-3px) scale(1.03);
    filter: brightness(1.1);
  }
}

.stat-icon-small.gold {
  background: rgba(245, 158, 11, 0.15) !important;
  border: 1px solid rgba(245, 158, 11, 0.3) !important;
  color: #f59e0b !important;
  backdrop-filter: blur(10px) !important;
  box-shadow: 0 8px 25px rgba(245, 158, 11, 0.2) !important;
}

.stat-icon-small.blue {
  background: rgba(99, 102, 241, 0.15) !important;
  border: 1px solid rgba(99, 102, 241, 0.3) !important;
  color: #6366f1 !important;
  backdrop-filter: blur(10px) !important;
  box-shadow: 0 8px 25px rgba(99, 102, 241, 0.2) !important;
}

.stat-icon-small.green {
  background: rgba(16, 185, 129, 0.15) !important;
  border: 1px solid rgba(16, 185, 129, 0.3) !important;
  color: #10b981 !important;
  backdrop-filter: blur(10px) !important;
  box-shadow: 0 8px 25px rgba(16, 185, 129, 0.2) !important;
}

.stat-item:hover .stat-icon-small {
  transform: scale(1.2) rotate(10deg) translateY(-3px) !important;
  animation: none !important;
}

/* Transparent Hero Stats Background */
.hero-stats {
  background: rgba(255, 255, 255, 0.1) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05) !important;
  backdrop-filter: blur(20px) !important;
}

/* Transparent Prestasi Link Buttons */
.prestasi-links .btn {
  background: rgba(255, 255, 255, 0.1) !important;
  border: 1px solid rgba(255, 255, 255, 0.2) !important;
  backdrop-filter: blur(15px) !important;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05) !important;
  transition: all 0.3s ease !important;
}

.prestasi-links .btn-primary {
  color: #3b82f6 !important;
  border-color: rgba(59, 130, 246, 0.3) !important;
}

.prestasi-links .btn-outline-primary {
  color: #6b7280 !important;
  border-color: rgba(107, 114, 128, 0.3) !important;
}

.prestasi-links .btn:hover {
  background: rgba(255, 255, 255, 0.2) !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1) !important;
}

/* Move Section Title Down Closer to Underline */
.section-title {
  margin-bottom: 0.2rem !important;
  line-height: 1.1 !important;
  transform: translateY(8px) !important;
  padding-bottom: 8px !important;
}

.section-title::after {
  bottom: -1px !important;
}

/* Add Space Between Title and Description */
.section-description {
  margin-top: 2rem !important;
}
</style>
