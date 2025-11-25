<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi Ditolak - PPDB SMK Bakti Nusantara 666</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #dc3545;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border: 1px solid #dee2e6;
        }
        .footer {
            background: #6c757d;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 0 0 8px 8px;
            font-size: 12px;
        }
        .alert {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin: 10px 0;
        }
        .info-box {
            background: white;
            border: 1px solid #dee2e6;
            padding: 15px;
            border-radius: 4px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🚫 Verifikasi Ditolak</h1>
        <p>PPDB SMK Bakti Nusantara 666</p>
    </div>

    <div class="content">
        <h2>Halo, {{ $pendaftar->pengguna->nama }}!</h2>
        
        <p>Kami informasikan bahwa verifikasi dokumen pendaftaran Anda dengan nomor <strong>{{ $pendaftar->no_pendaftaran }}</strong> telah <strong style="color: #dc3545;">DITOLAK</strong>.</p>

        @if($pendaftar->catatan_verifikator)
        <div class="alert">
            <h3>📝 Catatan Verifikator:</h3>
            <p>{{ $pendaftar->catatan_verifikator }}</p>
        </div>
        @endif

        <div class="info-box">
            <h3>📋 Detail Pendaftaran:</h3>
            <ul>
                <li><strong>Nomor Pendaftaran:</strong> {{ $pendaftar->no_pendaftaran }}</li>
                <li><strong>Nama:</strong> {{ $pendaftar->pengguna->nama }}</li>
                <li><strong>Email:</strong> {{ $pendaftar->pengguna->email }}</li>
                <li><strong>Jurusan Pilihan:</strong> {{ $pendaftar->jurusan->nama ?? '-' }}</li>
                <li><strong>Tanggal Pendaftaran:</strong> {{ $pendaftar->tanggal_daftar->format('d F Y, H:i') }}</li>
            </ul>
        </div>

        <h3>🔧 Langkah Selanjutnya:</h3>
        <ol>
            <li>Login ke akun pendaftaran Anda</li>
            <li>Perbaiki data sesuai catatan verifikator di atas</li>
            <li>Upload ulang dokumen yang diperlukan</li>
            <li>Submit ulang untuk verifikasi</li>
        </ol>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('pendaftaran.login') }}" class="btn">Login & Perbaiki Data</a>
        </div>

        <div class="info-box">
            <h3>📞 Butuh Bantuan?</h3>
            <p>Jika Anda memerlukan bantuan atau penjelasan lebih lanjut, silakan hubungi kami:</p>
            <ul>
                <li><strong>Telepon:</strong> (021) 123-4567</li>
                <li><strong>WhatsApp:</strong> 0812-3456-7890</li>
                <li><strong>Email:</strong> info@smkbn666.sch.id</li>
            </ul>
        </div>

        <p><em>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</em></p>
    </div>

    <div class="footer">
        <p>&copy; {{ date('Y') }} SMK Bakti Nusantara 666. All rights reserved.</p>
        <p>Jl. Pendidikan No. 123, Jakarta Selatan</p>
    </div>
</body>
</html>