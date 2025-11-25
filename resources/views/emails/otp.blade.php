<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2c3e50; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .otp-box { background: white; border: 2px solid #3498db; padding: 20px; text-align: center; margin: 20px 0; border-radius: 5px; }
        .otp-code { font-size: 32px; font-weight: bold; color: #3498db; letter-spacing: 5px; }
        .footer { background: #ecf0f1; padding: 15px; text-align: center; font-size: 12px; color: #7f8c8d; border-radius: 0 0 5px 5px; }
        .warning { color: #e74c3c; font-size: 12px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Verifikasi Email PPDB</h2>
            <p>SMK Bakti Nusantara 666</p>
        </div>
        
        <div class="content">
            <p>Halo,</p>
            <p>Anda telah meminta kode OTP untuk verifikasi email. Gunakan kode di bawah ini untuk melanjutkan proses pendaftaran:</p>
            
            <div class="otp-box">
                <p>Kode OTP Anda:</p>
                <div class="otp-code">{{ $otp }}</div>
            </div>
            
            <p><strong>Informasi Penting:</strong></p>
            <ul>
                <li>Kode OTP berlaku selama 10 menit</li>
                <li>Jangan bagikan kode ini kepada siapapun</li>
                <li>Jika Anda tidak meminta kode ini, abaikan email ini</li>
            </ul>
            
            <p class="warning">⚠️ Kode OTP ini hanya berlaku untuk email: <strong>{{ $email }}</strong></p>
        </div>
        
        <div class="footer">
            <p>&copy; 2025 SMK Bakti Nusantara 666. Semua hak dilindungi.</p>
            <p>Jangan membalas email ini. Hubungi admin jika ada pertanyaan.</p>
        </div>
    </div>
</body>
</html>
