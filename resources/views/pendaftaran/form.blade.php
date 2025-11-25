@extends('layouts.main')

@section('content')
@php $hideNavbar = true; @endphp
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

          <form action="{{ route('pendaftaran.form.store') }}" method="POST" class="registration-form">
            @csrf
            
            <!-- Data Pribadi -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-person-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Data Pribadi</h4>
                  <p class="mb-0 text-muted small">Lengkapi informasi identitas diri Anda</p>
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-12">
                  <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nama_lengkap" 
                         class="form-control @error('nama_lengkap') is-invalid @enderror" 
                         value="{{ old('nama_lengkap') }}"
                         placeholder="Nama lengkap sesuai ijazah" 
                         required>
                  @error('nama_lengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
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
                  <label class="form-label">NIK <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nik" 
                         class="form-control @error('nik') is-invalid @enderror" 
                         value="{{ old('nik') }}"
                         placeholder="Nomor Induk Kependudukan" 
                         required>
                  @error('nik')
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
                
                <div class="col-md-6">
                  <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="tmp_lahir" 
                         class="form-control @error('tmp_lahir') is-invalid @enderror" 
                         value="{{ old('tmp_lahir') }}"
                         placeholder="Kota/Kabupaten tempat lahir" 
                         required>
                  @error('tmp_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
              </div>
              
            <!-- Wilayah Domisili -->
            <div class="form-section mt-4">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-geo-alt-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Wilayah Domisili</h4>
                  <p class="mb-0 text-muted small">Informasi tempat tinggal saat ini</p>
                </div>
              </div>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Provinsi <span class="text-danger">*</span></label>
                    <select name="province_id" id="province_id" class="form-select @error('province_id') is-invalid @enderror" required>
                      <option value="">Pilih Provinsi</option>
                      @foreach($provinces as $province)
                        <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
                          {{ $province->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('province_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                    <select name="regency_id" id="regency_id" class="form-select @error('regency_id') is-invalid @enderror" required disabled>
                      <option value="">Pilih Kabupaten/Kota</option>
                    </select>
                    @error('regency_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <select name="district_id" id="district_id" class="form-select @error('district_id') is-invalid @enderror" required disabled>
                      <option value="">Pilih Kecamatan</option>
                    </select>
                    @error('district_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-label">Kelurahan/Desa <span class="text-danger">*</span></label>
                    <select name="village_id" id="village_id" class="form-select @error('village_id') is-invalid @enderror" required disabled>
                      <option value="">Pilih Kelurahan/Desa</option>
                    </select>
                    @error('village_id')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
                <div class="row g-3 mt-2">
                  <div class="col-md-12">
                    <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                    <textarea name="alamat" 
                              class="form-control @error('alamat') is-invalid @enderror" 
                              rows="3" 
                              placeholder="Jalan, RT/RW" 
                              required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!-- Data Sekolah Asal -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-building-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Data Sekolah Asal</h4>
                  <p class="mb-0 text-muted small">Informasi sekolah asal</p>
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">NPSN <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="npsn" 
                         class="form-control @error('npsn') is-invalid @enderror" 
                         value="{{ old('npsn') }}"
                         placeholder="Nomor Pokok Sekolah Nasional" 
                         required>
                  @error('npsn')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Kabupaten Sekolah Asal <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="kabupaten_sekolah" 
                         class="form-control @error('kabupaten_sekolah') is-invalid @enderror" 
                         value="{{ old('kabupaten_sekolah') }}"
                         placeholder="Kabupaten/Kota sekolah asal" 
                         required>
                  @error('kabupaten_sekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
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
              </div>
            </div>
            
            <!-- Pilihan Jurusan -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-mortarboard-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Pilihan Jurusan</h4>
                  <p class="mb-0 text-muted small">Pilih program keahlian yang diminati</p>
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Jurusan Pilihan 1 <span class="text-danger">*</span></label>
                  <select name="jurusan_pilihan_1" class="form-select @error('jurusan_pilihan_1') is-invalid @enderror" required>
                    <option value="">Pilih Jurusan Pilihan 1</option>
                    @foreach($jurusans as $jurusan)
                      <option value="{{ $jurusan->id }}" {{ old('jurusan_pilihan_1') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                      </option>
                    @endforeach
                  </select>
                  @error('jurusan_pilihan_1')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Jurusan Pilihan 2 <span class="text-danger">*</span></label>
                  <select name="jurusan_pilihan_2" class="form-select @error('jurusan_pilihan_2') is-invalid @enderror" required>
                    <option value="">Pilih Jurusan Pilihan 2</option>
                    @foreach($jurusans as $jurusan)
                      <option value="{{ $jurusan->id }}" {{ old('jurusan_pilihan_2') == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->nama }}
                      </option>
                    @endforeach
                  </select>
                  @error('jurusan_pilihan_2')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <!-- Data Orang Tua/Wali -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-people-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Data Orang Tua/Wali</h4>
                  <p class="mb-0 text-muted small">Informasi orang tua atau wali siswa</p>
                </div>
              </div>
              
              <div class="row g-3">
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
  border-bottom: 1px solid #e9ecef;
}

.form-section:last-of-type {
  border-bottom: none;
  margin-bottom: 2rem;
}

.section-icon-inline {
  font-size: 1.5rem;
  color: var(--accent-color);
  width: 24px;
  text-align: center;
}

.section-header h4 {
  color: var(--heading-color);
  font-weight: 600;
  font-size: 1.1rem;
  line-height: 1.3;
}

.section-header p {
  color: #6c757d;
  font-size: 0.85rem;
  line-height: 1.2;
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

.form-actions .btn-outline-secondary {
  background: white;
  border: 2px solid var(--accent-color);
  color: var(--accent-color);
}

.form-actions .btn-outline-secondary:hover {
  background: var(--accent-color);
  border-color: var(--accent-color);
  color: white;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const jurusan1 = document.querySelector('select[name="jurusan_pilihan_1"]');
    const jurusan2 = document.querySelector('select[name="jurusan_pilihan_2"]');
    const provinceSelect = document.getElementById('province_id');
    const regencySelect = document.getElementById('regency_id');
    const districtSelect = document.getElementById('district_id');
    const villageSelect = document.getElementById('village_id');
    
    // Function to get postal code based on district ID

    
    // Jurusan logic
    function updateJurusanOptions() {
        const selectedValue1 = jurusan1.value;
        const selectedValue2 = jurusan2.value;
        
        Array.from(jurusan1.options).forEach(option => {
            option.disabled = false;
        });
        Array.from(jurusan2.options).forEach(option => {
            option.disabled = false;
        });
        
        if (selectedValue1) {
            Array.from(jurusan2.options).forEach(option => {
                if (option.value === selectedValue1) {
                    option.disabled = true;
                }
            });
        }
        
        if (selectedValue2) {
            Array.from(jurusan1.options).forEach(option => {
                if (option.value === selectedValue2) {
                    option.disabled = true;
                }
            });
        }
    }
    
    // Wilayah logic
    function resetSelect(selectElement, placeholder) {
        selectElement.innerHTML = `<option value="">${placeholder}</option>`;
        selectElement.disabled = true;
    }
    
    function loadRegencies(provinceId) {
        console.log('Loading regencies for province:', provinceId);
        if (!provinceId) {
            resetSelect(regencySelect, 'Pilih Kabupaten/Kota');
            resetSelect(districtSelect, 'Pilih Kecamatan');
            resetSelect(villageSelect, 'Pilih Kelurahan/Desa');
            return;
        }
        
        fetch(`/wilayah/regencies/${provinceId}`)
            .then(response => {
                console.log('Regencies response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Regencies data:', data);
                regencySelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
                data.forEach(regency => {
                    regencySelect.innerHTML += `<option value="${regency.id}">${regency.name}</option>`;
                });
                regencySelect.disabled = false;
                resetSelect(districtSelect, 'Pilih Kecamatan');
                resetSelect(villageSelect, 'Pilih Kelurahan/Desa');
            })
            .catch(error => {
                console.error('Error loading regencies:', error);
                alert('Error loading kabupaten/kota data: ' + error.message);
            });
    }
    
    function loadDistricts(regencyId) {
        console.log('Loading districts for regency:', regencyId);
        if (!regencyId) {
            resetSelect(districtSelect, 'Pilih Kecamatan');
            resetSelect(villageSelect, 'Pilih Kelurahan/Desa');
            return;
        }
        
        fetch(`/wilayah/districts/${regencyId}`)
            .then(response => {
                console.log('Districts response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Districts data:', data);
                districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                data.forEach(district => {
                    districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
                });
                districtSelect.disabled = false;
                resetSelect(villageSelect, 'Pilih Kelurahan/Desa');
            })
            .catch(error => {
                console.error('Error loading districts:', error);
                alert('Error loading kecamatan data: ' + error.message);
            });
    }
    
    function loadVillages(districtId) {
        console.log('Loading villages for district:', districtId);
        if (!districtId) {
            resetSelect(villageSelect, 'Pilih Kelurahan/Desa');
            return;
        }
        
        fetch(`/wilayah/villages/${districtId}`)
            .then(response => {
                console.log('Villages response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Villages data:', data);
                villageSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
                data.forEach(village => {
                    villageSelect.innerHTML += `<option value="${village.id}">${village.name}</option>`;
                });
                villageSelect.disabled = false;
                console.log('Villages loaded successfully, dropdown enabled');
                

            })
            .catch(error => {
                console.error('Error loading villages:', error);
                alert('Error loading kelurahan/desa data: ' + error.message);
            });
    }
    
    // Event listeners
    jurusan1.addEventListener('change', updateJurusanOptions);
    jurusan2.addEventListener('change', updateJurusanOptions);
    provinceSelect.addEventListener('change', (e) => loadRegencies(e.target.value));
    regencySelect.addEventListener('change', (e) => loadDistricts(e.target.value));
    districtSelect.addEventListener('change', (e) => loadVillages(e.target.value));

    

    
    // Initial updates
    updateJurusanOptions();
    
    // Auto-load based on current selections (for page refresh)
    if (provinceSelect.value) {
        loadRegencies(provinceSelect.value);
        
        setTimeout(() => {
            if (regencySelect.value) {
                loadDistricts(regencySelect.value);
                
                setTimeout(() => {
                    if (districtSelect.value) {
                        loadVillages(districtSelect.value);
                    }
                }, 500);
            }
        }, 500);
    }
    
    // Helper functions for debugging
    window.testAPI = function(type, id) {
        const urls = {
            regencies: `/wilayah/regencies/${id}`,
            districts: `/wilayah/districts/${id}`,
            villages: `/wilayah/villages/${id}`
        };
        
        if (urls[type]) {
            fetch(urls[type])
                .then(response => response.json())
                .then(data => console.log(`${type} data:`, data))
                .catch(error => console.error(`Error loading ${type}:`, error));
        }
    };
    

    
    console.log('Wilayah cascade dropdown initialized');
    console.log('Test API: testAPI("regencies", "32") for Jawa Barat');
});
</script>
@endsection