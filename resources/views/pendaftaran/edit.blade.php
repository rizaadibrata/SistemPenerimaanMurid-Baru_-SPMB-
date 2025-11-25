@extends('layouts.main')

@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Edit Data Pendaftaran</h1>
          <p class="mb-0">Perbarui data diri Anda</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('pendaftaran.status') }}">Status</a></li>
        <li class="current">Edit Data</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Edit Form Section -->
<section class="section">
  <div class="container">
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

          <form action="{{ route('pendaftaran.edit.store') }}" method="POST" class="registration-form">
            @csrf
            
            <!-- Data Pribadi -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-person-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Data Pribadi</h4>
                  <p class="mb-0 text-muted small">Perbarui informasi identitas diri Anda</p>
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-12">
                  <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="nama_lengkap" 
                         class="form-control @error('nama_lengkap') is-invalid @enderror" 
                         value="{{ old('nama_lengkap', $pendaftar->dataSiswa->nama ?? '') }}"
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
                         value="{{ old('nisn', $pendaftar->dataSiswa->nisn ?? '') }}"
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
                         value="{{ old('nik', $pendaftar->dataSiswa->nik ?? '') }}"
                         placeholder="Nomor Induk Kependudukan" 
                         required>
                  @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="tempat_lahir" 
                         class="form-control @error('tempat_lahir') is-invalid @enderror" 
                         value="{{ old('tempat_lahir', $pendaftar->dataSiswa->tmp_lahir ?? '') }}"
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
                         value="{{ old('tanggal_lahir', $pendaftar->dataSiswa->tgl_lahir ?? '') }}"
                         required>
                  @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                  <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin', $pendaftar->dataSiswa->jk ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $pendaftar->dataSiswa->jk ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                  </select>
                  @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-8">
                  <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                  <textarea name="alamat" 
                            class="form-control @error('alamat') is-invalid @enderror" 
                            rows="3" 
                            placeholder="Jalan, RT/RW" 
                            required>{{ old('alamat', $pendaftar->dataSiswa->alamat ?? '') }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
                <div class="col-md-4">
                  <label class="form-label">Kode Pos <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="kode_pos" 
                         class="form-control @error('kode_pos') is-invalid @enderror" 
                         value="{{ old('kode_pos', $pendaftar->dataSiswa->kode_pos ?? '') }}"
                         placeholder="12345" 
                         maxlength="5"
                         pattern="[0-9]{5}"
                         required>
                  @error('kode_pos')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Data Sekolah Asal -->
            <div class="form-section">
              <div class="section-header d-flex align-items-center mb-3">
                <i class="bi bi-building-fill section-icon-inline me-2"></i>
                <div>
                  <h4 class="mb-1">Data Sekolah Asal</h4>
                  <p class="mb-0 text-muted small">Informasi sekolah asal dan prestasi akademik</p>
                </div>
              </div>
              
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">NPSN <span class="text-danger">*</span></label>
                  <input type="text" 
                         name="npsn" 
                         class="form-control @error('npsn') is-invalid @enderror" 
                         value="{{ old('npsn', $pendaftar->asalSekolah->npsn ?? '') }}"
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
                         value="{{ old('kabupaten_sekolah', $pendaftar->asalSekolah->kabupaten ?? '') }}"
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
                         value="{{ old('asal_sekolah', $pendaftar->asalSekolah->nama_sekolah ?? '') }}"
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
                      <option value="{{ $jurusan->id }}" {{ old('jurusan_pilihan_1', $pendaftar->jurusan_id ?? '') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>
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
                      <option value="{{ $jurusan->id }}" {{ old('jurusan_pilihan_2', $pendaftar->jurusan_pilihan_2 ?? '') == $jurusan->id ? 'selected' : '' }}>{{ $jurusan->nama }}</option>
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
                         value="{{ old('nama_ayah', $pendaftar->dataOrtu->nama_ayah ?? '') }}"
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
                         value="{{ old('nama_ibu', $pendaftar->dataOrtu->nama_ibu ?? '') }}"
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
                         value="{{ old('pekerjaan_ayah', $pendaftar->dataOrtu->pekerjaan_ayah ?? '') }}"
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
                         value="{{ old('pekerjaan_ibu', $pendaftar->dataOrtu->pekerjaan_ibu ?? '') }}"
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
                         value="{{ old('no_hp_ortu', $pendaftar->dataOrtu->hp_ayah ?? '') }}"
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
                  <a href="{{ route('pendaftaran.status') }}" class="btn btn-outline-secondary btn-lg w-100">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                  </a>
                </div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-lg w-100">
                    <i class="bi bi-check-circle me-2"></i>Simpan & Lanjut Upload Berkas
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
  .form-container {
    padding: 1.5rem;
    margin: 0 1rem;
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
    
    function updateOptions() {
        const selectedValue1 = jurusan1.value;
        const selectedValue2 = jurusan2.value;
        
        // Reset all options
        Array.from(jurusan1.options).forEach(option => {
            option.disabled = false;
        });
        Array.from(jurusan2.options).forEach(option => {
            option.disabled = false;
        });
        
        // Disable selected option in the other select
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
    
    jurusan1.addEventListener('change', updateOptions);
    jurusan2.addEventListener('change', updateOptions);
    
    // Initial update
    updateOptions();
});
</script>
@endsection