@extends('layouts.main')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Formulir Pendaftaran</h1>
          <p class="mb-0">Lengkapi data diri Anda untuk mendaftar sebagai calon siswa SMK Bakti Nusantara 666</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>
        <li class="current">Formulir Pendaftaran</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Registration Form Section -->
<section class="section">
  <div class="container">
    
    <!-- Progress Indicator -->
    <div class="progress-indicator mb-5" data-aos="fade-up">
      <div class="progress-step completed">
        <div class="step-number"><i class="bi bi-check"></i></div>
        <span>Registrasi Akun</span>
      </div>
      <div class="progress-line completed"></div>
      <div class="progress-step active">
        <div class="step-number">2</div>
        <span>Formulir Pendaftaran</span>
      </div>
      <div class="progress-line"></div>
      <div class="progress-step">
        <div class="step-number">3</div>
        <span>Upload Berkas</span>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <!-- Form Container -->
        <div class="form-container" data-aos="fade-up" data-aos-delay="200">
          
          @if ($errors->any())
            <div class="alert alert-danger">
              <h6><i class="bi bi-exclamation-triangle me-2"></i>Terdapat kesalahan:</h6>
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('pendaftaran.form.store') }}" method="POST" enctype="multipart/form-data" class="registration-form">
            @csrf
            
            <!-- Data Pribadi -->
            <div class="form-section">
              <div class="section-header">
                <div class="section-icon">
                  <i class="bi bi-person"></i>
                </div>
                <div class="section-title">
                  <h4>Data Pribadi</h4>
                  <p>Lengkapi informasi identitas diri Anda</p>
                </div>
              </div>
              
              <div class="row gy-3">
                <div class="col-md-6">
                  <label class="form-label">NISN <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nisn" 
                         class="form-control @error('nisn') is-invalid @enderror" 
                         value="{{ old('nisn') }}"
                         placeholder="Nomor Induk Siswa Nasional" 
                         required>
                  @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="tempat_lahir" 
                         class="form-control @error('tempat_lahir') is-invalid @enderror" 
                         value="{{ old('tempat_lahir') }}"
                         placeholder="Kota/Kabupaten tempat lahir" 
                         required>
                  @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                  <input type="date" 
                         name="tanggal_lahir" 
                         class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                         value="{{ old('tanggal_lahir') }}"
                         required>
                  @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                  <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-12">
                  <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                  <textarea name="alamat" 
                            class="form-control @error('alamat') is-invalid @enderror" 
                            rows="3" 
                            placeholder="Jalan, RT/RW, Kelurahan, Kecamatan, Kota/Kabupaten" 
                            required>{{ old('alamat') }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Data Sekolah Asal -->
            <div class="form-section">
              <div class="section-header">
                <div class="section-icon">
                  <i class="bi bi-building"></i>
                </div>
                <div class="section-title">
                  <h4>Data Sekolah Asal</h4>
                  <p>Informasi sekolah asal dan prestasi akademik</p>
                </div>
              </div>
              
              <div class="row gy-3">
                <div class="col-md-12">
                  <label class="form-label">Nama Sekolah Asal <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="asal_sekolah" 
                         class="form-control @error('asal_sekolah') is-invalid @enderror" 
                         value="{{ old('asal_sekolah') }}"
                         placeholder="Nama lengkap sekolah asal (SMP/MTs)" 
                         required>
                  @error('asal_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Alamat Sekolah Asal</label>
                  <input type="text" 
                         name="alamat_sekolah" 
                         class="form-control @error('alamat_sekolah') is-invalid @enderror" 
                         value="{{ old('alamat_sekolah') }}"
                         placeholder="Alamat sekolah asal">
                  @error('alamat_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Tahun Lulus</label>
                  <select name="tahun_lulus" class="form-select @error('tahun_lulus') is-invalid @enderror">
                    <option value="">Pilih Tahun Lulus</option>
                    @for($year = date('Y'); $year >= date('Y')-5; $year--)
                      <option value="{{ $year }}" {{ old('tahun_lulus') == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                  </select>
                  @error('tahun_lulus')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Pilihan Jurusan -->
            <div class="form-section">
              <div class="section-header">
                <div class="section-icon">
                  <i class="bi bi-mortarboard"></i>
                </div>
                <div class="section-title">
                  <h4>Pilihan Jurusan</h4>
                  <p>Pilih program keahlian yang diminati</p>
                </div>
              </div>
              
              <div class="row gy-3">
                <div class="col-md-6">
                  <label class="form-label">Jurusan Pilihan 1 <span class="text-danger">*</span></label>
                  <select name="jurusan_pilihan_1" class="form-select @error('jurusan_pilihan_1') is-invalid @enderror" required>
                    <option value="">Pilih Jurusan Utama</option>
                    <option value="PPLG" {{ old('jurusan_pilihan_1') == 'PPLG' ? 'selected' : '' }}>PPLG (Pengembangan Perangkat Lunak dan Gim)</option>
                    <option value="DKV" {{ old('jurusan_pilihan_1') == 'DKV' ? 'selected' : '' }}>DKV (Desain Komunikasi Visual)</option>
                    <option value="ANM" {{ old('jurusan_pilihan_1') == 'ANM' ? 'selected' : '' }}>ANM (Animasi)</option>
                    <option value="BDP" {{ old('jurusan_pilihan_1') == 'BDP' ? 'selected' : '' }}>BDP (Pemasaran)</option>
                    <option value="AKT" {{ old('jurusan_pilihan_1') == 'AKT' ? 'selected' : '' }}>AKT (Akuntansi)</option>
                  </select>
                  @error('jurusan_pilihan_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Jurusan Pilihan 2 <span class="text-muted">(Opsional)</span></label>
                  <select name="jurusan_pilihan_2" class="form-select @error('jurusan_pilihan_2') is-invalid @enderror">
                    <option value="">Pilih Jurusan Cadangan</option>
                    <option value="PPLG" {{ old('jurusan_pilihan_2') == 'PPLG' ? 'selected' : '' }}>PPLG (Pengembangan Perangkat Lunak dan Gim)</option>
                    <option value="DKV" {{ old('jurusan_pilihan_2') == 'DKV' ? 'selected' : '' }}>DKV (Desain Komunikasi Visual)</option>
                    <option value="ANM" {{ old('jurusan_pilihan_2') == 'ANM' ? 'selected' : '' }}>ANM (Animasi)</option>
                    <option value="BDP" {{ old('jurusan_pilihan_2') == 'BDP' ? 'selected' : '' }}>BDP (Pemasaran)</option>
                    <option value="AKT" {{ old('jurusan_pilihan_2') == 'AKT' ? 'selected' : '' }}>AKT (Akuntansi)</option>
                  </select>
                  @error('jurusan_pilihan_2')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Data Orang Tua/Wali -->
            <div class="form-section">
              <div class="section-header">
                <div class="section-icon">
                  <i class="bi bi-people"></i>
                </div>
                <div class="section-title">
                  <h4>Data Orang Tua/Wali</h4>
                  <p>Informasi orang tua atau wali siswa</p>
                </div>
              </div>
              
              <div class="row gy-3">
                <div class="col-md-6">
                  <label class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nama_ayah" 
                         class="form-control @error('nama_ayah') is-invalid @enderror" 
                         value="{{ old('nama_ayah') }}"
                         placeholder="Nama lengkap ayah" 
                         required>
                  @error('nama_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nama_ibu" 
                         class="form-control @error('nama_ibu') is-invalid @enderror" 
                         value="{{ old('nama_ibu') }}"
                         placeholder="Nama lengkap ibu" 
                         required>
                  @error('nama_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Pekerjaan Ayah</label>
                  <input type="text" 
                         name="pekerjaan_ayah" 
                         class="form-control @error('pekerjaan_ayah') is-invalid @enderror" 
                         value="{{ old('pekerjaan_ayah') }}"
                         placeholder="Pekerjaan ayah">
                  @error('pekerjaan_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Pekerjaan Ibu</label>
                  <input type="text" 
                         name="pekerjaan_ibu" 
                         class="form-control @error('pekerjaan_ibu') is-invalid @enderror" 
                         value="{{ old('pekerjaan_ibu') }}"
                         placeholder="Pekerjaan ibu">
                  @error('pekerjaan_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-12">
                  <label class="form-label">No. HP Orang Tua/Wali <span class="text-danger">*</span></label>
                  <input type="tel" 
                         name="no_hp_ortu" 
                         class="form-control @error('no_hp_ortu') is-invalid @enderror" 
                         value="{{ old('no_hp_ortu') }}"
                         placeholder="08xxxxxxxxxx" 
                         required>
                  @error('no_hp_ortu')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions text-center">
              <div class="row">
                <div class="col-md-6">
                  <a href="{{ route('pendaftaran.index') }}" class="btn btn-outline-secondary btn-lg w-100">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                  </a>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-arrow-right me-2"></i>Lanjut ke Upload Berkas
                  </button>
                </div>
              </div>
            </div>
            
          </form>
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
.progress-indicator {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 2rem;
}

.progress-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  flex: 1;
  max-width: 120px;
}

.progress-step .step-number {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #e9ecef;
  color: #6c757d;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  margin-bottom: 0.5rem;
  transition: all 0.3s ease;
}

.progress-step.active .step-number {
  background: var(--accent-color);
  color: white;
}

.progress-step.completed .step-number {
  background: #28a745;
  color: white;
}

.progress-step span {
  font-size: 0.8rem;
  color: #6c757d !important;
  font-weight: 500;
}

.progress-step.active span {
  color: #6c757d !important;
  font-weight: 600;
}

.progress-step.completed span {
  color: #6c757d !important;
  font-weight: 600;
}

.progress-line {
  height: 2px;
  background: #e9ecef;
  flex: 1;
  margin: 0 1rem;
  margin-top: -20px;
}

.progress-line.completed {
  background: #28a745;
}

.form-container {
  background: white;
  border-radius: 20px;
  padding: 2.5rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border: 1px solid #f0f0f0;
}

.form-section {
  margin-bottom: 3rem;
  padding-bottom: 2rem;
  border-bottom: 1px solid #f0f0f0;
}

.form-section:last-of-type {
  border-bottom: none;
  margin-bottom: 2rem;
}

.section-header {
  display: flex;
  align-items: center;
  margin-bottom: 2rem;
}

.section-icon {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, var(--accent-color) 0%, #0056b3 100%);
  color: white;
  border-radius: 15px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
  margin-right: 1rem;
}

.section-title h4 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.section-title p {
  color: #6c757d;
  margin-bottom: 0;
  font-size: 0.9rem;
}

.registration-form .form-label {
  font-weight: 600;
  color: var(--heading-color);
  margin-bottom: 0.5rem;
}

.registration-form .form-control,
.registration-form .form-select {
  border: 1px solid #e9ecef;
  padding: 0.75rem 1rem;
  border-radius: 8px;
  transition: all 0.3s ease;
}

.registration-form .form-control:focus,
.registration-form .form-select:focus {
  border-color: var(--accent-color);
  box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
}

.form-actions {
  margin-top: 2rem;
  padding-top: 2rem;
  border-top: 1px solid #f0f0f0;
}

.form-actions .btn {
  padding: 0.75rem 2rem;
  border-radius: 50px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
}

.form-actions .btn-primary {
  background: linear-gradient(135deg, var(--accent-color) 0%, #0056b3 100%);
  border: none;
}

.form-actions .btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

@media (max-width: 768px) {
  .progress-indicator {
    flex-direction: column;
    gap: 1rem;
  }
  
  .progress-line {
    display: none;
  }
  
  .form-container {
    padding: 1.5rem;
    margin: 0 1rem;
  }
  
  .progress-step {
    flex-direction: row;
    max-width: none;
    width: 100%;
    justify-content: center;
    gap: 1rem;
  }
  
  .progress-step .step-number {
    margin-bottom: 0;
  }
  
  .section-header {
    flex-direction: column;
    text-align: center;
  }
  
  .section-icon {
    margin-right: 0;
    margin-bottom: 1rem;
  }
  
  .form-actions .btn {
    margin-bottom: 1rem;
  }
}
</style>
@endsection