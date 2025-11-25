@extends('layouts.main')

@section('title', 'Fasilitas - SMK Bakti Nusantara 666')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        <div class="hero-content text-center">
          <h1 data-aos="fade-up" data-aos-delay="300" style="font-size: clamp(1.8rem, 4vw, 2.5rem); line-height: 1.4; font-weight: 700; text-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
            Fasilitas <span class="highlight" style="background: linear-gradient(135deg, #007bff, #0056b3); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; text-shadow: none;">SMK Bakti Nusantara 666</span>
          </h1>

          <p class="hero-description" data-aos="fade-up" data-aos-delay="400" style="font-size: clamp(1rem, 2.5vw, 1.2rem); line-height: 1.6; margin-bottom: 40px; font-weight: 500; color: #555; max-width: 800px; margin-left: auto; margin-right: auto;">
            Fasilitas lengkap dan modern yang mendukung pembelajaran kreatif dan inovatif untuk mencetak lulusan yang kompeten dan siap bersaing.
          </p>

          <div class="hero-actions" data-aos="fade-up" data-aos-delay="600" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;">
            <a href="#grid-fasilitas" class="btn btn-primary" style="border-radius: 8px; padding: 12px 30px; font-weight: 600;">
              <i class="bi bi-grid-3x3-gap me-2"></i>Lihat Semua Fasilitas
            </a>
            <a href="#virtual-tour" class="btn btn-outline glightbox" style="border-radius: 8px; padding: 12px 30px; font-weight: 600;">
              <i class="bi bi-camera-video me-2"></i>Tur Virtual Sekolah
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

<!-- Carousel Showcase -->
<section class="section" style="padding: 60px 0;">
  <div class="container">
    <div id="fasilitasCarousel" class="carousel slide" data-bs-ride="carousel" style="border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#fasilitasCarousel" data-bs-slide-to="0" class="active" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; opacity: 0.5; margin: 0 5px;"></button>
        <button type="button" data-bs-target="#fasilitasCarousel" data-bs-slide-to="1" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; opacity: 0.5; margin: 0 5px;"></button>
        <button type="button" data-bs-target="#fasilitasCarousel" data-bs-slide-to="2" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; opacity: 0.5; margin: 0 5px;"></button>
        <button type="button" data-bs-target="#fasilitasCarousel" data-bs-slide-to="3" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; opacity: 0.5; margin: 0 5px;"></button>
        <button type="button" data-bs-target="#fasilitasCarousel" data-bs-slide-to="4" style="width: 12px; height: 12px; border-radius: 50%; background: white; border: none; opacity: 0.5; margin: 0 5px;"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('assets/fasilitas/lab1.jpg') }}" class="d-block w-100" alt="Laboratorium Komputer" style="height: 400px; object-fit: cover;">
          <div class="carousel-caption" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); bottom: 0; left: 0; right: 0; padding: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">Laboratorium Komputer</h3>
            <p style="color: #fff; margin: 0;">Dilengkapi 50+ unit komputer modern dengan spesifikasi tinggi dan internet cepat</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/fasilitas/Perpus.jpg') }}" class="d-block w-100" alt="Perpustakaan" style="height: 400px; object-fit: cover;">
          <div class="carousel-caption" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); bottom: 0; left: 0; right: 0; padding: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">Perpustakaan</h3>
            <p style="color: #fff; margin: 0;">Koleksi ribuan buku dan akses e-library untuk mendukung pembelajaran</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/fasilitas/broadcast.jpg') }}" class="d-block w-100" alt="Workshop" style="height: 400px; object-fit: cover;">
          <div class="carousel-caption" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); bottom: 0; left: 0; right: 0; padding: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">Workshop & Studio</h3>
            <p style="color: #fff; margin: 0;">Ruang praktik dengan peralatan profesional untuk setiap jurusan</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/fasilitas/tu2.jpg') }}" class="d-block w-100" alt="Aula" style="height: 400px; object-fit: cover;">
          <div class="carousel-caption" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); bottom: 0; left: 0; right: 0; padding: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">Aula Serbaguna</h3>
            <p style="color: #fff; margin: 0;">Kapasitas 500 orang dengan sound system dan proyektor berkualitas tinggi</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/fasilitas/cctv.jpg') }}" class="d-block w-100" alt="Kantin" style="height: 400px; object-fit: cover;">
          <div class="carousel-caption" style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); bottom: 0; left: 0; right: 0; padding: 2rem;">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: #fff; margin-bottom: 0.5rem;">Kantin Sekolah</h3>
            <p style="color: #fff; margin: 0;">Menyediakan makanan sehat dan bergizi dengan harga terjangkau</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#fasilitasCarousel" data-bs-slide="prev" style="background: none; border: none; top: 50%; transform: translateY(-50%); left: 20px;">
        <i class="bi bi-arrow-left" style="color: white; font-size: 2rem; text-shadow: 0 2px 4px rgba(0,0,0,0.5);"></i>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#fasilitasCarousel" data-bs-slide="next" style="background: none; border: none; top: 50%; transform: translateY(-50%); right: 20px;">
        <i class="bi bi-arrow-right" style="color: white; font-size: 2rem; text-shadow: 0 2px 4px rgba(0,0,0,0.5);"></i>
      </button>
    </div>
  </div>
</section>

<!-- Grid Fasilitas -->
<section id="grid-fasilitas" class="section">
  <div class="container">
    <div class="section-title text-center mb-5" data-aos="fade-up">
      <h2 style="color: black !important; background: none !important; -webkit-text-fill-color: black !important;">Fasilitas Unggulan Kami</h2>
      <p style="font-size: 1.1rem; color: #666;">Berbagai fasilitas modern untuk mendukung proses belajar mengajar yang optimal</p>
    </div>
    <div class="row g-4" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-pc-display" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/lab1.jpg') }}" class="facility-img" alt="Lab Komputer" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Laboratorium Komputer</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">50+ unit komputer modern dengan spesifikasi tinggi, internet cepat, dan software terkini untuk pembelajaran teknologi informasi.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-book" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/Perpus.jpg') }}" class="facility-img" alt="Perpustakaan" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Perpustakaan</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">Ribuan koleksi buku pelajaran dan referensi, dilengkapi e-library dan ruang baca nyaman untuk 100+ siswa.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-gear" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/broadcast.jpg') }}" class="facility-img" alt="Workshop" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Workshop & Studio</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">Ruang praktik dengan peralatan profesional, studio multimedia, dan area desain untuk praktik langsung setiap jurusan.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-building" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/tu2.jpg') }}" class="facility-img" alt="Ruang Keuangan" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Ruang Keuangan</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">Mengelola administrasi dan transaksi keuangan sekolah dengan sistem yang tertib, aman, serta fasilitas yang mendukung pelayanan.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-cup-hot" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/cctv.jpg') }}" class="facility-img" alt="Ruang CCTV" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Ruang CCTV</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">Pemantauan kamera sekolah real time dengan sistem keamanan terpusat yang andal serta rekaman aman untuk pengawasan.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="facility-card" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; position: relative;">
          <div class="facility-icon" style="position: absolute; top: 15px; right: 15px; width: 50px; height: 50px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; z-index: 2;">
            <i class="bi bi-wifi" style="color: #007bff; font-size: 1.5rem;"></i>
          </div>
          <img src="{{ asset('assets/fasilitas/lab.jpg') }}" class="facility-img" alt="Maintenance" style="width: 100%; height: 200px; object-fit: cover;">
          <div style="padding: 1.5rem;">
            <h3 style="font-size: 1.2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 0.8rem;">Maintenance</h3>
            <p style="color: #666; line-height: 1.6; margin: 0;">Perawatan fasilitas sekolah secara rutin untuk memastikan seluruh sarana tetap berfungsi optimal dan mendukung kegiatan belajar mengajar.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Virtual Tour Section -->
<section id="virtual-tour" class="section light-background">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
        <div class="video-wrapper" style="position: relative; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
          <img src="{{ asset('assets/img/health/pk.jpg') }}" class="img-fluid" alt="Virtual Tour">
          <div class="play-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 70px; height: 70px; background: rgba(0,123,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.3s ease;">
            <i class="bi bi-play-circle" style="font-size: 2rem; color: #fff; margin-left: 3px;"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <h2 style="font-size: 2rem; font-weight: 700; color: var(--heading-color); margin-bottom: 1rem;">Tur Virtual Sekolah</h2>
        <p style="font-size: 1.1rem; color: #666; line-height: 1.6; margin-bottom: 1.5rem;">Nikmati tur virtual interaktif dan lihat bagaimana suasana belajar yang nyaman di SMK Bakti Nusantara 666. Jelajahi setiap sudut sekolah dari kenyamanan rumah Anda.</p>
        <ul style="list-style: none; padding: 0; margin-bottom: 2rem;">
          <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 0.8rem; color: #555;"><i class="bi bi-check-circle" style="color: #007bff; font-size: 1.2rem;"></i> Jelajahi semua fasilitas sekolah</li>
          <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 0.8rem; color: #555;"><i class="bi bi-check-circle" style="color: #007bff; font-size: 1.2rem;"></i> Lihat ruang kelas dan laboratorium</li>
          <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 0.8rem; color: #555;"><i class="bi bi-check-circle" style="color: #007bff; font-size: 1.2rem;"></i> Rasakan suasana belajar yang nyaman</li>
        </ul>
        <a href="#" class="btn btn-primary" style="border-radius: 8px; padding: 12px 30px; font-weight: 600;"><i class="bi bi-camera-video me-2"></i>Mulai Tur Virtual</a>
      </div>
    </div>
  </div>
</section>



@endsection

<style>
/* Hero Section Responsive Styles */
.hero {
  min-height: 70vh;
  display: flex;
  align-items: center;
  padding: 80px 0;
}

.hero-content {
  padding: 20px;
}

.hero-actions {
  margin-top: 30px;
}

.hero-actions .btn {
  min-width: 160px;
  margin: 5px;
}

.play-button:hover {
  background: #007bff !important;
  transform: translate(-50%, -50%) scale(1.1);
}

.facility-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
}

.carousel-indicators button.active {
  opacity: 1 !important;
  transform: scale(1.2);
}

.carousel-control-prev,
.carousel-control-next {
  background: none !important;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
  transform: translateY(-50%) scale(1.2);
  background: none !important;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .hero {
    min-height: 60vh;
    padding: 60px 0;
  }

  .hero-actions {
    flex-direction: column;
    align-items: center;
  }

  .hero-actions .btn {
    width: 100%;
    max-width: 280px;
  }
}

@media (max-width: 576px) {
  .hero {
    padding: 40px 0;
  }

  .hero-content {
    padding: 10px;
  }
}

/* Carousel Section */
.carousel-section {
  padding: 5rem 0;
}

.carousel-inner {
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(30,120,200,0.25), 0 8px 25px rgba(0,0,0,0.1);
  border: 1px solid rgba(255,255,255,0.3);
}

.carousel-item img {
  height: 500px;
  object-fit: cover;
}

.carousel-caption {
  background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
  bottom: 0;
  left: 0;
  right: 0;
  padding: 3rem 2rem 2rem;
}

.carousel-caption h3 {
  font-size: 2rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 0.5rem;
}

.carousel-caption p {
  font-size: 1.1rem;
  color: #fff;
  margin: 0;
}

.carousel-indicators button {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #4dafff;
  border: none;
  opacity: 0.5;
}

.carousel-indicators button.active {
  opacity: 1;
  transform: scale(1.2);
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  width: 50px;
  height: 50px;
  background-color: rgba(77,175,255,0.8);
  border-radius: 50%;
  backdrop-filter: blur(10px);
}

.carousel-control-prev:hover .carousel-control-prev-icon,
.carousel-control-next:hover .carousel-control-next-icon {
  background-color: #4dafff;
}

/* Grid Fasilitas */
.grid-fasilitas {
  padding: 5rem 0;
  background: linear-gradient(180deg, #ffffff 0%, #f0f9ff 100%);
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  background: linear-gradient(135deg, #1e3a8a, #1e78c8, #2563eb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 1rem;
}

.section-subtitle {
  font-size: 1.1rem;
  color: #666;
}

.facility-card {
  background: linear-gradient(135deg, #ffffff 0%, #fafbff 100%);
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 10px 40px rgba(30,120,200,0.12), 0 4px 12px rgba(0,0,0,0.08);
  transition: all 0.4s ease;
  height: 100%;
  border: 1px solid rgba(77,175,255,0.1);
}

.facility-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 25px 70px rgba(30,120,200,0.25), 0 10px 30px rgba(0,0,0,0.12);
  border-color: rgba(77,175,255,0.3);
}

.facility-icon {
  position: absolute;
  top: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, rgba(77,175,255,0.2), rgba(30,120,200,0.15));
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 2;
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,0.5);
  box-shadow: 0 4px 15px rgba(77,175,255,0.2);
}

.facility-icon i {
  font-size: 1.8rem;
  color: #4dafff;
}

.facility-img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.facility-card:hover .facility-img {
  transform: scale(1.1);
}

.facility-card {
  position: relative;
}

.facility-title {
  font-size: 1.3rem;
  font-weight: 700;
  color: #1e3a8a;
  margin: 1.5rem 1.5rem 0.8rem;
}

.facility-desc {
  font-size: 0.95rem;
  color: #666;
  line-height: 1.6;
  margin: 0 1.5rem 1.5rem;
}

/* Virtual Tour */
.virtual-tour {
  padding: 5rem 0;
  background: linear-gradient(180deg, #f0f9ff 0%, #ffffff 50%, #fafbff 100%);
}

.video-wrapper {
  position: relative;
  border-radius: 24px;
  overflow: hidden;
  box-shadow: 0 20px 60px rgba(77,175,255,0.2);
}

.video-wrapper img {
  width: 100%;
}

.play-button {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 80px;
  height: 80px;
  background: rgba(77,175,255,0.9);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  backdrop-filter: blur(10px);
}

.play-button:hover {
  background: #4dafff;
  transform: translate(-50%, -50%) scale(1.1);
}

.play-button i {
  font-size: 2.5rem;
  color: #fff;
  margin-left: 5px;
}

.tour-title {
  font-size: 2.2rem;
  font-weight: 700;
  background: linear-gradient(135deg, #1e3a8a, #1e78c8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 1rem;
}

.tour-desc {
  font-size: 1.05rem;
  color: #666;
  line-height: 1.7;
  margin-bottom: 1.5rem;
}

.tour-features {
  list-style: none;
  padding: 0;
  margin-bottom: 2rem;
}

.tour-features li {
  font-size: 1rem;
  color: #555;
  margin-bottom: 0.8rem;
  display: flex;
  align-items: center;
  gap: 10px;
}

.tour-features i {
  font-size: 1.3rem;
  color: #4dafff;
}

.btn-tour {
  padding: 14px 32px;
  background: #4dafff;
  color: #fff;
  border: none;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
  box-shadow: 0 8px 25px rgba(77,175,255,0.3);
}

.btn-tour:hover {
  background: #3a9ee5;
  transform: translateY(-3px);
  box-shadow: 0 12px 35px rgba(77,175,255,0.4);
  color: #fff;
}

/* CTA Section */
.cta-section {
  padding: 5rem 0;
  background: linear-gradient(90deg, #4dafff, #a3d9ff);
  position: relative;
  overflow: hidden;
}

.cta-section::before {
  content: '';
  position: absolute;
  top: -50%;
  right: -10%;
  width: 500px;
  height: 500px;
  background: rgba(255,255,255,0.1);
  border-radius: 50%;
}

.cta-section::after {
  content: '';
  position: absolute;
  bottom: -50%;
  left: -10%;
  width: 600px;
  height: 600px;
  background: rgba(255,255,255,0.08);
  border-radius: 50%;
}

.cta-section .container {
  position: relative;
  z-index: 2;
}

.cta-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: 1rem;
  text-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.cta-subtitle {
  font-size: 1.2rem;
  color: #fff;
  margin-bottom: 2rem;
  opacity: 0.95;
}

.cta-buttons {
  display: flex;
  gap: 1rem;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-cta {
  padding: 14px 32px;
  border-radius: 50px;
  font-weight: 600;
  font-size: 1rem;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.btn-cta.btn-light {
  background: rgba(255,255,255,0.2);
  border: 2px solid #fff;
  color: #fff;
  backdrop-filter: blur(10px);
}

.btn-cta.btn-light:hover {
  background: #fff;
  color: #4dafff;
  transform: translateY(-3px);
}

.btn-cta.btn-white {
  background: #fff;
  border: none;
  color: #4dafff;
}

.btn-cta.btn-white:hover {
  background: #f0f0f0;
  transform: translateY(-3px);
  box-shadow: 0 12px 35px rgba(0,0,0,0.2);
}

/* Responsive */
@media (max-width: 768px) {
  .hero-fasilitas {
    min-height: 500px;
    padding-top: 160px;
    padding-bottom: 60px;
  }

  .hero-title {
    font-size: 2rem;
  }

  .hero-subtitle {
    font-size: 1.05rem;
  }

  .wave-divider svg {
    height: 60px;
  }

  .btn-hero {
    padding: 12px 28px;
    font-size: 0.95rem;
  }

  .hero-buttons {
    flex-direction: column;
    align-items: center;
  }

  .btn-hero {
    width: 100%;
    max-width: 280px;
    justify-content: center;
  }

  .carousel-item img {
    height: 300px;
  }

  .carousel-caption h3 {
    font-size: 1.3rem;
  }

  .carousel-caption p {
    font-size: 0.9rem;
  }

  .section-title {
    font-size: 1.8rem;
  }

  .tour-title {
    font-size: 1.6rem;
  }

  .cta-title {
    font-size: 1.6rem;
  }

  .cta-subtitle {
    font-size: 1rem;
  }
}
</style>
