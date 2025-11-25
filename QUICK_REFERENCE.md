# 🚀 Quick Reference - Sistem OTP

## ⚡ Quick Start (5 Menit)

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Update .env
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

### 3. Test
```bash
# Buka browser
http://localhost:8000/pendaftaran/register

# Isi form dan klik "Buat Akun"
# Cek email untuk OTP
# Verifikasi OTP
```

## 📁 File Structure

```
database/
  migrations/
    2025_01_15_000000_create_otps_table.php

app/
  Models/
    Otp.php
  Mail/
    SendOtp.php
  Http/
    Controllers/
      OtpController.php
      PendaftaranController.php (updated)

resources/
  views/
    pendaftaran/
      otp-verify.blade.php
    emails/
      otp.blade.php

routes/
  web.php (updated)

Documentation/
  ENV_SETUP.md
  OTP_SYSTEM_GUIDE.md
  IMPLEMENTATION_CHECKLIST.md
  OTP_IMPLEMENTATION_SUMMARY.md
  .env.example.otp
  OTP_README.md
  QUICK_REFERENCE.md (file ini)
```

## 🔗 Routes

```
GET  /otp/verify              → Show OTP verification form
POST /otp/verify              → Verify OTP
GET  /otp/resend              → Resend OTP

POST /pendaftaran/register    → Register with OTP
```

## 🎯 Key Methods

### Model: Otp

```php
// Generate OTP
$otp = Otp::generateOtp('email@example.com');

// Verify OTP
$isValid = Otp::verifyOtp('email@example.com', '123456');

// Check if expired
$otp->isExpired();
```

### Controller: PendaftaranController

```php
// Register (generate OTP)
public function register(Request $request)

// Verify OTP (create account)
public function verifyOtp(Request $request)
```

## 📧 Email Configuration

### Gmail
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

### Mailtrap
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

## 🧪 Test Commands

```bash
# Test email sending
php artisan tinker
use App\Models\Otp;
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;
$otp = Otp::generateOtp('test@example.com');
Mail::to('test@example.com')->send(new SendOtp($otp->otp, 'test@example.com'));

# Check OTP in database
php artisan tinker
App\Models\Otp::all();

# Verify OTP
php artisan tinker
App\Models\Otp::verifyOtp('test@example.com', '123456');
```

## 🔍 Troubleshooting Quick Fixes

| Problem | Solution |
|---------|----------|
| Email tidak terkirim | Cek MAIL_* di .env, coba Mailtrap |
| OTP tidak valid | Pastikan 6 digit, cek expiration |
| Email sudah terdaftar | Gunakan email yang berbeda |
| OTP expired | Tunggu 10 menit atau resend |
| Database error | Jalankan `php artisan migrate` |

## 📊 Database

### Tabel: otps
```sql
CREATE TABLE otps (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  otp VARCHAR(255) NOT NULL,
  expires_at TIMESTAMP NOT NULL,
  used BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  INDEX (email),
  INDEX (expires_at)
);
```

## 🔐 Security Features

- ✅ OTP berlaku 10 menit
- ✅ OTP hanya bisa digunakan sekali
- ✅ Email harus unik
- ✅ Secure storage di database
- ✅ Input validation

## 📝 Alur Registrasi

```
Register Form
  ↓
Generate OTP → Kirim Email
  ↓
OTP Verification Form
  ↓
Verify OTP
  ↓
Create Account → Login → Form Pendaftaran
```

## 🎨 Views

### OTP Verification Form
- Input field untuk OTP (6 digit)
- Auto-format input
- Link untuk resend OTP
- Error handling

### Email Template
- Header dengan branding
- Kode OTP prominent
- Informasi keamanan
- Footer dengan disclaimer

## 💾 Session Data

```php
// Stored during registration
session('register_data') = [
    'nama_lengkap' => '...',
    'email' => '...',
    'no_hp' => '...',
    'password' => '...',
];

// Cleared after verification
session()->forget('register_data');
```

## 🚀 Deployment

```bash
# 1. Push code
git push

# 2. SSH to server
ssh user@server

# 3. Pull code
git pull

# 4. Run migration
php artisan migrate

# 5. Update .env
# Edit .env dengan production credentials

# 6. Test
# Test registrasi dengan OTP
```

## 📞 Common Issues

### Issue: "SQLSTATE[42S02]: Table 'otps' doesn't exist"
**Fix**: Jalankan `php artisan migrate`

### Issue: "Swift_TransportException: Connection could not be established"
**Fix**: Cek MAIL_HOST, PORT, USERNAME, PASSWORD di .env

### Issue: "OTP tidak valid atau sudah kadaluarsa"
**Fix**: Pastikan OTP 6 digit, belum expired, belum digunakan

### Issue: "Email sudah terdaftar"
**Fix**: Gunakan email yang berbeda atau login jika sudah punya akun

## 📚 Documentation Files

| File | Purpose |
|------|---------|
| ENV_SETUP.md | Email configuration guide |
| OTP_SYSTEM_GUIDE.md | Complete system guide |
| IMPLEMENTATION_CHECKLIST.md | Implementation checklist |
| OTP_IMPLEMENTATION_SUMMARY.md | Implementation summary |
| .env.example.otp | Example .env configuration |
| OTP_README.md | Main README |
| QUICK_REFERENCE.md | This file |

## ✅ Implementation Checklist

- [ ] Migration dijalankan
- [ ] Email dikonfigurasi
- [ ] Email testing berhasil
- [ ] Registrasi testing berhasil
- [ ] OTP verification testing berhasil
- [ ] Deployment ke production

## 🎯 Next Steps

1. Jalankan migration: `php artisan migrate`
2. Konfigurasi email di .env
3. Test email sending
4. Test registrasi dengan OTP
5. Deploy ke production

## 📞 Support

- Baca dokumentasi lengkap
- Cek troubleshooting section
- Lihat log: `storage/logs/laravel.log`
- Hubungi admin PPDB

---

**Last Updated**: 2025-01-15
**Version**: 1.0
