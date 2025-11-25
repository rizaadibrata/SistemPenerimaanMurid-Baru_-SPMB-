@extends('layouts.main')

@section('title', 'Home - Clinic Bootstrap Template')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-8">
        <div class="hero-content text-center">
          <h1 data-aos="fade-up" data-aos-delay="300" style="font-size: clamp(1.8rem, 4vw, 2.5rem); line-height: 1.4; font-weight: 700; text-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 25px;">
            Seleksi Penerimaan Murid Baru<br>
            <span class="highlight" style="background: linear-gradient(135deg, #007bff, #0056b3); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: 800; text-shadow: none;">SMK BAKTI NUSANTARA 666</span><br>
            <span style="font-size: 0.75em; color: #666; font-weight: 600;">Tahun Pelajaran 2025/2026</span>
          </h1>

          <p class="hero-description" data-aos="fade-up" data-aos-delay="400" style="font-size: clamp(1rem, 2.5vw, 1.2rem); line-height: 1.6; margin-bottom: 40px; font-weight: 500; color: #555; max-width: 800px; margin-left: auto; margin-right: auto;">
            Bergabunglah dengan SMK Bakti Nusantara 666, sekolah berorientasi teknologi dan karakter yang berkomitmen menyiapkan lulusan siap kerja, siap kuliah, serta siap menghadapi tantangan masa depan.
          </p>

          <div class="hero-stats" data-aos="fade-up" data-aos-delay="500" style="display: flex; flex-wrap: wrap; justify-content: center; gap: clamp(20px, 5vw, 50px); margin-bottom: 40px;">
            <div class="stat-item text-center">
              <h3 style="margin-bottom: 5px; font-size: clamp(1.5rem, 3vw, 2rem); color: #007bff;"><span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p style="margin: 0; font-size: clamp(0.85rem, 2vw, 0.95rem); color: #666;">Tahun Dedikasi Pendidikan</p>
            </div>
            <div class="stat-item text-center">
              <h3 style="margin-bottom: 5px; font-size: clamp(1.5rem, 3vw, 2rem); color: #007bff;"><span data-purecounter-start="0" data-purecounter-end="300" data-purecounter-duration="2" class="purecounter"></span>+</h3>
              <p style="margin: 0; font-size: clamp(0.85rem, 2vw, 0.95rem); color: #666;">Lulusan Berprestasi</p>
            </div>
            <div class="stat-item text-center">
              <h3 style="margin-bottom: 5px; font-size: clamp(1.5rem, 3vw, 2rem); color: #007bff;">Akreditasi A</h3>
              <p style="margin: 0; font-size: clamp(0.85rem, 2vw, 0.95rem); color: #666;">Sekolah Unggulan</p>
            </div>
          </div>

          <div class="hero-actions" data-aos="fade-up" data-aos-delay="600" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px;">
            <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary" style="border-radius: 8px; padding: 12px 30px; font-weight: 600;">Daftar Sekarang</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-outline glightbox" style="border-radius: 8px; padding: 12px 30px; font-weight: 600;">
              <i class="bi bi-play-circle me-2"></i>
              Informasi PPDB
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Hero Section -->

<!-- Home About Section -->
<section id="home-about" class="home-about section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
        <div class="about-content">
          <h2 class="section-heading"><h2>Pendidikan Berkualitas, Berkarakter, dan Berdaya Saing</h2></h2><br>
          <p class="lead-text">Sejak tahun 2009, SMK Bakti Nusantara 666 berkomitmen memberikan pendidikan kejuruan berbasis teknologi dan karakter untuk mencetak lulusan yang kompeten, berintegritas, serta siap bersaing di dunia industri dan perguruan tinggi.</p>

          <p>Dengan tenaga pendidik profesional dan fasilitas pembelajaran modern, kami terus berinovasi untuk menjadi sekolah unggulan yang melahirkan generasi berprestasi.</p>

          <div class="stats-grid" style="margin-left: -40px; gap: 10px;">
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="700" data-purecounter-duration="1">+</div>
              <div class="stat-label">Siswa Aktif dan Alumni</div>
            </div>
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1">+</div>
              <div class="stat-label">Tahun Pengalaman dan Dedikasi</div>
            </div>
            <div class="stat-item">
              <div class="stat-number purecounter" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1">+</div>
              <div class="stat-label">Prestasi dan Penghargaan Sekolah</div>
            </div>
          </div>

          <div class="cta-section">
            <a href="{{ url('/about') }}" class="btn-primary">Tentang Kami</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
        <div class="about-visual">
          <div class="main-image" style="height: 400px; overflow: hidden; border-radius: 15px;">
            <img src="{{ asset('assets/img/health/pk2.jpg') }}" alt="Modern medical facility" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          <div class="floating-card">
            <div class="card-content">
              <div class="icon">
                <i class="bi bi-info-circle"></i>
              </div>
              <div class="card-text">
                <h4>Layanan Informasi PPDB</h4>
                <p>Selalu siap membantu Anda dalam proses pendaftaran siswa baru</p>
              </div>
            </div>
          </div>
          <div class="experience-badge">
            <div class="badge-content">
              <span class="years">16+ </span>
              <span class="text">Years of Excellence</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Home About Section -->

<!-- Featured Services Section -->
<section id="featured-services" class="featured-services section" style="padding: 80px 0; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
  <div class="container section-title" data-aos="fade-up" style="margin-bottom: 60px;">
    <h2 style="font-size: 2.5rem; font-weight: 700; color: #1a1a1a; margin-bottom: 20px;">Fasilitas dan Kegiatan Unggulan</h2>
    <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 0 auto;">Nikmati lingkungan belajar yang nyaman dan kegiatan sekolah yang mendukung pengembangan potensi siswa.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
        <div class="featured-service-main h-100" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
          <div class="service-image-wrapper" style="position: relative; overflow: hidden; height: 350px;">
            <img src="{{ asset('assets/img/health/lab.jpg') }}" alt="Fasilitas Unggulan" class="img-fluid" loading="lazy" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(1.1);">
          </div>
          <div class="service-details" style="padding: 35px;">
            <h3 style="font-size: 1.8rem; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">Pendidikan dan Fasilitas Unggulan</h3>
            <p style="color: #666; line-height: 1.8; margin-bottom: 10px;">Kami menggabungkan pembelajaran berbasis teknologi dan sinergi industri untuk meningkatkan kompetensi dan daya saing siswa.</p>
            <p style="color: #666; line-height: 1.8; margin-bottom: 10px;">Proses belajar yang inovatif membantu siswa mengembangkan keterampilan praktis dan kemampuan berpikir kritis sesuai kebutuhan dunia kerja.</p>
            <p style="color: #666; line-height: 1.8; margin-bottom: 25px;">Dengan dukungan fasilitas modern dan lingkungan belajar yang kolaboratif.</p>
            <a href="{{ url('/fasilitas') }}" class="main-cta" style="display: inline-flex; align-items: center; gap: 10px; background: #007bff; color: white; padding: 14px 30px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">Lihat Selengkapnya →</a>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="row g-4">
          <div class="col-12" data-aos="fade-left" data-aos-delay="300">
            <div class="service-item" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; gap: 20px;">
              <div class="service-icon-wrapper" style="flex-shrink: 0; width: 60px; height: 60px; background: rgba(0,123,255,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-building" style="color: #007bff; font-size: 1.5rem;"></i>
              </div>
              <div class="service-info">
                <h4 style="font-size: 1.3rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px;">Fasilitas Lengkap</h4>
                <p style="color: #666; line-height: 1.7; margin-bottom: 15px;">SMK Bakti Nusantara 666 menyediakan ruang praktik modern, laboratorium komputer, studio kreatif, dan sarana olahraga untuk menunjang proses pembelajaran yang optimal.</p>
                <a href="{{ url('/fasilitas') }}" class="service-link" style="color: #007bff; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">Pelajari Lebih Lanjut <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-12" data-aos="fade-left" data-aos-delay="400">
            <div class="service-item" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; gap: 20px;">
              <div class="service-icon-wrapper" style="flex-shrink: 0; width: 60px; height: 60px; background: rgba(40,167,69,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-people" style="color: #28a745; font-size: 1.5rem;"></i>
              </div>
              <div class="service-info">
                <h4 style="font-size: 1.3rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px;">Kegiatan Siswa</h4>
                <p style="color: #666; line-height: 1.7; margin-bottom: 15px;">Sekolah aktif mengembangkan minat dan bakat siswa melalui berbagai kegiatan ekstrakurikuler, seperti Lomba Kompetensi Siswa (LKS), pramuka, seni, dan kewirausahaan.</p>
                <a href="{{ url('/fasilitas') }}" class="service-link" style="color: #28a745; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">Pelajari Lebih Lanjut <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-12" data-aos="fade-left" data-aos-delay="500">
            <div class="service-item" style="background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; gap: 20px;">
              <div class="service-icon-wrapper" style="flex-shrink: 0; width: 60px; height: 60px; background: rgba(255,193,7,0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                <i class="bi bi-briefcase" style="color: #ffc107; font-size: 1.5rem;"></i>
              </div>
              <div class="service-info">
                <h4 style="font-size: 1.3rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px;">Kemitraan Industri</h4>
                <p style="color: #666; line-height: 1.7; margin-bottom: 15px;">SMK Bakti Nusantara 666 bekerja sama dengan berbagai perusahaan dan institusi pendidikan tinggi untuk mendukung program magang dan penyaluran kerja.</p>
                <a href="{{ url('/fasilitas') }}" class="service-link" style="color: #ffc107; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">Pelajari Lebih Lanjut <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Featured Services Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimoni Alumni</h2>
    <p>Dengarkan pengalaman lulusan SMK Bakti Nusantara 666 yang telah sukses berkarir</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="testimonial-card">
          <div class="testimonial-content">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <p>"SMK Bakti Nusantara 666 memberikan bekal yang sangat baik. Sekarang saya bekerja sebagai programmer di perusahaan teknologi ternama."</p>
          </div>
          <div class="testimonial-author">
            <img src="{{ asset('assets/img/person/person-m-12.webp') }}" alt="Alumni PPLG" class="img-fluid">
            <div class="author-info">
              <h5>Ahmad Rizki</h5>
              <span>Alumni PPLG 2022 - Software Developer</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="testimonial-card">
          <div class="testimonial-content">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <p>"Jurusan DKV di SMK Bakti Nusantara 666 sangat membantu mengembangkan kreativitas saya. Sekarang saya memiliki studio desain sendiri."</p>
          </div>
          <div class="testimonial-author">
            <img src="{{ asset('assets/img/person/person-f-11.webp') }}" alt="Alumni DKV" class="img-fluid">
            <div class="author-info">
              <h5>Sari Indah</h5>
              <span>Alumni DKV 2021 - Graphic Designer</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="testimonial-card">
          <div class="testimonial-content">
            <div class="stars">
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
              <i class="bi bi-star-fill"></i>
            </div>
            <p>"Pembelajaran akuntansi yang praktis dan modern membuat saya siap bekerja di dunia perbankan. Terima kasih SMK Bakti Nusantara 666!"</p>
          </div>
          <div class="testimonial-author">
            <img src="{{ asset('assets/img/person/person-m-13.webp') }}" alt="Alumni AKL" class="img-fluid">
            <div class="author-info">
              <h5>Budi Santoso</h5>
              <span>Alumni AKL 2020 - Bank Officer</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Testimonials Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section light-background">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="hero-content">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="content-wrapper" data-aos="fade-up" data-aos-delay="200">
            <h1 style="margin-left: 0px; font-size: 2.8rem;">Seleksi Penerimaan Siswa Baru (SPMB) SMK Bakti Nusantara 666</h1>
            <p>SMK Bakti Nusantara 666 membuka pendaftaran bagi calon siswa berprestasi yang siap berkembang di lingkungan pendidikan berbasis teknologi dan industri. Melalui proses seleksi yang transparan dan sistematis, kami berkomitmen menjaring peserta didik terbaik untuk dibimbing menjadi generasi yang kompeten, berkarakter, dan siap menghadapi tantangan dunia kerja.</p>

            <div class="cta-wrapper">
              <a href="{{ route('ppdb') }}" class="primary-cta">
                <span>Informasi PPDB</span>
                <i class="bi bi-arrow-right"></i>
              </a>
              <a href="{{ url('/about') }}" class="secondary-cta">
                <span>Tentang Sekolah</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="image-container" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('assets/img/health/hero.jpg') }}" alt="Medical Excellence" class="img-fluid">
          </div>
        </div>
      </div>
    </div>

    <div class="features-section">
      <div class="row g-0">
        <div class="col-lg-4">
          <div class="feature-block" data-aos="fade-up" data-aos-delay="200" style="border: 1px solid #ADD8E6; border-radius: 10px; padding: 20px; margin: 10px; box-shadow: 0 4px 8px rgba(173,216,230,0.3);">
            <div class="feature-icon">
              <i class="bi bi-laptop"></i>
            </div>
            <h3>Pembelajaran Berbasis Teknologi</h3>
            <p>SMK Bakti Nusantara 666 menerapkan sistem belajar modern dengan dukungan teknologi terkini agar siswa siap menghadapi dunia digital.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="feature-block" data-aos="fade-up" data-aos-delay="300" style="border: 1px solid #ADD8E6; border-radius: 10px; padding: 20px; margin: 10px; box-shadow: 0 4px 8px rgba(173,216,230,0.3);">
            <div class="feature-icon">
              <i class="bi bi-person-check"></i>
            </div>
            <h3>Guru Profesional dan Berpengalaman</h3>
            <p>Tenaga pendidik berkompeten dan berpengalaman di bidangnya, siap membimbing siswa menuju prestasi terbaik.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="feature-block" data-aos="fade-up" data-aos-delay="400" style="border: 1px solid #ADD8E6; border-radius: 10px; padding: 20px; margin: 10px; box-shadow: 0 4px 8px rgba(173,216,230,0.3);">
            <div class="feature-icon">
              <i class="bi bi-building"></i>
            </div>
            <h3>Fasilitas Lengkap dan Nyaman</h3>
            <p>Dilengkapi dengan ruang praktik, laboratorium, dan sarana belajar yang menunjang proses pembelajaran efektif.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="contact-block">
      <div class="row">
        <div class="col-lg-8">
          <div class="contact-content" data-aos="fade-up" data-aos-delay="200">
            <h2>Butuh Bantuan Informasi PPDB?</h2>
            <p>Tim panitia kami siap membantu menjawab pertanyaan seputar proses pendaftaran siswa baru.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="contact-actions" data-aos="fade-up" data-aos-delay="300">
            <a href="{{ url('/contact') }}" class="emergency-call" style="background-color: #007bff; color: white;">
              <i class="bi bi-telephone"></i>
              <span>Hubungi Panitia PPDB</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Call To Action Section -->

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

.hero-stats {
  padding: 20px 0;
}

.stat-item {
  min-width: 150px;
  padding: 10px;
}

.hero-actions {
  margin-top: 30px;
}

.hero-actions .btn {
  min-width: 160px;
  margin: 5px;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .hero {
    min-height: 60vh;
    padding: 60px 0;
  }

  .hero-stats {
    flex-direction: column;
    gap: 20px !important;
  }

  .stat-item {
    min-width: auto;
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
</style>

@endsection
