@extends('layouts.main')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endpush

@section('title', 'About - Clinic Bootstrap Template')

@section('body-class', 'about-page')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">About</h1>
          <p class="mb-0">
          informasi mengenai profil, visi misi, fasilitas, program keahlian, serta keunggulan SMK Bakti Nusantara 666 sebagai sekolah kejuruan berbasis teknologi dan karakter.
          </p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">About</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row align-items-center" style="border-radius: 20px; padding: 80px; background: white; box-shadow: 0 10px 40px rgba(0,0,0,0.08);">
      <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
        <div class="about-content">
          <div style="display: inline-block; background: rgba(13,110,253,0.1); padding: 6px 18px; border-radius: 50px; margin-bottom: 15px;">
            <span style="color: #0d6efd; font-weight: 600; font-size: 0.8rem; letter-spacing: 0.5px;"><i class="bi bi-info-circle" style="margin-right: 5px;"></i>TENTANG KAMI</span>
          </div>
          <h2 style="font-size: 2rem; font-weight: 700; color: #1a1a1a; line-height: 1.2; margin-bottom: 15px;">SMK Bakti Nusantara 666</h2>
          <p class="lead" style="font-size: 0.95rem; color: #333; line-height: 1.6; margin-bottom: 15px; font-weight: 500;">SMK Bakti Nusantara 666 merupakan lembaga pendidikan kejuruan yang berkomitmen untuk mencetak generasi muda yang unggul, berkarakter, dan siap bersaing di dunia kerja maupun perguruan tinggi.</p>

          <p style="color: #555; line-height: 1.6; margin-bottom: 12px; font-size: 0.9rem;">Berdiri dengan semangat pendidikan berbasis teknologi dan keterampilan, sekolah ini terus berkembang menjadi pusat pembelajaran modern yang berorientasi pada inovasi dan profesionalisme.</p>
          
          <p style="color: #555; line-height: 1.6; margin-bottom: 18px; font-size: 0.9rem;">Didukung oleh tenaga pendidik yang kompeten serta fasilitas yang lengkap, SMK Bakti Nusantara 666 berupaya memberikan pengalaman belajar terbaik bagi setiap siswa.</p>

          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
            <div style="background: white; padding: 12px 8px; border-radius: 10px; text-align: center; box-shadow: 0 3px 15px rgba(0,123,255,0.1); border: 2px solid rgba(0,123,255,0.1);">
              <div style="font-size: 1.5rem; font-weight: 700; color: #007bff; margin-bottom: 3px;">700+</div>
              <div style="font-size: 0.7rem; color: #666; font-weight: 500;">Siswa & Alumni</div>
            </div>
            <div style="background: white; padding: 12px 8px; border-radius: 10px; text-align: center; box-shadow: 0 3px 15px rgba(40,167,69,0.1); border: 2px solid rgba(40,167,69,0.1);">
              <div style="font-size: 1.5rem; font-weight: 700; color: #28a745; margin-bottom: 3px;">16+</div>
              <div style="font-size: 0.7rem; color: #666; font-weight: 500;">Tahun Dedikasi</div>
            </div>
            <div style="background: white; padding: 12px 8px; border-radius: 10px; text-align: center; box-shadow: 0 3px 15px rgba(255,193,7,0.1); border: 2px solid rgba(255,193,7,0.1);">
              <div style="font-size: 1.5rem; font-weight: 700; color: #ffc107; margin-bottom: 3px;">50+</div>
              <div style="font-size: 0.7rem; color: #666; font-weight: 500;">Prestasi</div>
            </div>
          </div>
        </div><!-- End About Content -->
      </div>

      <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
        <div class="image-wrapper" style="height: 420px; overflow: hidden; border-radius: 15px;">
          <img src="assets/img/health/pk.jpg" class="img-fluid main-image" alt="Healthcare facility" style="width: 100%; height: 100%; object-fit: cover;">
        </div><!-- End Image Wrapper -->
      </div>
    </div>

    <div class="values-section" data-aos="fade-up" data-aos-delay="300">
      <div class="row">
        <div class="col-lg-12 text-center mb-5">
          <h3 style="font-size: 2.5rem; font-weight: 700; color: #1a1a1a; margin-bottom: 15px;">Visi & Misi</h3>
          <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 0 auto;">Landasan dan arah pengembangan SMK Bakti Nusantara 666</p>
        </div>
      </div>

      <div class="row g-5">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
          <div class="vision-card">
            <div class="card-icon-wrapper">
              <i class="bi bi-eye"></i>
            </div>
            <h4>Visi</h4>
            <p class="vision-intro">Menjadi lembaga pendidikan dan pelatihan unggulan yang mampu mencetak generasi berkarakter, berwawasan global, serta siap menghadapi perkembangan dunia industri dan teknologi.</p>
            <p class="vision-subtitle">Lulusan SMK Bakti Nusantara 666 diharapkan menjadi pribadi yang:</p>
            <div class="vision-highlights">
              <div class="highlight-item highlight-spiritual">
                <div class="highlight-icon icon-spiritual"><i class="bi bi-star-fill"></i></div>
                <div>
                  <strong>Mantap dalam Iman dan Takwa</strong>
                  <p>Berpegang pada nilai spiritual dan moral yang kuat</p>
                </div>
              </div>
              <div class="highlight-item highlight-tech">
                <div class="highlight-icon icon-tech"><i class="bi bi-lightbulb-fill"></i></div>
                <div>
                  <strong>Unggul dalam IPTEK</strong>
                  <p>Menguasai ilmu pengetahuan dan teknologi sesuai tuntutan zaman</p>
                </div>
              </div>
              <div class="highlight-item highlight-achievement">
                <div class="highlight-icon icon-achievement"><i class="bi bi-trophy-fill"></i></div>
                <div>
                  <strong>Berprestasi dan Berakhlak Mulia</strong>
                  <p>Mampu menunjukkan keunggulan dalam karya dan sikap</p>
                </div>
              </div>
              <div class="highlight-item highlight-global">
                <div class="highlight-icon icon-global"><i class="bi bi-globe"></i></div>
                <div>
                  <strong>Siap Bersaing Secara Global</strong>
                  <p>Memiliki semangat kompetitif di tingkat nasional maupun internasional</p>
                </div>
              </div>
              <div class="highlight-item highlight-social">
                <div class="highlight-icon icon-social"><i class="bi bi-people-fill"></i></div>
                <div>
                  <strong>Profesional dan Bertanggung Jawab Sosial</strong>
                  <p>Berperan aktif dalam masyarakat dengan integritas tinggi</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <div class="mission-card">
            <div class="card-icon-wrapper">
              <i class="bi bi-bullseye"></i>
            </div>
            <h4>Misi</h4>
            <p class="mission-intro">SMK Bakti Nusantara 666 berkomitmen untuk melahirkan lulusan yang unggul dalam karakter, kemampuan, dan profesionalisme melalui pembelajaran yang inovatif, disiplin, dan berorientasi pada dunia industri.</p>
            <p class="mission-intro" style="margin-top: 10px !important;">Komitmen tersebut diwujudkan dalam misi berikut:</p>
            <div class="mission-highlights">
              <div class="mission-item mission-spiritual">
                <div class="mission-icon icon-spiritual"><i class="bi bi-flower1"></i></div>
                <div>
                  <strong>Menumbuhkan ketakwaan dan kepedulian lingkungan</strong>
                  <p>Agar siswa menjadi pribadi yang beriman, berakhlak, dan selaras dengan kehidupan sekitar</p>
                </div>
              </div>
              <div class="mission-item mission-competence">
                <div class="mission-icon icon-competence"><i class="bi bi-briefcase-fill"></i></div>
                <div>
                  <strong>Meningkatkan kompetensi dan daya saing lulusan</strong>
                  <p>Sehingga mampu beradaptasi di pasar kerja nasional maupun internasional</p>
                </div>
              </div>
              <div class="mission-item mission-innovation">
                <div class="mission-icon icon-innovation"><i class="bi bi-lightbulb-fill"></i></div>
                <div>
                  <strong>Mengembangkan kemampuan dalam ilmu pengetahuan dan teknologi</strong>
                  <p>Sebagai bekal untuk terus belajar dan berinovasi di masa depan</p>
                </div>
              </div>
              <div class="mission-item mission-education">
                <div class="mission-icon icon-education"><i class="bi bi-compass-fill"></i></div>
                <div>
                  <strong>Menyelenggarakan pendidikan dan pelatihan berbasis teknologi</strong>
                  <p>Yang bermanfaat bagi masyarakat serta mendukung kemajuan dunia industri</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Values Row -->
    </div><!-- End Values Section -->

    <div class="certifications-section" data-aos="fade-up" data-aos-delay="400">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h3>Mitra Industri</h3>
          <p class="section-description">Kerjasama dengan berbagai perusahaan dan institusi untuk pengembangan kompetensi siswa</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="certification-item">
            <img src="assets/industri/ALF SOLUTION.png" class="img-fluid" alt="ALF Solution">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="150">
          <div class="certification-item">
            <img src="assets/industri/BASIC.png" class="img-fluid" alt="Basic">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="200">
          <div class="certification-item">
            <img src="assets/industri/CHARISMA.png" class="img-fluid" alt="Charisma">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="250">
          <div class="certification-item">
            <img src="assets/industri/CYBER LAB.png" class="img-fluid" alt="Cyber Lab">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="300">
          <div class="certification-item">
            <img src="assets/industri/DIAN GLOBAL.png" class="img-fluid" alt="Dian Global">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="350">
          <div class="certification-item">
            <img src="assets/industri/GEKA SUBLIM.png" class="img-fluid" alt="Geka Sublim">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="400">
          <div class="certification-item">
            <img src="assets/industri/GITS ID.png" class="img-fluid" alt="Gits ID">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="450">
          <div class="certification-item">
            <img src="assets/industri/INOVINDO.png" class="img-fluid" alt="Inovindo">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="500">
          <div class="certification-item">
            <img src="assets/industri/LPKIA.png" class="img-fluid" alt="LPKIA">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="550">
          <div class="certification-item">
            <img src="assets/industri/NETKROM.png" class="img-fluid" alt="Netkrom">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="600">
          <div class="certification-item">
            <img src="assets/industri/NUSAEDU.png" class="img-fluid" alt="Nusaedu">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="650">
          <div class="certification-item">
            <img src="assets/industri/PXUAL.png" class="img-fluid" alt="Pxual">
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-4 col-6" data-aos="zoom-in" data-aos-delay="700">
          <div class="certification-item">
            <img src="assets/industri/YOGYA.png" class="img-fluid" alt="Yogya">
          </div>
        </div>
      </div><!-- End Certifications Row -->
    </div><!-- End Certifications Section -->

  </div>

</section><!-- /About Section -->
@endsection

<style>
* {
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
}

.values-section {
  padding: 4rem 5rem;
  background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
  border-radius: 20px;
  margin-top: 3rem;
}

.values-section h3 {
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  letter-spacing: -0.5px;
}

.values-section p {
  font-family: 'Inter', sans-serif;
  font-weight: 400;
}

.vision-card, .mission-card {
  background: white;
  border-radius: 20px;
  padding: 80px;
  height: 100%;
  box-shadow: 0 10px 40px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.vision-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #007bff, #0056b3);
}

.mission-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 5px;
  background: linear-gradient(90deg, #28a745, #1e7e34);
}

.vision-card:hover, .mission-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 60px rgba(0,0,0,0.15);
}

.card-icon-wrapper {
  width: 70px;
  height: 70px;
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
  transition: all 0.3s ease;
}

.vision-card .card-icon-wrapper {
  background: linear-gradient(135deg, rgba(0,123,255,0.1), rgba(0,86,179,0.1));
}

.mission-card .card-icon-wrapper {
  background: linear-gradient(135deg, rgba(40,167,69,0.1), rgba(30,126,52,0.1));
}

.card-icon-wrapper i {
  font-size: 2rem;
}

.vision-card .card-icon-wrapper i {
  color: #007bff;
}

.mission-card .card-icon-wrapper i {
  color: #28a745;
}

.vision-card:hover .card-icon-wrapper,
.mission-card:hover .card-icon-wrapper {
  transform: scale(1.1) rotate(5deg);
}

.vision-card h4, .mission-card h4 {
  font-family: 'Poppins', sans-serif;
  font-size: 1.75rem;
  font-weight: 600;
  color: #1a1a1a;
  margin-bottom: 20px;
  letter-spacing: -0.3px;
}

.vision-card p {
  font-family: 'Inter', sans-serif;
  font-size: 0.95rem;
  font-weight: 400;
  line-height: 1.8;
  color: #555;
  margin: 0;
}

.vision-intro {
  margin-bottom: 15px !important;
  font-weight: 400;
  color: #555;
  line-height: 1.7;
}

.vision-subtitle {
  margin-top: 15px !important;
  margin-bottom: 20px !important;
  font-weight: 500;
  color: #333;
  font-size: 0.95rem;
}

.vision-highlights {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.highlight-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 12px 16px;
  background: linear-gradient(135deg, rgba(0,123,255,0.05), rgba(0,86,179,0.05));
  border-radius: 10px;
  border-left: 3px solid #007bff;
  transition: all 0.3s ease;
}

.highlight-item:hover {
  background: linear-gradient(135deg, rgba(0,123,255,0.1), rgba(0,86,179,0.1));
  transform: translateX(5px);
}

.highlight-icon {
  width: 32px;
  height: 32px;
  background: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 2px 8px rgba(0,123,255,0.2);
}

.highlight-icon i {
  color: #007bff;
  font-size: 0.9rem;
}

.highlight-item div:last-child {
  flex: 1;
}

.highlight-item strong {
  display: block;
  font-size: 0.95rem;
  color: #1a1a1a;
  font-weight: 600;
  margin-bottom: 4px;
}

.highlight-item p {
  font-size: 0.85rem;
  color: #666;
  line-height: 1.5;
  margin: 0;
}

.mission-intro {
  margin-bottom: 20px !important;
  font-weight: 400;
  color: #555;
  line-height: 1.7;
  font-size: 0.95rem;
}

.mission-highlights {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.mission-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  padding: 12px 16px;
  background: linear-gradient(135deg, rgba(40,167,69,0.05), rgba(30,126,52,0.05));
  border-radius: 10px;
  border-left: 3px solid #28a745;
  transition: all 0.3s ease;
}

.mission-item:hover {
  background: linear-gradient(135deg, rgba(40,167,69,0.1), rgba(30,126,52,0.1));
  transform: translateX(5px);
}

.mission-icon {
  width: 32px;
  height: 32px;
  background: white;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: 0 2px 8px rgba(40,167,69,0.2);
}

.mission-icon i {
  color: #28a745;
  font-size: 0.9rem;
}

.mission-item div:last-child {
  flex: 1;
}

.mission-item strong {
  display: block;
  font-size: 0.95rem;
  color: #1a1a1a;
  font-weight: 600;
  margin-bottom: 4px;
}

.mission-item p {
  font-size: 0.85rem;
  color: #666;
  line-height: 1.5;
  margin: 0;
}

@media (max-width: 768px) {
  .values-section {
    padding: 2rem 1rem;
  }
  
  .vision-card, .mission-card {
    padding: 40px 30px;
  }
  
  .values-section {
    padding: 3.5rem 2rem;
  }
  
  .vision-card h4, .mission-card h4 {
    font-size: 1.4rem;
  }
  
  .card-icon-wrapper {
    width: 60px;
    height: 60px;
  }
  
  .card-icon-wrapper i {
    font-size: 1.5rem;
  }
  
  .vision-card p, .mission-list li {
    font-size: 0.9rem;
  }
  
  .highlight-item, .mission-item {
    padding: 10px 12px;
    gap: 10px;
  }
  
  .highlight-item strong, .mission-item strong {
    font-size: 0.9rem;
  }
  
  .highlight-item p, .mission-item p {
    font-size: 0.8rem;
  }
  
  .highlight-icon, .mission-icon {
    width: 28px;
    height: 28px;
  }
  
  .highlight-icon i, .mission-icon i {
    font-size: 0.85rem;
  }
}
</style>
