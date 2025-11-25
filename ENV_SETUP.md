# Konfigurasi Email SMTP untuk OTP

## Setup Gmail SMTP

Untuk menggunakan Gmail sebagai SMTP server, ikuti langkah berikut:

### 1. Buat App Password di Gmail

1. Buka https://myaccount.google.com/
2. Pilih "Security" di menu sebelah kiri
3. Aktifkan "2-Step Verification" jika belum aktif
4. Cari "App passwords" dan klik
5. Pilih "Mail" dan "Windows Computer" (atau device Anda)
6. Copy password yang diberikan

### 2. Update File .env

Tambahkan atau update konfigurasi berikut di file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="PPDB SMK Bakti Nusantara 666"
```

### 3. Jalankan Migration

```bash
php artisan migrate
```

### 4. Test Email

Untuk test apakah email berhasil dikirim, jalankan:

```bash
php artisan tinker
```

Kemudian di tinker shell:

```php
use App\Models\Otp;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;

$otp = Otp::generateOtp('test@example.com');
Mail::to('test@example.com')->send(new SendOtp($otp->otp, 'test@example.com'));
```

## Alternatif: Menggunakan Mailtrap

Jika ingin test tanpa Gmail:

1. Daftar di https://mailtrap.io/
2. Copy SMTP credentials
3. Update .env:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
```

## Fitur OTP yang Tersedia

### 1. Generate OTP
- Kode OTP 6 digit
- Berlaku 10 menit
- Otomatis hapus OTP expired

### 2. Verifikasi OTP
- Validasi kode OTP
- Cek expiration
- Mark sebagai used setelah verifikasi

### 3. Integrasi dengan Register
- User input email → kirim OTP
- User verifikasi OTP → buat akun
- Akun langsung login setelah verifikasi

## File yang Dibuat

1. **Migration**: `database/migrations/2025_01_15_000000_create_otps_table.php`
2. **Model**: `app/Models/Otp.php`
3. **Mail**: `app/Mail/SendOtp.php`
4. **Controller**: `app/Http/Controllers/OtpController.php`
5. **View**: `resources/views/pendaftaran/otp-verify.blade.php`
6. **Email Template**: `resources/views/emails/otp.blade.php`
7. **Routes**: Updated di `routes/web.php`

## Alur Registrasi dengan OTP

1. User klik "Daftar"
2. User isi form registrasi (nama, email, HP, password)
3. Klik "Buat Akun" → OTP dikirim ke email
4. User masuk ke halaman verifikasi OTP
5. User input kode OTP yang diterima
6. Jika valid → akun dibuat dan user login otomatis
7. User diarahkan ke form pendaftaran

## Troubleshooting

### Email tidak terkirim
- Cek konfigurasi MAIL_* di .env
- Pastikan App Password Gmail sudah benar
- Cek log di `storage/logs/laravel.log`

### OTP expired
- OTP berlaku 10 menit
- User bisa klik "Kirim Ulang" untuk mendapat OTP baru

### OTP tidak valid
- Pastikan user input 6 digit
- Cek apakah OTP sudah digunakan sebelumnya
- Cek apakah OTP sudah expired
