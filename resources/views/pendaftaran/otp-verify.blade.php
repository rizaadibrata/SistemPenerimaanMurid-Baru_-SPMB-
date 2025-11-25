@extends('layouts.main')

@section('title', 'Verifikasi OTP')

@section('content')
<section class="section" style="padding-top: 140px; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-envelope-check text-primary" style="font-size: 3rem;"></i>
                            <h3 class="card-title mt-3 mb-2">Verifikasi Email</h3>
                            <p class="text-muted">Masukkan kode OTP yang telah dikirim</p>
                        </div>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form id="otpForm" method="POST" action="{{ route('otp.verify') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('otp_email') }}">

                            <div class="mb-4">
                                <label class="form-label fw-semibold">Kode OTP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg text-center" 
                                       name="otp" placeholder="000000" maxlength="6" 
                                       inputmode="numeric" pattern="[0-9]{6}" required 
                                       style="font-size: 1.5rem; letter-spacing: 0.5rem;">
                                <small class="text-muted d-block mt-2">Masukkan 6 digit kode yang dikirim ke email Anda</small>
                            </div>

                            <div class="alert alert-info border-0" role="alert" style="background-color: #e3f2fd;">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-info-circle text-info me-2 mt-1"></i>
                                    <small>
                                        <strong>Kode OTP berlaku selama 10 menit.</strong><br>
                                        Jika belum menerima kode, periksa folder spam atau 
                                        <a href="{{ route('otp.resend') }}" class="alert-link text-decoration-none">kirim ulang</a>
                                    </small>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Verifikasi OTP</button>
                                <a href="{{ route('pendaftaran.register') }}" class="btn btn-outline-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.querySelector('input[name="otp"]').addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('input[name="otp"]').focus();
    });
</script>
@endpush
@endsection
