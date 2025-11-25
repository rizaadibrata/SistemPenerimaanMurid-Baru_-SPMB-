@extends('layouts.main')

@section('content')
<div class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="heading-title">Pembayaran</h1>
          <p class="mb-0">Selesaikan pembayaran biaya pendaftaran</p>
        </div>
      </div>
    </div>
  </div>
</div>

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Payment Info Card -->
        <div class="payment-card mb-4">
          <div class="payment-header">
            <h5><i class="bi bi-credit-card me-2"></i>Informasi Pembayaran</h5>
          </div>
          
          <div class="payment-body">
            <div class="row">
              <div class="col-md-6">
                <div class="info-item">
                  <label>Nama Pendaftar:</label>
                  <span>{{ $pendaftar && $pendaftar->dataSiswa ? $pendaftar->dataSiswa->nama : Auth::user()->name }}</span>
                </div>
                <div class="info-item">
                  <label>No. Pendaftaran:</label>
                  <span>{{ $pendaftar->no_pendaftaran ?? '-' }}</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-item">
                  <label>Gelombang:</label>
                  <span>{{ $pendaftar->gelombang->nama ?? '-' }}</span>
                </div>
                <div class="info-item">
                  <label>Biaya Pendaftaran:</label>
                  <span class="price">Rp {{ number_format($harga, 0, ',', '.') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Payment Method -->
        <div class="payment-card mb-4">
          <div class="payment-header">
            <h5><i class="bi bi-bank me-2"></i>Metode Pembayaran</h5>
          </div>
          
          <div class="payment-body">
            <div class="bank-info">
              <h6>Transfer Bank</h6>
              <div class="bank-details">
                <div class="bank-item">
                  <strong>Bank BCA</strong><br>
                  No. Rekening: <span class="account-number">1234567890</span><br>
                  Atas Nama: SMK Bakti Nusantara 666
                </div>
                <div class="bank-item">
                  <strong>Bank Mandiri</strong><br>
                  No. Rekening: <span class="account-number">0987654321</span><br>
                  Atas Nama: SMK Bakti Nusantara 666
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Upload Bukti -->
        <div class="payment-card">
          <div class="payment-header">
            <h5><i class="bi bi-cloud-upload me-2"></i>Upload Bukti Pembayaran</h5>
          </div>
          
          <div class="payment-body">
            <form action="{{ route('pendaftaran.pembayaran.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="bukti_pembayaran" class="form-label">Bukti Transfer</label>
                <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" 
                       accept="image/*,application/pdf" required>
                <div class="form-text">Format: JPG, PNG, PDF. Maksimal 5MB</div>
              </div>
              
              <div class="mb-3">
                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" 
                       placeholder="Nama yang tertera di rekening pengirim" required>
              </div>
              

              
              <div class="mb-3">
                <label for="jumlah_transfer" class="form-label">Jumlah Transfer</label>
                <input type="number" class="form-control" id="jumlah_transfer" name="jumlah_transfer" 
                       value="{{ $harga }}" readonly>
              </div>
              
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                  <i class="bi bi-upload me-2"></i>Upload Bukti Pembayaran
                </button>
                <a href="{{ route('pendaftaran.status') }}" class="btn btn-outline-secondary">
                  <i class="bi bi-arrow-left me-2"></i>Kembali ke Status
                </a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<style>
.page-title {
  background: #f1f3f4;
  color: black;
  padding: 4rem 0 2rem;
}

.payment-card {
  background: white;
  border-radius: 15px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  border: 1px solid #f0f0f0;
  border-left: 4px solid #007bff;
}

.payment-header {
  padding: 1.5rem;
  border-bottom: 1px solid #f0f0f0;
  background: #f8f9fa;
  border-radius: 15px 15px 0 0;
}

.payment-header h5 {
  margin: 0;
  color: #2c3e50;
  font-weight: 600;
}

.payment-body {
  padding: 1.5rem;
}

.info-item {
  margin-bottom: 1rem;
}

.info-item label {
  font-weight: 600;
  color: #6c757d;
  display: block;
  margin-bottom: 0.25rem;
}

.info-item span {
  color: #2c3e50;
}

.price {
  font-size: 1.25rem;
  font-weight: 700;
  color: #007bff !important;
}

.bank-details {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
}

.bank-item {
  padding: 1rem;
  background: #f8f9fa;
  border-radius: 8px;
  border: 1px solid #e9ecef;
}

.account-number {
  font-family: monospace;
  font-weight: 700;
  color: #007bff;
}

@media (max-width: 768px) {
  .bank-details {
    grid-template-columns: 1fr;
  }
}
</style>
@endsection