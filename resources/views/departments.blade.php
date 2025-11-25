@extends('layouts.main')

@section('title', 'Departments - Clinic Bootstrap Template')

@section('body-class', 'departments-page')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Program Keahlian</h1>
          <p class="mb-0">
            Informasi mengenai berbagai program keahlian yang disediakan SMK Bakti Nusantara 666 untuk mempersiapkan siswa menjadi tenaga kerja yang kompeten dan berdaya saing.
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Departments</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Departments Tabs Section -->
<section id="departments-tabs" class="departments-tabs section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="medical-specialties">
      <div class="row">
        <div class="col-12">
          <div class="specialty-navigation">
            <div class="nav nav-pills d-flex" id="specialty-tabs" role="tablist" data-aos="fade-up" data-aos-delay="400">
              <a class="nav-link department-tab active" id="pplg-tab" data-bs-toggle="pill" href="#departments-tabs-pplg" role="tab" aria-controls="departments-tabs-pplg" aria-selected="true" data-aos="fade-up" data-aos-delay="100">💻 PPLG</a>
              <a class="nav-link department-tab" id="dkv-tab" data-bs-toggle="pill" href="#departments-tabs-dkv" role="tab" aria-controls="departments-tabs-dkv" aria-selected="false" data-aos="fade-up" data-aos-delay="150">🎨 DKV</a>
              <a class="nav-link department-tab" id="animasi-tab" data-bs-toggle="pill" href="#departments-tabs-animasi" role="tab" aria-controls="departments-tabs-animasi" aria-selected="false" data-aos="fade-up" data-aos-delay="200">🎬 Animasi</a>
              <a class="nav-link department-tab" id="bdp-tab" data-bs-toggle="pill" href="#departments-tabs-bdp" role="tab" aria-controls="departments-tabs-bdp" aria-selected="false" data-aos="fade-up" data-aos-delay="250">🏪 BDP</a>
              <a class="nav-link department-tab" id="akt-tab" data-bs-toggle="pill" href="#departments-tabs-akt" role="tab" aria-controls="departments-tabs-akt" aria-selected="false" data-aos="fade-up" data-aos-delay="300">🧾 AKT</a>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="tab-content department-content" id="specialty-content" data-aos="fade-up" data-aos-delay="500">

            <div class="tab-pane fade show active" id="departments-tabs-pplg" role="tabpanel" aria-labelledby="pplg-tab">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="assets/img/health/neurology-3.webp" alt="PPLG Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title">💻 PPLG – Pengembangan Perangkat Lunak dan Gim</h2>
                    <p class="department-description">Jurusan PPLG membekali siswa dengan kemampuan membuat aplikasi, website, dan gim yang fungsional dan kreatif. Melalui pembelajaran berbasis proyek, siswa dilatih berpikir logis dan inovatif dalam teknologi digital.</p>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-brain"></i>
                          </div>
                          <div class="service-content">
                            <h4>🧠 Pemrograman Dasar</h4>
                            <p>Belajar logika, algoritma, dan bahasa pemrograman untuk membangun aplikasi dari awal.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-globe"></i>
                          </div>
                          <div class="service-content">
                            <h4>🌐 Pengembangan Web & Mobile</h4>
                            <p>Membuat website dan aplikasi mobile berbasis Android atau iOS.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-gamepad"></i>
                          </div>
                          <div class="service-content">
                            <h4>🎮 Desain & Pengembangan Gim</h4>
                            <p>Mengembangkan gim edukatif dan hiburan menggunakan engine profesional.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-briefcase"></i>
                          </div>
                          <div class="service-content">
                            <h4>🧑💼 Karier & Industri IT</h4>
                            <p>Menyiapkan lulusan siap kerja di bidang IT sebagai programmer atau developer.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End PPLG Tab -->

            <div class="tab-pane fade" id="departments-tabs-dkv" role="tabpanel" aria-labelledby="dkv-tab">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="assets/img/health/surgery-2.webp" alt="DKV Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title">🎨 DKV – Desain Komunikasi Visual</h2>
                    <p class="department-description">Jurusan DKV menumbuhkan kreativitas dalam menyampaikan pesan melalui media visual yang menarik dan bermakna.</p>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                          </div>
                          <div class="service-content">
                            <h4>🖌️ Desain Grafis Digital</h4>
                            <p>Mempelajari software desain profesional seperti Adobe Photoshop dan Illustrator.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-camera"></i>
                          </div>
                          <div class="service-content">
                            <h4>📷 Fotografi & Videografi</h4>
                            <p>Menghasilkan karya visual melalui foto dan video yang komunikatif.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-puzzle-piece"></i>
                          </div>
                          <div class="service-content">
                            <h4>🧩 Branding & Visual Identity</h4>
                            <p>Membuat logo dan identitas visual untuk produk atau perusahaan.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-film"></i>
                          </div>
                          <div class="service-content">
                            <h4>🎬 Produksi Media Kreatif</h4>
                            <p>Merancang konten digital untuk promosi, sosial media, dan media cetak.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End DKV Tab -->

            <div class="tab-pane fade" id="departments-tabs-animasi" role="tabpanel" aria-labelledby="animasi-tab">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="assets/img/health/dermatology-1.webp" alt="Animasi Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title">🎬 ANIMASI</h2>
                    <p class="department-description">Jurusan Animasi mengajarkan pembuatan animasi 2D dan 3D, mulai dari konsep karakter hingga produksi akhir. Siswa dibimbing untuk menciptakan karya yang orisinal, imajinatif, dan profesional.</p>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-user"></i>
                          </div>
                          <div class="service-content">
                            <h4>🧍♂️ Desain Karakter</h4>
                            <p>Mengembangkan karakter dan dunia visual yang hidup.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-scroll"></i>
                          </div>
                          <div class="service-content">
                            <h4>📜 Storyboard & Skenario</h4>
                            <p>Menyusun alur cerita dan rancangan visual animasi.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-desktop"></i>
                          </div>
                          <div class="service-content">
                            <h4>🖥️ Animasi 2D & 3D</h4>
                            <p>Menggunakan software seperti Blender dan Toon Boom untuk membuat animasi profesional.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-video"></i>
                          </div>
                          <div class="service-content">
                            <h4>🎥 Produksi & Editing Film Animasi</h4>
                            <p>Menggabungkan audio, visual, dan efek untuk hasil karya berkualitas.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Animasi Tab -->

            <div class="tab-pane fade" id="departments-tabs-bdp" role="tabpanel" aria-labelledby="bdp-tab">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="assets/img/health/pediatrics-4.webp" alt="BDP Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title">🏪 BDP – Bisnis Daring dan Pemasaran</h2>
                    <p class="department-description">Jurusan BDP berfokus pada strategi pemasaran modern dan kewirausahaan berbasis digital.</p>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-shopping-cart"></i>
                          </div>
                          <div class="service-content">
                            <h4>🛒 E-Commerce & Marketplace</h4>
                            <p>Mempelajari cara membuka dan mengelola toko online.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                          </div>
                          <div class="service-content">
                            <h4>📈 Strategi Pemasaran Digital</h4>
                            <p>Menyusun promosi produk lewat media sosial dan platform digital.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-comments"></i>
                          </div>
                          <div class="service-content">
                            <h4>💬 Komunikasi Bisnis</h4>
                            <p>Mengasah keterampilan bernegosiasi dan melayani pelanggan.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-briefcase"></i>
                          </div>
                          <div class="service-content">
                            <h4>💼 Kewirausahaan</h4>
                            <p>Melatih siswa membangun dan mengelola usaha mandiri.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End BDP Tab -->

            <div class="tab-pane fade" id="departments-tabs-akt" role="tabpanel" aria-labelledby="akt-tab">
              <div class="row department-layout">
                <div class="col-lg-4 order-lg-2">
                  <div class="department-image">
                    <img src="assets/img/health/cardiology-3.webp" alt="Akuntansi Department" class="img-fluid">
                  </div>
                </div>
                <div class="col-lg-8 order-lg-1">
                  <div class="department-info">
                    <h2 class="department-title">🧾 AKT – Akuntansi</h2>
                    <p class="department-description">Jurusan Akuntansi melatih siswa dalam mengelola keuangan, menyusun laporan, dan menggunakan software akuntansi modern.</p>

                    <div class="row mt-4">
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-chart-bar"></i>
                          </div>
                          <div class="service-content">
                            <h4>📊 Pencatatan Transaksi Keuangan</h4>
                            <p>Belajar membuat jurnal dan laporan keuangan akurat.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-laptop"></i>
                          </div>
                          <div class="service-content">
                            <h4>💻 Software Akuntansi</h4>
                            <p>Menggunakan aplikasi seperti MYOB dan Accurate.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-book"></i>
                          </div>
                          <div class="service-content">
                            <h4>📚 Administrasi Perkantoran</h4>
                            <p>Meningkatkan keterampilan tata kelola dokumen dan arsip.</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="service-item">
                          <div class="service-icon">
                            <i class="fas fa-university"></i>
                          </div>
                          <div class="service-content">
                            <h4>🏦 Simulasi Dunia Kerja</h4>
                            <p>Mempersiapkan siswa menghadapi dunia kerja profesional di bidang keuangan.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End AKT Tab -->

          </div>
        </div>
      </div>
    </div>

  </div>

</section><!-- /Departments Tabs Section -->
@endsection