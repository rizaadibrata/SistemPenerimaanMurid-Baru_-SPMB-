@extends('layouts.main')

@section('content')
@php $hideNavbar = true; @endphp
<!-- Page Title -->
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Upload Berkas</h1>
          <p class="mb-0">Upload dokumen persyaratan pendaftaran Anda</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ route('pendaftaran.index') }}">Pendaftaran</a></li>
        <li class="current">Upload Berkas</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Upload Section -->
<section class="section">
  <div class="container">
    
    <!-- Upload Guidelines -->
    <div class="row justify-content-center mb-4" data-aos="fade-up">
      <div class="col-lg-8">
        <div class="guidelines-card">
          <h6><i class="bi bi-info-circle me-2"></i>Panduan Upload Dokumen</h6>
          <ul class="guidelines-list">
            <li>Pastikan dokumen dalam kondisi jelas dan dapat dibaca</li>
            <li>Format file yang diterima: PDF, JPG, JPEG, PNG</li>
            <li>Ukuran maksimal file: 2MB untuk dokumen, 1MB untuk foto</li>
            <li>Scan atau foto dokumen dengan pencahayaan yang cukup</li>
            <li>Hindari dokumen yang buram atau terpotong</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Progress Steps -->
        <div class="progress-container mb-4" data-aos="fade-up">
          <div class="progress-steps">
            <div class="step completed">
              <div class="step-number">1</div>
              <div class="step-label">Data Diri</div>
            </div>
            <div class="step-line completed"></div>
            <div class="step active">
              <div class="step-number">2</div>
              <div class="step-label">Upload Berkas</div>
            </div>
            <div class="step-line"></div>
            <div class="step">
              <div class="step-number">3</div>
              <div class="step-label">Verifikasi</div>
            </div>
            <div class="step-line"></div>
            <div class="step">
              <div class="step-number">4</div>
              <div class="step-label">Pembayaran</div>
            </div>
            <div class="step-line"></div>
            <div class="step">
              <div class="step-number">5</div>
              <div class="step-label">Selesai</div>
            </div>
          </div>
        </div>
        
        <!-- Form Container -->
        <div class="form-container" data-aos="fade-up" data-aos-delay="200">
          @if($berkas->count() > 0)
          <div class="alert alert-success">
            <i class="bi bi-check-circle me-2"></i>
            <strong>File yang sudah diupload akan tetap tersimpan.</strong> Anda hanya perlu mengupload file yang ingin diganti atau file baru yang belum diupload.
          </div>
          @endif
          
          @if(isset($pendaftar) && $pendaftar->dataSiswa)
          <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            <strong>Data Pendaftaran:</strong> {{ $pendaftar->dataSiswa->nama ?? Auth::user()->name }} - {{ $pendaftar->jurusan->nama ?? 'Jurusan belum dipilih' }}
            <a href="{{ route('pendaftaran.edit') }}" class="btn btn-sm btn-outline-primary ms-2">
              <i class="bi bi-pencil"></i> Edit Data
            </a>
          </div>
          @endif

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

          @if (session('success'))
            <div class="alert alert-success">
              <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            </div>
          @endif

          <form action="{{ route('pendaftaran.upload.store') }}" method="POST" enctype="multipart/form-data" class="upload-form">
            @csrf
            
            <!-- Required Documents -->
            <div class="documents-section">
              <h5 class="section-title mb-4">
                <i class="bi bi-file-earmark-check me-2"></i>Dokumen Wajib
              </h5>
              
              <div class="row gy-3">
                <!-- Ijazah/Rapor -->
                <div class="col-md-6">
                  <div class="document-card">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-file-earmark-text"></i>
                      </div>
                      <div class="document-info">
                        <h6>Ijazah/Rapor SMP <span class="text-danger">*</span></h6>
                        <p class="small text-muted">Upload ijazah atau rapor semester terakhir</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('IJAZAH')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-ijazah">
                      <input type="file" 
                             name="berkas_ijazah" 
                             id="berkas_ijazah"
                             class="file-input @error('berkas_ijazah') is-invalid @enderror" 
                             accept=".pdf,.jpg,.jpeg,.png"
                             {{ $berkas->where('jenis', 'IJAZAH')->first() ? '' : 'required' }}>
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'IJAZAH')->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">PDF, JPG, PNG (Max: 2MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'IJAZAH')->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'IJAZAH')->first()->nama_file ?? '' }}</span>

                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                    @error('berkas_ijazah')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Kartu Keluarga -->
                <div class="col-md-6">
                  <div class="document-card">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="document-info">
                        <h6>Kartu Keluarga <span class="text-danger">*</span></h6>
                        <p class="small text-muted">Kartu Keluarga yang masih berlaku</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('KK')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-kk">
                      <input type="file" 
                             name="berkas_kk" 
                             id="berkas_kk"
                             class="file-input @error('berkas_kk') is-invalid @enderror" 
                             accept=".pdf,.jpg,.jpeg,.png"
                             {{ $berkas->where('jenis', 'KK')->first() ? '' : 'required' }}>
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'KK')->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">PDF, JPG, PNG (Max: 2MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'KK')->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'KK')->first()->nama_file ?? '' }}</span>

                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                    @error('berkas_kk')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Akta Kelahiran -->
                <div class="col-md-6">
                  <div class="document-card">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-file-earmark-person"></i>
                      </div>
                      <div class="document-info">
                        <h6>Akta Kelahiran <span class="text-danger">*</span></h6>
                        <p class="small text-muted">Akta kelahiran asli atau fotokopi</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('AKTA')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-akta">
                      <input type="file" 
                             name="berkas_akta" 
                             id="berkas_akta"
                             class="file-input @error('berkas_akta') is-invalid @enderror" 
                             accept=".pdf,.jpg,.jpeg,.png"
                             {{ $berkas->where('jenis', 'AKTA')->first() ? '' : 'required' }}>
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'AKTA')->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">PDF, JPG, PNG (Max: 2MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'AKTA')->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'AKTA')->first()->nama_file ?? '' }}</span>

                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                    @error('berkas_akta')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <!-- Pas Foto -->
                <div class="col-md-6">
                  <div class="document-card">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-person-square"></i>
                      </div>
                      <div class="document-info">
                        <h6>Pas Foto 3x4 <span class="text-danger">*</span></h6>
                        <p class="small text-muted">Foto terbaru dengan latar belakang merah</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('FOTO')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-foto">
                      <input type="file" 
                             name="pas_foto" 
                             id="pas_foto"
                             class="file-input @error('pas_foto') is-invalid @enderror" 
                             accept=".jpg,.jpeg,.png"
                             {{ $berkas->where('jenis', 'FOTO')->first() ? '' : 'required' }}>
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'FOTO')->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">JPG, PNG (Max: 1MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'FOTO')->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'FOTO')->first()->nama_file ?? '' }}</span>

                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                    @error('pas_foto')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <!-- Optional Documents -->
            <div class="documents-section mt-4">
              <h5 class="section-title mb-4">
                <i class="bi bi-file-earmark-plus me-2"></i>Dokumen Tambahan <span class="text-muted">(Opsional)</span>
              </h5>
              
              <div class="row gy-3">
                <!-- Sertifikat Prestasi -->
                <div class="col-md-6">
                  <div class="document-card optional">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-award"></i>
                      </div>
                      <div class="document-info">
                        <h6>Sertifikat Prestasi</h6>
                        <p class="small text-muted">Sertifikat prestasi akademik/non-akademik</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('PRESTASI')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-prestasi">
                      <input type="file" 
                             name="sertifikat_prestasi" 
                             id="sertifikat_prestasi"
                             class="file-input" 
                             accept=".pdf,.jpg,.jpeg,.png">
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'prestasi_'); })->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">PDF, JPG, PNG (Max: 2MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'prestasi_'); })->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'prestasi_'); })->first()->nama_file ?? '' }}</span>
                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Surat Keterangan Tidak Mampu -->
                <div class="col-md-6">
                  <div class="document-card optional">
                    <div class="document-header">
                      <div class="document-icon">
                        <i class="bi bi-file-earmark-medical"></i>
                      </div>
                      <div class="document-info">
                        <h6>SKTM</h6>
                        <p class="small text-muted">Surat Keterangan Tidak Mampu (jika ada)</p>
                      </div>
                      <button type="button" class="btn-view-simple" onclick="viewFile('SKTM')" title="Lihat">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                    
                    <div class="upload-area" id="upload-sktm">
                      <input type="file" 
                             name="sktm" 
                             id="sktm"
                             class="file-input" 
                             accept=".pdf,.jpg,.jpeg,.png">
                      <div class="upload-content" style="display: {{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'sktm_'); })->first() ? 'none' : 'block' }};">
                        <i class="bi bi-arrow-up-circle upload-icon"></i>
                        <p class="upload-text">Klik atau drag file ke sini</p>
                        <p class="upload-hint">PDF, JPG, PNG (Max: 2MB)</p>
                      </div>
                      <div class="file-preview" style="display: {{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'sktm_'); })->first() ? 'flex' : 'none' }};">
                        <i class="bi bi-check-circle text-success"></i>
                        <span class="file-name">{{ $berkas->where('jenis', 'LAINNYA')->filter(function($item) { return str_contains($item->nama_file, 'sktm_'); })->first()->nama_file ?? '' }}</span>
                        <button type="button" class="btn-remove">
                          <i class="bi bi-x"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions text-center mt-4">
              <a href="{{ route('pendaftaran.edit') }}" class="btn btn-outline-secondary btn-lg w-100 mb-2">
                <i class="bi bi-arrow-left me-2"></i>Kembali
              </a>
              <button type="submit" class="btn btn-primary btn-lg w-100">
                <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
              </button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="previewModalLabel">Preview</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center" style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
        <div id="previewLoading" style="display: none;">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="mt-2">Memuat berkas...</p>
        </div>
        <img id="previewImage" src="" alt="Preview" style="max-width: 100%; max-height: 70vh; display: none;">
        <iframe id="previewPdf" src="" style="width: 100%; height: 600px; border: none; display: none;"></iframe>
        <div id="previewError" style="display: none; color: #dc3545;">
          <i class="bi bi-exclamation-circle" style="font-size: 3rem;"></i>
          <p class="mt-2">Gagal memuat berkas</p>
        </div>
      </div>
    </div>
  </div>
</div>

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

/* Progress step text override */
.form-container {
  background: white;
  border-radius: 20px;
  padding: 2.5rem;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  border: 1px solid #f0f0f0;
}

.documents-section {
  margin-bottom: 2rem;
}

.section-title {
  color: var(--heading-color);
  font-weight: 600;
  padding-bottom: 0.5rem;
  border-bottom: 2px solid var(--accent-color);
  display: inline-block;
}

.document-card {
  background: #f8f9fa;
  border-radius: 12px;
  padding: 1.2rem;
  border: 2px solid #e9ecef;
  transition: all 0.3s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
}

.document-card:hover {
  border-color: var(--accent-color);
  transform: translateY(-2px);
}

.document-card.optional {
  border-style: dashed;
  opacity: 0.8;
}

.document-header {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
}

.document-icon {
  width: 45px;
  height: 45px;
  background: var(--accent-color);
  color: white;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.1rem;
  margin-right: 1rem;
  flex-shrink: 0;
}

.document-info {
  flex: 1;
}

.document-info h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 0.25rem;
}

.upload-area {
  position: relative;
  border: 2px dashed #dee2e6;
  border-radius: 10px;
  padding: 1.5rem 1rem;
  text-align: center;
  transition: all 0.3s ease;
  cursor: pointer;
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.upload-area:hover {
  border-color: var(--accent-color);
  background: rgba(13, 110, 253, 0.05);
}

.upload-area.dragover {
  border-color: var(--accent-color);
  background: rgba(13, 110, 253, 0.1);
}

.file-input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
}

.upload-content .upload-icon {
  font-size: 1.8rem;
  color: var(--accent-color);
  margin-bottom: 0.3rem;
}

.upload-text {
  font-weight: 600;
  color: var(--heading-color);
  margin-bottom: 0.25rem;
}

.upload-hint {
  font-size: 0.8rem;
  color: #6c757d;
  margin-bottom: 0;
}

.file-preview {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  gap: 0.75rem;
  padding: 0.75rem 1rem;
  background: #f8f9fa;
  border-radius: 8px;
  border: 1px solid #28a745;
}

.file-preview i {
  font-size: 1.5rem;
}

.file-name {
  font-weight: 600;
  color: var(--heading-color);
  flex: 1;
  text-align: left;
}

.btn-view-simple {
  background: #007bff;
  color: white;
  border: none;
  border-radius: 6px;
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-left: auto;
  font-size: 0.9rem;
  flex-shrink: 0;
}

.btn-view-simple:hover {
  background: #0056b3;
  transform: scale(1.1);
}

.document-header {
  display: flex;
  align-items: flex-start;
  margin-bottom: 1rem;
  gap: 0.5rem;
}

.btn-remove {
  background: #dc3545;
  color: white;
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  flex-shrink: 0;
}

.btn-remove:hover {
  background: #c82333;
}

.btn-preview-existing {
  background: #007bff;
  color: white;
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.3s ease;
  margin-left: 0.5rem;
  font-size: 0.8rem;
}

.btn-preview-existing:hover {
  background: #0056b3;
  transform: scale(1.1);
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

.guidelines-card {
  background: white;
  border-radius: 15px;
  padding: 1.5rem;
  border-left: 4px solid var(--accent-color);
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.guidelines-card h6 {
  color: var(--heading-color);
  font-weight: 600;
  margin-bottom: 1rem;
}

.guidelines-list {
  margin-bottom: 0;
  padding-left: 1rem;
}

.guidelines-list li {
  color: #6c757d;
  margin-bottom: 0.5rem;
  font-size: 0.9rem;
}

.progress-container {
  background: white;
  border-radius: 15px;
  padding: 2rem;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.progress-steps {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 0.5rem;
}

.step {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  min-width: 80px;
}

.step-number {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #e9ecef;
  color: #6c757d;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
  transition: all 0.3s ease;
}

.step-label {
  font-size: 0.8rem;
  color: #6c757d;
  font-weight: 500;
}

.step.active .step-number {
  background: var(--accent-color);
  color: white;
  transform: scale(1.1);
}

.step.active .step-label {
  color: var(--accent-color);
  font-weight: 600;
}

.step.completed .step-number {
  background: #28a745;
  color: white;
}

.step.completed .step-label {
  color: #28a745;
  font-weight: 600;
}

.step-line {
  width: 60px;
  height: 2px;
  background: #e9ecef;
  margin: 0 0.5rem;
  margin-bottom: 1.5rem;
}

.step-line.completed {
  background: #28a745;
}

@media (max-width: 768px) {
  .form-container {
    padding: 1.5rem;
    margin: 0 1rem;
  }
  
  .progress-steps {
    flex-direction: column;
    gap: 1rem;
  }
  
  .step-line {
    width: 2px;
    height: 30px;
    margin: 0;
  }
  
  .step {
    min-width: auto;
  }
}
</style>

<script>
let berkasData = @json($berkas);
console.log('Initial berkas data:', berkasData);

// Always load fresh berkas data from API
fetch('/api/berkas')
  .then(response => response.json())
  .then(data => {
    berkasData = data;
    console.log('Loaded fresh berkas data from API:', berkasData);
  })
  .catch(error => console.error('Error loading berkas:', error));

function viewFile(jenis) {
  console.log('ViewFile called for:', jenis);
  console.log('Current berkas data:', berkasData);
  
  // Wait for API data if still loading
  if (berkasData.length === 0) {
    // Reload berkas data and try again
    fetch('/api/berkas')
      .then(response => response.json())
      .then(data => {
        berkasData = data;
        console.log('Reloaded berkas data:', berkasData);
        viewFileWithData(jenis);
      })
      .catch(error => {
        console.error('Error loading berkas:', error);
        alert('Gagal memuat data berkas');
      });
    return;
  }
  
  viewFileWithData(jenis);
}

function getJenisFromInput(inputName) {
  const mapping = {
    'berkas_ijazah': 'IJAZAH',
    'berkas_kk': 'KK', 
    'berkas_akta': 'AKTA',
    'pas_foto': 'FOTO',
    'sertifikat_prestasi': 'LAINNYA',
    'sktm': 'LAINNYA'
  };
  return mapping[inputName] || 'LAINNYA';
}

function viewFileWithData(jenis) {
  let file = null;
  
  if (jenis === 'PRESTASI') {
    file = berkasData.find(item => item.jenis === 'LAINNYA' && item.nama_file && item.nama_file.startsWith('prestasi_'));
  } else if (jenis === 'SKTM') {
    file = berkasData.find(item => item.jenis === 'LAINNYA' && item.nama_file && item.nama_file.startsWith('sktm_'));
  } else {
    file = berkasData.find(item => item.jenis === jenis);
  }
  
  console.log('Found file for', jenis, ':', file);
  
  if (file) {
    if (file.temp_file) {
      // Show preview of temporary file using FileReader
      const reader = new FileReader();
      reader.onload = function(e) {
        showPreviewFromData(e.target.result, file.nama_file);
      };
      reader.readAsDataURL(file.temp_file);
    } else if (file.url) {
      const fileName = file.url.split('/').pop();
      const fileUrl = '/storage/uploads/berkas/' + fileName;
      console.log('Using file URL:', fileUrl);
      showPreview(fileUrl, file.nama_file || fileName);
    }
  } else {
    alert('Belum ada file yang diupload untuk ' + jenis);
  }
}

function showPreviewFromData(dataUrl, filename) {
  // Show modal with backdrop
  const modal = document.getElementById('previewModal');
  const backdrop = document.createElement('div');
  backdrop.className = 'modal-backdrop fade show';
  backdrop.id = 'modal-backdrop';
  
  document.body.appendChild(backdrop);
  document.body.classList.add('modal-open');
  
  modal.style.display = 'block';
  modal.classList.add('show');
  modal.setAttribute('aria-modal', 'true');
  modal.setAttribute('role', 'dialog');
  
  // Setup modal content
  const img = document.getElementById('previewImage');
  const loading = document.getElementById('previewLoading');
  const modalLabel = document.getElementById('previewModalLabel');
  
  if (loading) loading.style.display = 'none';
  if (modalLabel) modalLabel.textContent = filename;
  
  if (img) {
    img.src = dataUrl;
    img.style.display = 'block';
  }
}

function showPreview(url, filename) {
  // Show modal with backdrop
  const modal = document.getElementById('previewModal');
  const backdrop = document.createElement('div');
  backdrop.className = 'modal-backdrop fade show';
  backdrop.id = 'modal-backdrop';
  
  document.body.appendChild(backdrop);
  document.body.classList.add('modal-open');
  
  modal.style.display = 'block';
  modal.classList.add('show');
  modal.setAttribute('aria-modal', 'true');
  modal.setAttribute('role', 'dialog');
  
  // Setup modal content
  const img = document.getElementById('previewImage');
  const pdf = document.getElementById('previewPdf');
  const loading = document.getElementById('previewLoading');
  const modalLabel = document.getElementById('previewModalLabel');
  
  // Reset displays
  if (img) img.style.display = 'none';
  if (pdf) pdf.style.display = 'none';
  if (loading) loading.style.display = 'block';
  if (modalLabel) modalLabel.textContent = filename;
  
  // Check file extension
  const ext = filename.split('.').pop().toLowerCase();
  
  if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
    img.onload = function() {
      loading.style.display = 'none';
      img.style.display = 'block';
    };
    img.onerror = function() {
      console.log('Failed to load:', url);
      // Try alternative URLs
      const altUrls = [
        '/storage/uploads/berkas/' + encodeURIComponent(filename),
        '{{ url('storage/uploads/berkas') }}/' + encodeURIComponent(filename)
      ];
      
      tryNextUrl(0);
      
      function tryNextUrl(index) {
        if (index >= altUrls.length) {
          loading.style.display = 'none';
          const error = document.getElementById('previewError');
          if (error) error.style.display = 'block';
          return;
        }
        
        const testImg = new Image();
        testImg.onload = function() {
          img.src = altUrls[index];
          loading.style.display = 'none';
          img.style.display = 'block';
        };
        testImg.onerror = function() {
          tryNextUrl(index + 1);
        };
        testImg.src = altUrls[index];
      }
    };
    img.src = url;
  } else if (ext === 'pdf') {
    loading.style.display = 'none';
    pdf.src = url;
    pdf.style.display = 'block';
  }
}

function closeModal() {
  const modal = document.getElementById('previewModal');
  const backdrop = document.getElementById('modal-backdrop');
  
  if (modal) {
    modal.style.display = 'none';
    modal.classList.remove('show');
    modal.removeAttribute('aria-modal');
    modal.removeAttribute('role');
  }
  
  if (backdrop) {
    backdrop.remove();
  }
  
  document.body.classList.remove('modal-open');
}

document.addEventListener('DOMContentLoaded', function() {
  // Add close button functionality
  const closeBtn = document.querySelector('#previewModal .btn-close');
  if (closeBtn) {
    closeBtn.onclick = closeModal;
  }
  // File upload handling
  const fileInputs = document.querySelectorAll('.file-input');
  
  fileInputs.forEach(input => {
    const uploadArea = input.closest('.upload-area');
    const uploadContent = uploadArea.querySelector('.upload-content');
    const filePreview = uploadArea.querySelector('.file-preview');
    const fileName = filePreview.querySelector('.file-name');
    const removeBtn = filePreview.querySelector('.btn-remove');
    
    // File input change
    input.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        showFilePreview(this.files[0]);
        
        // Update berkas data with new file info
        const file = this.files[0];
        const jenis = getJenisFromInput(this.name);
        
        // Add to berkas data immediately
        const newBerkas = {
          jenis: jenis,
          nama_file: file.name,
          url: 'uploads/berkas/' + file.name.replace(/\s+/g, '_'), // temporary URL
          temp_file: file // store actual file for preview
        };
        
        // Remove existing berkas of same type
        berkasData = berkasData.filter(item => item.jenis !== jenis);
        berkasData.push(newBerkas);
        
        console.log('Updated berkas data:', berkasData);
      }
    });
    
    // Prevent click on file preview area
    if (filePreview) {
      filePreview.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
    
    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.classList.add('dragover');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
    });
    
    uploadArea.addEventListener('drop', function(e) {
      e.preventDefault();
      this.classList.remove('dragover');
      
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        input.files = files;
        showFilePreview(files[0]);
      }
    });
    
    // View file
    const viewBtn = filePreview.querySelector('.btn-view');
    if (viewBtn) {
      viewBtn.addEventListener('click', function(e) {
        e.stopPropagation();
      });
    }
    
    // Remove file
    removeBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      input.value = '';
      hideFilePreview();
    });
    
    function showFilePreview(file) {
      fileName.textContent = file.name;
      uploadContent.style.display = 'none';
      filePreview.style.display = 'flex';
    }
    
    function hideFilePreview() {
      uploadContent.style.display = 'block';
      filePreview.style.display = 'none';
    }
  });
});
</script>
@endsection