# Panduan Sistem OTP (One Time Password)

## Ringkasan Fitur

Sistem OTP telah diintegrasikan ke dalam proses registrasi PPDB. Berikut adalah fitur-fitur yang tersedia:

### ✅ Fitur Utama

1. **Generate OTP Otomatis**
   - Kode 6 digit random
   - Berlaku 10 menit
   - Dikirim via email

2. **Verifikasi Email**
   - User harus verifikasi OTP sebelum akun dibuat
   - Mencegah registrasi dengan email palsu
   - Meningkatkan keamanan

3. **Integrasi Seamless**
   - Terintegrasi dengan form registrasi yang ada
   - User experience yang smooth
   - Validasi otomatis

## Alur Kerja

### Registrasi dengan OTP

```
1. User buka halaman register
   ↓
2. User isi form (nama, email, HP, password)
   ↓
3. User klik "Buat Akun"
   ↓
4. System generate OTP & kirim ke email
   ↓
5. User diarahkan ke halaman verifikasi OTP
   ↓
6. User input kode OTP dari email
   ↓
7. System verifikasi OTP
   ↓
8. Jika valid → Akun dibuat & user login otomatis
   ↓
9. User diarahkan ke form pendaftaran
```

## Instalasi & Setup

### 1. Jalankan Migration

```bash
php artisan migrate
```

Ini akan membuat tabel `otps` dengan struktur:
- `id` - Primary key
- `email` - Email user
- `otp` - Kode OTP 6 digit
- `expires_at` - Waktu kadaluarsa
- `used` - Status penggunaan
- `created_at`, `updated_at` - Timestamps

### 2. Konfigurasi Email

Update file `.env` dengan SMTP credentials:

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

### 3. Test Email

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

## File-File yang Dibuat

### 1. Database Migration
**File**: `database/migrations/2025_01_15_000000_create_otps_table.php`

Membuat tabel untuk menyimpan OTP records.

### 2. Model
**File**: `app/Models/Otp.php`

Methods:
- `generateOtp($email)` - Generate OTP baru
- `verifyOtp($email, $otp)` - Verifikasi OTP
- `isExpired()` - Cek apakah OTP sudah expired

### 3. Mail Class
**File**: `app/Mail/SendOtp.php`

Mengirim email OTP dengan template yang menarik.

### 4. Controller
**File**: `app/Http/Controllers/OtpController.php`

Methods:
- `sendOtp()` - Generate dan kirim OTP
- `verifyOtp()` - Verifikasi OTP dari user

### 5. Views

**OTP Verification Form**: `resources/views/pendaftaran/otp-verify.blade.php`
- Form input OTP 6 digit
- Auto-format input
- Link untuk resend OTP

**Email Template**: `resources/views/emails/otp.blade.php`
- Template email yang profesional
- Menampilkan kode OTP
- Informasi keamanan

### 6. Routes
**File**: `routes/web.php`

Routes yang ditambahkan:
```php
Route::prefix('otp')->name('otp.')->group(function () {
    Route::get('/verify', ...)->name('verify');
    Route::post('/verify', ...)->name('verify.store');
    Route::get('/resend', ...)->name('resend');
});
```

### 7. Controller Updates
**File**: `app/Http/Controllers/PendaftaranController.php`

Methods yang diupdate:
- `register()` - Generate OTP dan redirect ke verifikasi
- `verifyOtp()` - Verifikasi OTP dan buat akun

## Penggunaan

### Untuk User

1. **Registrasi**
   - Buka `/pendaftaran/register`
   - Isi form dengan data lengkap
   - Klik "Buat Akun"

2. **Verifikasi OTP**
   - Cek email untuk kode OTP
   - Buka `/otp/verify`
   - Input kode OTP 6 digit
   - Klik "Verifikasi OTP"

3. **Selesai**
   - Akun berhasil dibuat
   - Otomatis login
   - Lanjut ke form pendaftaran

### Untuk Developer

#### Generate OTP
```php
use App\Models\Otp;

$otp = Otp::generateOtp('user@example.com');
// Returns: Otp model dengan otp dan expires_at
```

#### Verifikasi OTP
```php
use App\Models\Otp;

$isValid = Otp::verifyOtp('user@example.com', '123456');
// Returns: true/false
```

#### Kirim Email OTP
```php
use App\Mail\SendOtp;
use Illuminate\Support\Facades\Mail;

Mail::to('user@example.com')->send(new SendOtp($otp, 'user@example.com'));
```

## Konfigurasi Email

### Gmail SMTP

1. Buka https://myaccount.google.com/
2. Security → 2-Step Verification (aktifkan jika belum)
3. App passwords → Pilih Mail & Windows Computer
4. Copy password yang diberikan
5. Update .env dengan credentials

### Mailtrap (untuk testing)

1. Daftar di https://mailtrap.io/
2. Copy SMTP credentials
3. Update .env:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

## Keamanan

### Best Practices yang Diterapkan

1. **OTP Expiration**
   - OTP hanya berlaku 10 menit
   - Otomatis dihapus setelah expired

2. **One-Time Use**
   - OTP hanya bisa digunakan sekali
   - Marked sebagai `used` setelah verifikasi

3. **Email Validation**
   - Email harus unik
   - Tidak bisa registrasi dengan email yang sudah terdaftar

4. **Secure Storage**
   - OTP disimpan di database
   - Tidak dikirim via URL atau session

5. **Rate Limiting** (Optional)
   - Bisa ditambahkan untuk mencegah brute force
   - Limit jumlah OTP yang bisa digenerate per email

## Troubleshooting

### Email tidak terkirim

**Solusi:**
1. Cek konfigurasi MAIL_* di .env
2. Pastikan SMTP credentials benar
3. Cek firewall/antivirus
4. Lihat log: `storage/logs/laravel.log`

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

## Customization

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

## Integrasi Lebih Lanjut

### Forgot Password dengan OTP

Bisa ditambahkan untuk reset password:

```php
// Di PendaftaranController
public function forgotPassword(Request $request)
{
    $otp = Otp::generateOtp($request->email);
    Mail::to($request->email)->send(new SendOtp($otp->otp, $request->email));
    return redirect()->route('otp.verify');
}
```

### Login dengan OTP

Alternatif login tanpa password:

```php
public function loginWithOtp(Request $request)
{
    $otp = Otp::generateOtp($request->email);
    Mail::to($request->email)->send(new SendOtp($otp->otp, $request->email));
    return redirect()->route('otp.verify');
}
```

## Support

Untuk pertanyaan atau masalah, hubungi admin PPDB.
