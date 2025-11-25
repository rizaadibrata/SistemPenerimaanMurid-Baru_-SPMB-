@extends('layouts.main')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endpush

@section('title', 'Program Keahlian - SMK Bakti Nusantara 666')

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
        <li class="current">Jurusan</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Departments Tabs Section -->
<section id="departments-tabs" class="departments-tabs section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row">
      <div class="col-lg-12 text-center mb-4">
        <div style="display: inline-block; background: rgba(0,123,255,0.1); padding: 6px 18px; border-radius: 50px; margin-bottom: 10px;">
          <span style="color: #007bff; font-weight: 600; font-size: 0.8rem; letter-spacing: 0.5px;"><i class="bi bi-mortarboard" style="margin-right: 5px;"></i>PROGRAM KEAHLIAN</span>
        </div>
        <h3 style="font-size: 2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 10px;">Pilih Jurusan Anda</h3>
        <p style="font-size: 1rem; color: #666; max-width: 600px; margin: 0 auto;">Temukan program keahlian yang sesuai dengan minat dan bakat Anda</p>
      </div>
    </div>

    <div class="medical-specialties">
      <div class="row">
        <div class="col-12">
          <div class="specialty-navigation">
            <div class="nav nav-pills d-flex justify-content-center" id="specialty-tabs" role="tablist">
              <a class="nav-link department-tab active" id="pplg-tab" data-bs-toggle="pill" href="#departments-tabs-pplg" role="tab">
                <i class="bi bi-laptop"></i> PPLG
              </a>
              <a class="nav-link department-tab" id="dkv-tab" data-bs-toggle="pill" href="#departments-tabs-dkv" role="tab">
                <i class="bi bi-palette"></i> DKV
              </a>
              <a class="nav-link department-tab" id="animasi-tab" data-bs-toggle="pill" href="#departments-tabs-animasi" role="tab">
                <i class="bi bi-film"></i> Animasi
              </a>
              <a class="nav-link department-tab" id="bdp-tab" data-bs-toggle="pill" href="#departments-tabs-bdp" role="tab">
                <i class="bi bi-cart"></i> BDP
              </a>
              <a class="nav-link department-tab" id="akt-tab" data-bs-toggle="pill" href="#departments-tabs-akt" role="tab">
                <i class="bi bi-calculator"></i> AKT
              </a>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="tab-content department-content" id="specialty-content" data-aos="fade-up" data-aos-delay="500">

            <div class="tab-pane fade show active" id="departments-tabs-pplg" role="tabpanel" aria-labelledby="pplg-tab">
              <div class="department-card">
                <div class="row align-items-center mb-3">
                  <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="department-image" style="margin-top: -20px;">
                      <img src="assets/img/health/pplg.png" alt="PPLG Department" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" style="padding-left: 0;">
                    <div class="department-header" style="text-align: left !important; margin-left: -80px;">
                      <h2 class="department-title" style="font-size: 1.5rem !important; font-weight: 800 !important; color: #1a1a1a !important; text-align: left !important;">PPLG – Pengembangan Perangkat Lunak dan Gim</h2>
                      <p class="department-description" style="font-size: 0.9rem !important; line-height: 1.7 !important; color: #333 !important; text-align: left !important;">Jurusan PPLG membekali siswa dengan kemampuan membuat aplikasi, website, dan gim. Siswa dilatih berpikir logis dan inovatif untuk memecahkan masalah dengan teknologi digital.</p>
                    </div>
                  </div>
                </div>
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-code-slash"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Pemrograman Dasar</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Belajar logika, algoritma, dan bahasa pemrograman untuk membangun aplikasi dari awal.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-phone"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Pengembangan Web & Mobile</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Membuat website dan aplikasi mobile berbasis Android atau iOS.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-controller"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Desain & Pengembangan Gim</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mengembangkan gim edukatif dan hiburan menggunakan engine profesional.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-briefcase"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Karier & Industri IT</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menyiapkan lulusan siap kerja di bidang IT sebagai programmer atau developer.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End PPLG Tab -->

            <div class="tab-pane fade" id="departments-tabs-dkv" role="tabpanel" aria-labelledby="dkv-tab">
              <div class="department-card">
                <div class="row align-items-center mb-3">
                  <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="department-image" style="margin-top: -20px;">
                      <img src="assets/img/health/dkv.png" alt="DKV Department" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" style="padding-left: 0;">
                    <div class="department-header" style="text-align: left !important; margin-left: -80px;">
                      <h2 class="department-title" style="font-size: 1.5rem !important; font-weight: 800 !important; color: #1a1a1a !important; text-align: left !important;">DKV – Desain Komunikasi Visual</h2>
                      <p class="department-description" style="font-size: 0.9rem !important; line-height: 1.7 !important; color: #333 !important; text-align: left !important;">Jurusan DKV mengembangkan kreativitas dalam menyampaikan pesan melalui media visual yang menarik dan bermakna.</p>
                    </div>
                  </div>
                </div>
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-brush"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Desain Grafis Digital</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mempelajari software desain profesional seperti Adobe Photoshop dan Illustrator.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-camera"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Fotografi & Videografi</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menghasilkan karya visual melalui foto dan video yang komunikatif.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-puzzle"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Branding & Visual Identity</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Membuat logo dan identitas visual untuk produk atau perusahaan.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-megaphone"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Produksi Media Kreatif</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Merancang konten digital untuk promosi, sosial media, dan media cetak.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End DKV Tab -->

            <div class="tab-pane fade" id="departments-tabs-animasi" role="tabpanel" aria-labelledby="animasi-tab">
              <div class="department-card">
                <div class="row align-items-center mb-3">
                  <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="department-image" style="margin-top: -20px;">
                      <img src="assets/img/health/anm.png" alt="Animasi Department" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" style="padding-left: 0;">
                    <div class="department-header" style="text-align: left !important; margin-left: -80px;">
                      <h2 class="department-title" style="font-size: 1.5rem !important; font-weight: 800 !important; color: #1a1a1a !important; text-align: left !important;">ANIMASI</h2>
                      <p class="department-description" style="font-size: 0.9rem !important; line-height: 1.7 !important; color: #333 !important; text-align: left !important;">Jurusan Animasi mengajarkan pembuatan animasi 2D dan 3D, dari konsep karakter hingga produksi akhir dengan karya yang orisinal dan profesional.</p>
                    </div>
                  </div>
                </div>
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-person"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Desain Karakter</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mengembangkan karakter dan dunia visual yang hidup.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-journal-text"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Storyboard & Skenario</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menyusun alur cerita dan rancangan visual animasi.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-display"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Animasi 2D & 3D</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menggunakan software seperti Blender dan Toon Boom untuk membuat animasi profesional.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-camera-video"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Produksi & Editing Film Animasi</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menggabungkan audio, visual, dan efek untuk hasil karya berkualitas.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Animasi Tab -->

            <div class="tab-pane fade" id="departments-tabs-bdp" role="tabpanel" aria-labelledby="bdp-tab">
              <div class="department-card">
                <div class="row align-items-center mb-3">
                  <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="department-image" style="margin-top: -20px;">
                      <img src="assets/img/health/bdp.png" alt="BDP Department" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" style="padding-left: 0;">
                    <div class="department-header" style="text-align: left !important; margin-left: -80px;">
                      <h2 class="department-title" style="font-size: 1.5rem !important; font-weight: 800 !important; color: #1a1a1a !important; text-align: left !important;">BDP – Bisnis Daring dan Pemasaran</h2>
                      <p class="department-description" style="font-size: 0.9rem !important; line-height: 1.7 !important; color: #333 !important; text-align: left !important;">Jurusan BDP mengembangkan kemampuan pemasaran digital dan kewirausahaan modern untuk era digital.</p>
                    </div>
                  </div>
                </div>
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-shop"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">E-Commerce & Marketplace</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mempelajari cara membuka dan mengelola toko online.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-graph-up"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Strategi Pemasaran Digital</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menyusun promosi produk lewat media sosial dan platform digital.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-chat-dots"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Komunikasi Bisnis</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mengasah keterampilan bernegosiasi dan melayani pelanggan.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-lightbulb"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Kewirausahaan</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Melatih siswa membangun dan mengelola usaha mandiri.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End BDP Tab -->

            <div class="tab-pane fade" id="departments-tabs-akt" role="tabpanel" aria-labelledby="akt-tab">
              <div class="department-card">
                <div class="row align-items-center mb-3">
                  <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="department-image" style="margin-top: -20px;">
                      <img src="assets/img/health/akt.png " alt="Akuntansi Department" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" style="padding-left: 0;">
                    <div class="department-header" style="text-align: left !important; margin-left: -80px;">
                      <h2 class="department-title" style="font-size: 1.5rem !important; font-weight: 800 !important; color: #1a1a1a !important; text-align: left !important;">AKT – Akuntansi</h2>
                      <p class="department-description" style="font-size: 0.9rem !important; line-height: 1.7 !important; color: #333 !important; text-align: left !important;">Jurusan Akuntansi melatih siswa mengelola keuangan, menyusun laporan, dan menggunakan software akuntansi profesional.</p>
                    </div>
                  </div>
                </div>
                <div class="row mt-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-bar-chart"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Pencatatan Transaksi Keuangan</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Belajar membuat jurnal dan laporan keuangan akurat.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-laptop"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Software Akuntansi</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Menggunakan aplikasi seperti MYOB dan Accurate.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-folder"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Administrasi Perkantoran</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Meningkatkan keterampilan tata kelola dokumen dan arsip.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="curriculum-item" style="padding: 8px 12px; margin-bottom: 8px; background: #f8f9fa; border-radius: 8px; height: 50px; display: flex; align-items: center;">
                      <div class="curriculum-icon" style="font-size: 1.1rem; margin-right: 10px; color: #007bff;"><i class="bi bi-building"></i></div>
                      <div>
                        <strong style="font-size: 0.85rem; line-height: 1.1; display: block;">Simulasi Dunia Kerja</strong>
                        <p style="font-size: 0.7rem; margin-bottom: 0; line-height: 1.2; color: #666;">Mempersiapkan siswa menghadapi dunia kerja profesional di bidang keuangan.</p>
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

<style>
.department-image {
  border-radius: 18px;
  overflow: hidden;
  margin: 20px auto 0;
  height: 120px;
  max-width: 200px;
  text-align: center;
}

.department-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.department-header {
  padding-left: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  height: 120px;
}

.department-title {
  font-size: 1.1rem !important;
  font-weight: 700;
  margin-bottom: 8px;
}

.department-description {
  font-size: 0.9rem !important;
  line-height: 1.4;
  margin-bottom: 0;
}

.curriculum-item {
  display: flex;
  align-items: flex-start;
  gap: 15px;
  padding: 15px;
  background: rgba(13,110,253,0.05);
  border-radius: 10px;
  margin-bottom: 15px;
  height: 120px;
}

.curriculum-icon {
  width: 40px;
  height: 40px;
  background: #0d6efd;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.curriculum-icon i {
  color: white;
  font-size: 1.2rem;
}

.curriculum-item strong {
  display: block;
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 5px;
}

.curriculum-item p {
  font-size: 0.9rem;
  line-height: 1.4;
  margin: 0;
  color: #666;
}
</style>
