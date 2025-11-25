@extends('layouts.main')

@section('title', 'Informasi Gelombang PPDB')

@section('content')
<!-- PPDB Hero Section -->
@include('partials.ppdb-hero')



<!-- Jadwal Gelombang Section -->
<section id="jadwal-gelombang" class="section py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center mb-1" data-aos="fade-up">
        <h2 class="section-title jadwal-title">Jadwal Gelombang Pendaftaran</h2>
      </div>
    </div>

    <!-- Gelombang 1 -->
    <div class="gelombang-simple mb-5" data-aos="fade-up">
      <h3 class="gelombang-title"><i class="bi bi-1-circle-fill me-2"></i>Gelombang 1</h3>
      <div class="timeline-horizontal">
        <div class="timeline-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h6>Pendaftaran & Verifikasi</h6>
            <small>10-16 Juni 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h6>Masa Sanggah</h6>
            <small>10-17 Juni 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h6>Rapat Penetapan</h6>
            <small>18 Juni 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h6>Pengumuman</h6>
            <small>19 Juni 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">5</div>
          <div class="step-content">
            <h6>Daftar Ulang</h6>
            <small>20-23 Juni 2025</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Gelombang 2 -->
    <div class="gelombang-simple" data-aos="fade-up" data-aos-delay="200">
      <h3 class="gelombang-title"><i class="bi bi-2-circle-fill me-2"></i>Gelombang 2</h3>
      <div class="timeline-horizontal">
        <div class="timeline-step">
          <div class="step-number">1</div>
          <div class="step-content">
            <h6>Pendaftaran & Verifikasi</h6>
            <small>24 Juni - 1 Juli 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">2</div>
          <div class="step-content">
            <h6>Masa Sanggah</h6>
            <small>24 Juni - 2 Juli 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">3</div>
          <div class="step-content">
            <h6>Tes Terstandar</h6>
            <small>3-4 Juli 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">4</div>
          <div class="step-content">
            <h6>Tes Minat Bakat</h6>
            <small>2-7 Juli 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">5</div>
          <div class="step-content">
            <h6>Pengumuman</h6>
            <small>9-10 Juli 2025</small>
          </div>
        </div>
        <div class="timeline-step">
          <div class="step-number">6</div>
          <div class="step-content">
            <h6>Daftar Ulang</h6>
            <small>10-11 Juli 2025</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Syarat Pendaftaran Section -->
<section id="syarat" class="section" style="padding: 80px 0 40px 0;">
  <div class="container">
    <div class="section-title text-center mb-1" data-aos="fade-up" style="margin-top: 60px; margin-bottom: 20px;">
      <h2>Persiapan dan Syarat Pendaftaran</h2>
      <p style="font-size: 1rem;">Pastikan Anda telah menyiapkan dokumen-dokumen berikut sebelum mendaftar</p>
    </div>

    <div class="row g-3" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-3 col-md-6">
        <div class="requirement-card">
          <div class="req-icon">
            <i class="bi bi-file-earmark-text"></i>
          </div>
          <h6>Scan Ijazah / Rapor</h6>
          <small>PDF/JPG (max 2MB)</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="requirement-card">
          <div class="req-icon">
            <i class="bi bi-people"></i>
          </div>
          <h6>Scan KK & Akta Lahir</h6>
          <small>PDF/JPG (max 2MB)</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="requirement-card">
          <div class="req-icon">
            <i class="bi bi-person-square"></i>
          </div>
          <h6>Pas Foto Ukuran 3x4</h6>
          <small>JPG (max 1MB)</small>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="requirement-card">
          <div class="req-icon">
            <i class="bi bi-credit-card"></i>
          </div>
          <h6>Bukti Pembayaran</h6>
          <small>Sesuai gelombang</small>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Langkah Pendaftaran Section -->
<section id="langkah" class="section light-background">
  <div class="container">
    <div class="section-title text-center" data-aos="fade-up">
      <h2>Langkah-langkah Pendaftaran</h2>
      <p style="font-size: 1.2rem;">Ikuti 5 langkah mudah untuk menyelesaikan pendaftaran Anda</p>
    </div>

    <div class="steps-horizontal" data-aos="fade-up" data-aos-delay="100">
      <div class="step-card" data-aos="fade-up" data-aos-delay="200">
        <div class="step-icon">1</div>
        <h5>Buat Akun dan Login</h5>
        <p>Daftarkan akun baru dengan email aktif dan buat password yang aman</p>
      </div>

      <div class="step-card" data-aos="fade-up" data-aos-delay="300">
        <div class="step-icon">2</div>
        <h5>Lengkapi Formulir Pendaftaran</h5>
        <p>Isi data pribadi, data orang tua, dan pilihan jurusan dengan lengkap dan benar</p>
      </div>

      <div class="step-card" data-aos="fade-up" data-aos-delay="400">
        <div class="step-icon">3</div>
        <h5>Upload Berkas</h5>
        <p>Upload semua dokumen persyaratan sesuai format dan ukuran yang ditentukan</p>
      </div>

      <div class="step-card" data-aos="fade-up" data-aos-delay="500">
        <div class="step-icon">4</div>
        <h5>Lakukan Pembayaran</h5>
        <p>Transfer biaya pendaftaran ke rekening sekolah dan upload bukti pembayaran</p>
      </div>

      <div class="step-card" data-aos="fade-up" data-aos-delay="600">
        <div class="step-icon">5</div>
        <h5>Pantau Status Pendaftaran</h5>
        <p>Cek status verifikasi dan pengumuman hasil seleksi melalui dashboard Anda</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section id="cta" class="section py-5" style="background: linear-gradient(135deg, var(--surface-color) 0%, color-mix(in srgb, var(--accent-color), transparent 98%) 100%);">
  <div class="container">
    <div class="row justify-content-center text-center" data-aos="fade-up">
      <div class="col-lg-10">
        <div class="cta-content" style="background: var(--surface-color); padding: 2rem 2rem 3rem 2rem; border-radius: 20px; box-shadow: 0 10px 40px color-mix(in srgb, var(--default-color), transparent 90%); border: 1px solid color-mix(in srgb, var(--accent-color), transparent 90%);">
          <h2 class="section-title" style="font-size: 2.2rem; color: var(--heading-color); margin-bottom: 0; transform: translateY(40px);">Siap Bergabung dengan SMK Bakti Nusantara 666?</h2>
          <p class="lead mb-1" style="color: color-mix(in srgb, var(--default-color), transparent 25%); font-size: 1.1rem; line-height: 1.6; max-width: 600px; margin: 0 auto;">Jangan lewatkan kesempatan untuk menjadi bagian dari sekolah unggulan dengan fasilitas modern dan program keahlian terdepan.</p>

          <div class="cta-buttons d-flex flex-column flex-md-row justify-content-center gap-3" data-aos="fade-up" data-aos-delay="200" style="margin-top: 1rem;">
            <a href="{{ route('pendaftaran.index') }}" class="btn btn-primary btn-lg px-5 py-3" style="border-radius: 50px; font-weight: 600;">
              <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-5 py-3" style="border-radius: 50px; font-weight: 600;">
              <i class="bi bi-telephone me-2"></i>Hubungi Kami
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Hero Section */
.hero {
  background: linear-gradient(135deg, var(--surface-color) 0%, color-mix(in srgb, var(--accent-color), transparent 95%) 100%);
  padding: 80px 0 100px;
  position: relative;
  overflow: hidden;
}

.hero::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: url("../img/bg/bn.jpg") center/cover;
  z-index: 0;
  filter: blur(4px);
  opacity: 0.05;
}

.hero .container {
  position: relative;
  z-index: 1;
}

.hero-title {
  font-size: 2rem !important;
  font-weight: 700;
  color: var(--heading-color);
  line-height: 1.3;
  margin-bottom: 1rem;
  font-family: var(--heading-font);
  text-align: center;
}

.highlight {
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), #6610f2 30%));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-weight: 800;
  position: relative;
}

.spmb-text {
  color: var(--accent-color) !important;
  text-decoration: underline;
  text-underline-offset: 4px;
  text-decoration-thickness: 2px;
}

.hero-description {
  font-size: 1.1rem;
  color: color-mix(in srgb, var(--default-color), transparent 25%);
  line-height: 1.6;
  max-width: 625px;
  margin: 0 auto 2rem;
}

.hero-actions {
  margin-top: 2rem;
}

.hero-actions .btn {
  padding: 12px 30px;
  font-weight: 600;
  border-radius: 50px;
  font-size: 1.1rem;
  transition: all 0.3s ease;
}

.hero-actions .btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 25px color-mix(in srgb, var(--accent-color), transparent 70%);
}

.hero-wave {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  line-height: 0;
}

.hero-wave svg {
  position: relative;
  display: block;
  width: calc(100% + 1.3px);
  height: 60px;
}

.hero-wave .shape-fill {
  fill: var(--surface-color);
}

/* Section Styling */
.section {
  padding: 80px 0;
  color: var(--default-color);
  background-color: var(--background-color);
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: var(--heading-color);
  margin-bottom: 1rem;
  font-family: var(--heading-font);
}

.section-subtitle {
  font-size: 1.1rem;
  color: color-mix(in srgb, var(--default-color), transparent 25%);
  line-height: 1.6;
}

/* Simple Gelombang Timeline Styling */
.gelombang-simple {
  background: var(--surface-color);
  border-radius: 15px;
  padding: 2rem;
  box-shadow: 0 5px 20px color-mix(in srgb, var(--default-color), transparent 90%);
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.jadwal-title {
  font-size: 2.2rem;
  font-weight: 700;
  color: var(--heading-color);
  font-family: var(--heading-font);
  margin-bottom: 0.5rem;
}

.gelombang-title {
  color: var(--accent-color);
  font-weight: 700;
  font-size: 1.5rem;
  margin-bottom: 1.5rem;
  text-align: center;
  font-family: var(--heading-font);
}

.timeline-horizontal {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 1rem;
  position: relative;
}

.timeline-horizontal::before {
  content: '';
  position: absolute;
  top: 20px;
  left: 40px;
  right: 40px;
  height: 2px;
  background: linear-gradient(to right, var(--accent-color), color-mix(in srgb, var(--accent-color), transparent 50%));
  z-index: 1;
}

.timeline-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  flex: 1;
  position: relative;
  z-index: 2;
}

.step-number {
  width: 40px;
  height: 40px;
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), black 15%));
  color: var(--contrast-color);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1rem;
  margin-bottom: 0.75rem;
  box-shadow: 0 4px 15px color-mix(in srgb, var(--accent-color), transparent 70%);
  transition: all 0.3s ease;
}

.timeline-step:hover .step-number {
  transform: scale(1.1);
  box-shadow: 0 6px 20px color-mix(in srgb, var(--accent-color), transparent 50%);
}

.step-content h6 {
  color: var(--heading-color);
  font-weight: 600;
  font-size: 0.9rem;
  margin-bottom: 0.25rem;
  line-height: 1.2;
}

.step-content small {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  font-size: 0.8rem;
  line-height: 1.3;
}

@media (max-width: 768px) {
  .jadwal-title {
    font-size: 1.8rem;
  }

  .timeline-horizontal {
    flex-direction: column;
    gap: 1.5rem;
  }

  .timeline-horizontal::before {
    display: none;
  }

  .timeline-step {
    flex-direction: row;
    text-align: left;
    align-items: center;
    gap: 1rem;
  }

  .step-number {
    margin-bottom: 0;
    flex-shrink: 0;
  }

  .gelombang-simple {
    padding: 1.5rem;
  }
}

@media (max-width: 576px) {
  .jadwal-title {
    font-size: 1.5rem;
  }
}

/* Feature Cards */
.feature-card {
  background: linear-gradient(135deg, var(--surface-color) 0%, color-mix(in srgb, var(--accent-color), transparent 98%) 100%);
  padding: 2.5rem 2rem;
  border-radius: 20px;
  box-shadow: 0 15px 40px color-mix(in srgb, var(--accent-color), transparent 92%), 0 5px 15px color-mix(in srgb, var(--default-color), transparent 96%);
  text-align: center;
  height: 100%;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 94%);
}

.feature-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, color-mix(in srgb, var(--accent-color), transparent 90%), transparent);
  transition: left 0.6s;
}

.feature-card:hover::before {
  left: 100%;
}

.feature-card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 30px 80px color-mix(in srgb, var(--accent-color), transparent 85%), 0 12px 35px color-mix(in srgb, var(--default-color), transparent 90%);
  border-color: color-mix(in srgb, var(--accent-color), transparent 80%);
}

.feature-icon {
  width: 80px;
  height: 80px;
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), #6610f2 30%));
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
  color: var(--contrast-color);
  font-size: 2rem;
  transition: all 0.3s ease;
  position: relative;
  z-index: 2;
  box-shadow: 0 8px 25px color-mix(in srgb, var(--accent-color), transparent 70%);
}

.feature-card:hover .feature-icon {
  transform: rotateY(180deg);
  background: linear-gradient(135deg, #28a745, #20c997);
  box-shadow: 0 12px 35px rgba(40,167,69,0.4);
}

.feature-card h5 {
  font-size: 1.3rem;
  font-weight: 600;
  color: var(--heading-color);
  margin-bottom: 1rem;
  position: relative;
  z-index: 2;
  font-family: var(--heading-font);
}

.feature-card p {
  color: color-mix(in srgb, var(--default-color), transparent 25%);
  line-height: 1.6;
  margin: 0;
  position: relative;
  z-index: 2;
}

/* CTA Buttons */
.cta-buttons .btn {
  font-weight: 600;
  border-radius: 50px;
  padding: 15px 35px;
  font-size: 1.1rem;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
  overflow: hidden;
  border: 2px solid transparent;
}

.cta-buttons .btn::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
  transition: left 0.6s;
}

.cta-buttons .btn:hover::before {
  left: 100%;
}

.cta-buttons .btn:hover {
  transform: translateY(-3px) scale(1.05);
  box-shadow: 0 15px 35px color-mix(in srgb, var(--accent-color), transparent 60%);
}

.cta-buttons .btn-primary {
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), black 15%));
  border-color: var(--accent-color);
  color: var(--contrast-color);
}

.cta-buttons .btn-primary:hover {
  background: linear-gradient(135deg, color-mix(in srgb, var(--accent-color), black 15%), color-mix(in srgb, var(--accent-color), black 25%));
  color: var(--contrast-color);
}

.cta-buttons .btn-outline-primary {
  background: transparent;
  border-color: var(--accent-color);
  color: var(--accent-color);
}

.cta-buttons .btn-outline-primary:hover {
  background: var(--accent-color);
  border-color: var(--accent-color);
  color: var(--contrast-color);
}

/* Responsive Design */
@media (max-width: 768px) {
  .hero-title {
    font-size: 2.2rem;
  }

  .section-title {
    font-size: 2rem;
  }

  .feature-card {
    padding: 2rem 1.5rem;
    margin-bottom: 2rem;
  }

  .hero-stats {
    flex-direction: column;
    gap: 1rem;
    align-items: center;
  }

  .stat-item {
    width: 200px;
  }

  .cta-buttons {
    flex-direction: column;
    gap: 1rem;
  }

  .cta-buttons .btn {
    width: 100%;
    margin: 0;
  }


}

@media (max-width: 768px) {
  .steps-horizontal {
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }

  .steps-horizontal::before {
    display: none;
  }

  .step-card {
    max-width: 100%;
    width: 100%;
    padding: 1.25rem;
  }

  .step-card::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    height: 1rem;
    background: var(--accent-color);
    border-radius: 2px;
  }

  .step-card:last-child::after {
    display: none;
  }

  .step-icon {
    width: 45px;
    height: 45px;
    font-size: 1.1rem;
  }

  .step-card h5 {
    font-size: 1rem;
  }

  .step-card p {
    font-size: 0.85rem;
  }
}

@media (max-width: 576px) {
  .hero {
    padding: 60px 0 40px;
  }

  .hero-title {
    font-size: 2.3rem !important;
    line-height: 1.3 !important;
  }

  .hero-description {
    font-size: 1rem;
  }

  .section {
    padding: 60px 0;
  }

  .feature-card {
    padding: 2rem 1.5rem;
  }

  .feature-icon {
    width: 60px;
    height: 60px;
    font-size: 1.5rem;
  }

  .step-card {
    padding: 1rem;
  }

  .step-icon {
    width: 40px;
    height: 40px;
    font-size: 1rem;
  }
}

.table-responsive {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 20px color-mix(in srgb, var(--default-color), transparent 90%);
}

.requirement-card {
  background: var(--surface-color);
  border-radius: 10px;
  padding: 1.5rem 1rem;
  text-align: center;
  box-shadow: 0 2px 10px color-mix(in srgb, var(--default-color), transparent 90%);
  transition: all 0.3s ease;
  height: 100%;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 90%);
}

.requirement-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 20px color-mix(in srgb, var(--accent-color), transparent 80%);
}

.req-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), #6610f2 30%));
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1rem;
  color: white;
  font-size: 1.2rem;
}

.requirement-card h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
}

.requirement-card small {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  font-size: 0.8rem;
}

/* Horizontal Steps Design */
.steps-horizontal {
  display: flex;
  gap: 1.5rem;
  justify-content: center;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
  position: relative;
}

.steps-horizontal::before {
  content: '';
  position: absolute;
  top: 75px;
  left: 10%;
  right: 10%;
  height: 3px;
  background: linear-gradient(to right, var(--accent-color), color-mix(in srgb, var(--accent-color), transparent 30%));
  z-index: 1;
  border-radius: 2px;
}

.step-card {
  background: var(--surface-color);
  border-radius: 12px;
  padding: 1.5rem;
  text-align: center;
  box-shadow: 0 4px 15px color-mix(in srgb, var(--default-color), transparent 90%);
  transition: all 0.3s ease;
  flex: 1;
  min-width: 200px;
  max-width: 220px;
  border: 1px solid color-mix(in srgb, var(--accent-color), transparent 90%);
  position: relative;
  z-index: 2;
}

.step-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px color-mix(in srgb, var(--accent-color), transparent 80%);
  border-color: color-mix(in srgb, var(--accent-color), transparent 70%);
}

.step-icon {
  width: 50px;
  height: 50px;
  background: linear-gradient(135deg, var(--accent-color), color-mix(in srgb, var(--accent-color), black 15%));
  color: var(--contrast-color);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1.2rem;
  margin: 0 auto 1rem;
  box-shadow: 0 4px 15px color-mix(in srgb, var(--accent-color), transparent 70%);
  transition: all 0.3s ease;
}

.step-card:hover .step-icon {
  transform: scale(1.1);
  box-shadow: 0 6px 20px color-mix(in srgb, var(--accent-color), transparent 50%);
}

.step-card h5 {
  color: var(--heading-color);
  font-weight: 600;
  font-size: 1.1rem;
  margin-bottom: 0.75rem;
  line-height: 1.3;
}

.step-card p {
  color: color-mix(in srgb, var(--default-color), transparent 25%);
  font-size: 0.9rem;
  line-height: 1.5;
  margin: 0;
}

.cta-buttons .btn {
  padding: 12px 30px;
  font-weight: 600;
}

/* PPDB Hero Responsive */
@media (max-width: 768px) {
  .ppdb-hero {
    padding: 60px 0 !important;
  }

  .hero-title {
    font-size: 1.6rem !important;
    line-height: 1.3 !important;
  }

  .hero-subtitle {
    font-size: 1.3rem !important;
  }

  .stats-container {
    gap: 15px !important;
  }

  .stat-item {
    min-width: 120px !important;
    padding: 15px !important;
  }

  .gelombang-section-compact {
    margin-bottom: 2rem;
    padding: 1.5rem;
  }

  .timeline-compact {
    padding-left: 1.5rem;
  }

  .timeline-marker-compact {
    left: -1.5rem;
    width: 1.25rem;
    height: 1.25rem;
    font-size: 0.6rem;
  }

  .timeline-content-compact {
    padding: 0.75rem 1rem;
  }

  .timeline-content-compact h6 {
    font-size: 0.85rem;
  }

  .gelombang-header-compact h4 {
    font-size: 1.1rem;
  }

  .requirements-list .requirement-item {
    padding: 1.5rem;
    margin-bottom: 1.5rem;
  }

  .requirement-content h5 {
    font-size: 1.1rem;
  }

  .requirement-content p {
    font-size: 0.9rem;
  }
}
/* Global styling untuk konsistensi */
body {
  font-family: var(--default-font);
  color: var(--default-color);
}

h1, h2, h3, h4, h5, h6 {
  font-family: var(--heading-font);
  color: var(--heading-color);
}

p {
  color: var(--default-color);
  line-height: 1.6;
}

.text-muted {
  color: color-mix(in srgb, var(--default-color), transparent 40%) !important;
}

.bg-light {
  background-color: var(--background-color) !important;
}

.light-background {
  background-color: var(--background-color);
}

/* Smooth scrolling untuk semua elemen */
* {
  scroll-behavior: smooth;
}

/* Animasi loading untuk elemen yang muncul */
[data-aos] {
  pointer-events: none;
}

[data-aos].aos-animate {
  pointer-events: auto;
}
</style>

@endsection
