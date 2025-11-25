# 🔐 Sistem OTP (One Time Password) - PPDB SMK Bakti Nusantara 666

Sistem OTP telah berhasil diintegrasikan ke dalam proses registrasi PPDB. Berikut adalah panduan lengkap untuk implementasi dan penggunaan.

## 📋 Daftar Isi

1. [Fitur Utama](#fitur-utama)
2. [File yang Dibuat](#file-yang-dibuat)
3. [Instalasi](#instalasi)
4. [Konfigurasi Email](#konfigurasi-email)
5. [Testing](#testing)
6. [Troubleshooting](#troubleshooting)
7. [Dokumentasi Lengkap](#dokumentasi-lengkap)

## ✨ Fitur Utama

### 1. Generate OTP Otomatis
- Kode 6 digit random
- Berlaku 10 menit
- Dikirim via email

### 2. Verifikasi Email
- User harus verifikasi OTP sebelum akun dibuat
- Mencegah registrasi dengan email palsu
- Meningkatkan keamanan

### 3. Integrasi Seamless
- Terintegrasi dengan form registrasi yang ada
- User experience yang smooth
- Validasi otomatis

### 4. Keamanan
- OTP hanya berlaku 10 menit
- OTP hanya bisa digunakan sekali
- Email harus unik
- Secure storage di database

## 📦 File yang Dibuat

### Database & Model
```
database/migrations/2025_01_15_000000_create_otps_table.php
app/Models/Otp.php
```

### Email
```
app/Mail/SendOtp.php
resources/views/emails/otp.blade.php
```

### Controller & Routes
```
app/Http/Controllers/OtpController.php
app/Http/Controllers/PendaftaranController.php (updated)
routes/web.php (updated)
```

### Views
```
resources/views/pendaftaran/otp-verify.blade.php
```

### Documentation
```
ENV_SETUP.md
OTP_SYSTEM_GUIDE.md
IMPLEMENTATION_CHECKLIST.md
OTP_IMPLEMENTATION_SUMMARY.md
.env.example.otp
OTP_README.md (file ini)
```

## 🚀 Instalasi

### Step 1: Jalankan Migration

```bash
php artisan migrate
```

Ini akan membuat tabel `otps` di database.

### Step 2: Konfigurasi Email

Edit file `.env` dan tambahkan konfigurasi email:

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

### Step 3: Test Email

```bash
php artisan tinker
```

```php
use App\Models\Otp;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;

$otp = Otp::generateOtp('test@example.com');
Mail::to('test@example.com')->send(new SendOtp($otp->otp, 'test@example.com'));
```

## 📧 Konfigurasi Email

### Gmail SMTP (Recommended)

1. Buka https://myaccount.google.com/
2. Pilih "Security" di menu sebelah kiri
3. Aktifkan "2-Step Verification" jika belum aktif
4. Cari "App passwords" dan klik
5. Pilih "Mail" dan "Windows Computer"
6. Copy password yang diberikan
7. Update `.env`:

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

### Mailtrap (untuk Testing)

1. Daftar di https://mailtrap.io/
2. Buat project baru
3. Pilih "SMTP Settings"
4. Copy credentials
5. Update `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="PPDB SMK Bakti Nusantara 666"
```

## 🧪 Testing

### Test Registrasi dengan OTP

1. Buka browser: `http://localhost:8000/pendaftaran/register`
2. Isi form registrasi:
   - Nama Lengkap
   - Email
   - Nomor HP
   - Password
3. Klik "Buat Akun"
4. Cek email untuk kode OTP
5. Buka halaman verifikasi OTP
6. Input kode OTP 6 digit
7. Klik "Verifikasi OTP"
8. Akun berhasil dibuat dan user login otomatis

### Test Scenarios

#### Scenario 1: Registrasi Sukses
- ✅ User isi form dengan data valid
- ✅ OTP dikirim ke email
- ✅ User verifikasi OTP
- ✅ Akun berhasil dibuat
- ✅ User login otomatis

#### Scenario 2: Email Sudah Terdaftar
- ✅ User coba registrasi dengan email yang sudah ada
- ✅ Error: "Email sudah terdaftar"

#### Scenario 3: OTP Expired
- ✅ User generate OTP
- ✅ Tunggu 10 menit
- ✅ User coba verifikasi OTP
- ✅ Error: "OTP tidak valid atau sudah kadaluarsa"

#### Scenario 4: OTP Salah
- ✅ User input OTP yang salah
- ✅ Error: "OTP tidak valid atau sudah kadaluarsa"

#### Scenario 5: OTP Sudah Digunakan
- ✅ User verifikasi OTP (berhasil)
- ✅ User coba verifikasi OTP yang sama lagi
- ✅ Error: "OTP tidak valid atau sudah kadaluarsa"

## 🔧 Troubleshooting

### Email tidak terkirim

**Solusi:**
1. Cek konfigurasi MAIL_* di `.env`
2. Pastikan SMTP credentials benar
3. Cek firewall/antivirus
4. Lihat log: `storage/logs/laravel.log`
5. Coba dengan Mailtrap untuk testing

### OTP tidak valid

**Solusi:**
1. Pastikan input 6 digit
2. Cek apakah OTP sudah expired (10 menit)
3. Cek apakah OTP sudah digunakan sebelumnya
4. Kirim ulang OTP

### User tidak menerima email

**Solusi:**
1. Cek folder spam/junk
2. Pastikan email address benar
3. Cek konfigurasi MAIL_FROM_ADDRESS
4. Coba kirim ulang OTP

### Database error

**Solusi:**
1. Pastikan migration sudah dijalankan: `php artisan migrate`
2. Cek apakah tabel `otps` sudah dibuat
3. Cek database connection di `.env`

## 📚 Dokumentasi Lengkap

### File Dokumentasi

1. **ENV_SETUP.md**
   - Konfigurasi email SMTP
   - Setup Gmail App Password
   - Test email sending

2. **OTP_SYSTEM_GUIDE.md**
   - Panduan lengkap sistem OTP
   - Alur kerja registrasi
   - Customization options
   - Troubleshooting

3. **IMPLEMENTATION_CHECKLIST.md**
   - Checklist implementasi
   - Testing scenarios
   - Deployment checklist
   - Troubleshooting guide

4. **OTP_IMPLEMENTATION_SUMMARY.md**
   - Ringkasan implementasi
   - Database schema
   - Quick start guide
   - Fitur tambahan

5. **.env.example.otp**
   - Contoh konfigurasi .env
   - Berbagai pilihan email provider
   - Notes dan troubleshooting

## 🔄 Alur Registrasi

```
User → Register Form
  ↓
Input: Nama, Email, HP, Password
  ↓
Klik "Buat Akun"
  ↓
System: Generate OTP (6 digit)
  ↓
System: Kirim OTP ke email
  ↓
User: Redirect ke halaman OTP Verification
  ↓
User: Input OTP dari email
  ↓
System: Verifikasi OTP
  ↓
Jika Valid:
  - Buat akun di users table
  - Buat pengguna record
  - Login user otomatis
  - Redirect ke form pendaftaran
  ↓
Jika Invalid:
  - Error message
  - User bisa coba lagi atau resend OTP
```

## 💡 Tips & Tricks

### Mengubah Durasi OTP

Edit `app/Models/Otp.php`:
```php
'expires_at' => now()->addMinutes(10), // Ubah 10 menjadi nilai lain
```

### Mengubah Format OTP

Edit `app/Models/Otp.php`:
```php
// Dari 6 digit menjadi 8 digit
$otp = str_pad(random_int(0, 99999999), 8, '0', STR_PAD_LEFT);
```

### Mengubah Template Email

Edit `resources/views/emails/otp.blade.php` sesuai kebutuhan.

## 🎯 Fitur Tambahan (Optional)

### 1. Forgot Password dengan OTP
Bisa ditambahkan untuk reset password dengan OTP verification.

### 2. Login dengan OTP
Alternatif login tanpa password menggunakan OTP.

### 3. SMS OTP
Tambah SMS gateway (Twilio, etc) untuk kirim OTP via SMS.

### 4. Rate Limiting
Limit OTP generation per email untuk prevent abuse.

## 📊 Database Schema

### Tabel: otps
```
Column          | Type      | Nullable | Default
----------------|-----------|----------|----------
id              | bigint    | NO       | auto_increment
email           | string    | NO       | 
otp             | string    | NO       | 
expires_at      | timestamp | NO       | 
used            | boolean   | NO       | false
created_at      | timestamp | YES      | 
updated_at      | timestamp | YES      | 
```

## 🔐 Keamanan

### Best Practices yang Diterapkan

1. **OTP Expiration** - OTP hanya berlaku 10 menit
2. **One-Time Use** - OTP hanya bisa digunakan sekali
3. **Email Validation** - Email harus unik
4. **Secure Storage** - OTP disimpan di database
5. **Input Validation** - OTP harus 6 digit

## 📞 Support

Untuk pertanyaan atau masalah:

1. Baca dokumentasi di folder ini
2. Cek troubleshooting section
3. Lihat log di `storage/logs/laravel.log`
4. Hubungi admin PPDB

## ✅ Checklist Implementasi

- [x] Migration dibuat
- [x] Model dibuat
- [x] Mail class dibuat
- [x] Controller dibuat
- [x] Views dibuat
- [x] Routes ditambahkan
- [x] Documentation dibuat
- [ ] Migration dijalankan (TODO)
- [ ] Email dikonfigurasi (TODO)
- [ ] Testing dilakukan (TODO)
- [ ] Deployment (TODO)

## 🚀 Next Steps

1. **Jalankan Migration**
   ```bash
   php artisan migrate
   ```

2. **Konfigurasi Email**
   - Update `.env` dengan SMTP credentials

3. **Test Email**
   ```bash
   php artisan tinker
   # Test email sending
   ```

4. **Test Registrasi**
   - Buka `/pendaftaran/register`
   - Isi form dan test OTP flow

5. **Deploy ke Production**
   - Push code
   - Jalankan migration
   - Update .env
   - Test di production

---

**Created**: 2025-01-15
**Status**: Ready for Implementation
**Version**: 1.0

Untuk informasi lebih detail, silakan baca dokumentasi lengkap di file-file yang tersedia.
