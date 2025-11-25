<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GelombangController;
use App\Http\Controllers\JurusanController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\GelombangController as AdminGelombangController;
use App\Http\Controllers\Admin\WilayahController as AdminWilayahController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\KepsekController;

// ROUTE HALAMAN UTAMA
// URL: /
Route::get('/', [HomeController::class, 'index'])->name('home');

// API WILAYAH (untuk dropdown Provinsi, Kabupaten, Kecamatan, Kelurahan)
// Tanpa CSRF karena ini API publik
Route::get('/wilayah/regencies/{province_id}', function($province_id) {
    // Ambil data kabupaten berdasarkan provinsi
    return \DB::table('regencies')->where('province_id', $province_id)->get();
});

Route::get('/wilayah/districts/{regency_id}', function($regency_id) {
    // Ambil data kecamatan berdasarkan kabupaten
    return \DB::table('districts')->where('regency_id', $regency_id)->get();
});

Route::get('/wilayah/villages/{district_id}', function($district_id) {
    // Ambil data kelurahan berdasarkan kecamatan
    return \DB::table('villages')
        ->select('id', 'name')
        ->where('district_id', $district_id)
        ->get();
});

// ROUTE UNTUK MELIHAT FILE UPLOAD
// Harus login dulu (middleware auth)

// Route untuk melihat bukti transfer pembayaran
Route::get('/storage/uploads/pembayaran/{filename}', function($filename) {
    // Ambil path file dari storage
    $path = storage_path('app/public/uploads/pembayaran/' . $filename);
    
    // Cek apakah file ada
    if (!file_exists($path)) {
        abort(404); // Tampilkan error 404 jika file tidak ada
    }
    
    // Tampilkan file di browser
    return response()->file($path);
})->middleware('auth'); // Harus login

// Route untuk melihat berkas pendaftaran (ijazah, KK, dll)
Route::get('/storage/uploads/berkas/{filename}', function($filename) {
    // Ambil path file dari storage
    $path = storage_path('app/public/uploads/berkas/' . $filename);
    
    // Cek apakah file ada
    if (!file_exists($path)) {
        abort(404); // Tampilkan error 404 jika file tidak ada
    }
    
    // Tampilkan file di browser
    return response()->file($path);
})->middleware('auth'); // Harus login

// API untuk mendapatkan data berkas pendaftar
Route::get('/api/berkas', function() {
    if (!Auth::check()) {
        return response()->json([]);
    }
    
    $pengguna = \App\Models\Pengguna::where('email', Auth::user()->email)->first();
    $pendaftar = $pengguna ? \App\Models\Pendaftar::where('user_id', $pengguna->id)->first() : null;
    
    \Log::info('API Berkas - User: ' . Auth::user()->email);
    \Log::info('API Berkas - Pengguna: ' . ($pengguna ? $pengguna->id : 'null'));
    \Log::info('API Berkas - Pendaftar: ' . ($pendaftar ? $pendaftar->id : 'null'));
    
    if (!$pendaftar) {
        // Try to get any berkas for testing
        $berkas = \App\Models\PendaftarBerkas::latest()->take(6)->get();
        \Log::info('API Berkas - Using latest berkas: ' . $berkas->count());
        return response()->json($berkas);
    }
    
    $berkas = \App\Models\PendaftarBerkas::where('pendaftar_id', $pendaftar->id)->get();
    \Log::info('API Berkas - Found berkas: ' . $berkas->count());
    return response()->json($berkas);
})->middleware('auth');

// API WILAYAH (alternatif dengan prefix /api)
Route::prefix('api')->group(function () {
    Route::get('/regencies/{province_id}', function($province_id) {
        return DB::table('regencies')->where('province_id', $province_id)->get();
    });
    Route::get('/districts/{regency_id}', function($regency_id) {
        return DB::table('districts')->where('regency_id', $regency_id)->get();
    });
    Route::get('/villages/{district_id}', function($district_id) {
        return DB::table('villages')
            ->select('id', 'name')
            ->where('district_id', $district_id)
            ->get();
    });
});

// HALAMAN STATIS (Tentang, Fasilitas, Prestasi, Kontak)
// Bisa diakses tanpa login
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/fasilitas', [PageController::class, 'fasilitas'])->name('fasilitas');
Route::get('/prestasi', [PageController::class, 'prestasi'])->name('prestasi');
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/ppdb', [GelombangController::class, 'index'])->name('ppdb');

// ROUTE OTP (Verifikasi Email)
// URL: /otp/*
Route::prefix('otp')->name('otp.')->group(function () {
    // Tampilkan halaman input OTP
    Route::get('/verify', function() {
        return view('pendaftaran.otp-verify');
    })->name('verify');
    
    // Proses verifikasi OTP
    Route::post('/verify', [PendaftaranController::class, 'verifyOtp'])->name('verify.store');
    
    // Kirim ulang OTP
    Route::get('/resend', function() {
        return redirect()->route('pendaftaran.register')->with('info', 'Silakan masukkan email Anda untuk mengirim ulang OTP');
    })->name('resend');
});

// ROUTE PENDAFTARAN SISWA BARU
// URL: /pendaftaran/*
Route::prefix('pendaftaran')->name('pendaftaran.')->group(function () {
    
    // Halaman awal pendaftaran
    Route::get('/', [PendaftaranController::class, 'index'])->name('index');
    
    // Redirect dashboard ke status
    Route::get('/dashboard', function() {
        return redirect()->route('pendaftaran.status');
    })->middleware('auth')->name('dashboard');
    
    // Redirect home
    Route::get('/home', function() {
        if (Auth::check()) {
            return redirect()->route('pendaftaran.status');
        }
        return redirect()->route('home');
    })->name('pendaftaran.home');

    // ROUTE REGISTRASI (Tanpa Login)
    Route::get('/register', [PendaftaranController::class, 'showRegister'])->name('register');
    Route::post('/register', [PendaftaranController::class, 'register'])->name('register.store');

    // ROUTE LOGIN (Tanpa Login)
    Route::get('/login', [PendaftaranController::class, 'showLogin'])->name('login');
    Route::post('/login', [PendaftaranController::class, 'login'])->name('login.store');

    // ROUTE YANG HARUS LOGIN (middleware: pendaftar.auth)
    Route::middleware('pendaftar.auth')->group(function () {
        
        // Form pendaftaran
        Route::get('/form', [PendaftaranController::class, 'showForm'])->name('form');
        Route::post('/form', [PendaftaranController::class, 'storeForm'])->name('form.store');
        
        // Edit data pendaftaran
        Route::get('/edit', [PendaftaranController::class, 'editForm'])->name('edit');
        Route::post('/edit', [PendaftaranController::class, 'updateForm'])->name('edit.store');

        // Upload berkas
        Route::get('/upload', [PendaftaranController::class, 'showUpload'])->name('upload');
        Route::post('/upload', [PendaftaranController::class, 'storeUpload'])->name('upload.store');

        // Lihat status pendaftaran
        Route::get('/status', [PendaftaranController::class, 'showStatus'])->name('status');
        
        // Profile pengguna
        Route::get('/profile', [PendaftaranController::class, 'showProfile'])->name('profile');
        
        // Keep session alive (agar tidak logout otomatis)
        Route::post('/keep-alive', [PendaftaranController::class, 'keepAlive'])->name('keep-alive');
        
        // Pembayaran
        Route::get('/pembayaran', [PendaftaranController::class, 'showPembayaran'])->name('pembayaran');
        Route::post('/pembayaran', [PendaftaranController::class, 'storePembayaran'])->name('pembayaran.store');

        // Logout
        Route::post('/logout', [PendaftaranController::class, 'logout'])->name('logout');
        
        // Cetak kartu siswa
        Route::get('/cetak-kartu', [PendaftaranController::class, 'cetakKartu'])->name('cetak-kartu');
    });
});

// ROUTE ADMIN
// URL: /admin/*
// Untuk: Admin, Verifikator, Keuangan, Kepsek
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Login admin (tanpa middleware)
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'loginPost'])->name('login.post');
    
    // Route yang harus login (middleware: auth)
    Route::middleware('auth')->group(function () {
        
        // Dashboard admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Logout admin
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        
        // DATA MASTER (Hanya Admin)
        // CRUD: Create, Read, Update, Delete
        Route::resource('jurusan', AdminJurusanController::class);
        Route::resource('pengguna', PenggunaController::class)->except(['show']);
        Route::resource('gelombang', AdminGelombangController::class)->except(['show']);
        Route::resource('wilayah', AdminWilayahController::class)->except(['show']);
        
        // KELOLA PENDAFTAR (Admin & Verifikator)
        Route::get('pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
        Route::get('pendaftar/{pendaftar}', [PendaftarController::class, 'show'])->name('pendaftar.show');
        Route::post('pendaftar/{pendaftar}/verifikasi', [PendaftarController::class, 'verifikasi'])->name('pendaftar.verifikasi');
        Route::get('verifikasi', [PendaftarController::class, 'verifikasi_index'])->name('verifikasi.index');
        
        // KELOLA PEMBAYARAN (Admin & Keuangan)
        Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('pembayaran/verifikasi', [PembayaranController::class, 'verifikasi_index'])->name('pembayaran.verifikasi');
        Route::get('pembayaran/rekap', [PembayaranController::class, 'rekap'])->name('pembayaran.rekap');
        Route::post('pembayaran/{pendaftar}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi.store');
        
        // LAPORAN (Admin & Kepsek)
        Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('laporan/grafik', [LaporanController::class, 'grafik'])->name('laporan.grafik');
        Route::get('laporan/diterima', [LaporanController::class, 'diterima'])->name('laporan.diterima');
        Route::get('laporan/asal-sekolah', [LaporanController::class, 'asalSekolah'])->name('laporan.asal-sekolah');
        Route::get('laporan/wilayah', [LaporanController::class, 'wilayah'])->name('laporan.wilayah');
        
        // LOG AKTIVITAS (Admin only)
        Route::get('log-aktivitas/admin-login', [\App\Http\Controllers\Admin\LogAktivitasController::class, 'adminLogin'])->name('log-aktivitas.admin-login');
        Route::get('log-aktivitas/user-login', [\App\Http\Controllers\Admin\LogAktivitasController::class, 'userLogin'])->name('log-aktivitas.user-login');
    });
});

// ROUTE KEUANGAN
// URL: /keuangan/*
// Untuk: Staff Keuangan
Route::prefix('keuangan')->name('keuangan.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KeuanganController::class, 'dashboard'])->name('dashboard');
    Route::get('/verifikasi', [KeuanganController::class, 'verifikasiPembayaran'])->name('verifikasi');
    Route::get('/rekap', [KeuanganController::class, 'rekapPembayaran'])->name('rekap');
    Route::get('/daftar', [KeuanganController::class, 'daftarPembayaran'])->name('daftar');
    Route::post('/verifikasi/{id}', [KeuanganController::class, 'verifikasi'])->name('verifikasi.store');
});

// ROUTE VERIFIKATOR
// URL: /verifikator/*
// Untuk: Verifikator Administrasi
Route::prefix('verifikator')->name('verifikator.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [VerifikatorController::class, 'dashboard'])->name('dashboard');
    Route::get('/daftar', [VerifikatorController::class, 'daftarPendaftar'])->name('daftar');
    Route::get('/verifikasi', [VerifikatorController::class, 'verifikasiBerkas'])->name('verifikasi');
    Route::get('/detail/{id}', [VerifikatorController::class, 'detail'])->name('detail');
    Route::get('/edit/{id}', [VerifikatorController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [VerifikatorController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [VerifikatorController::class, 'destroy'])->name('destroy');
    Route::post('/verifikasi/{id}', [VerifikatorController::class, 'verifikasi'])->name('verifikasi.store');
});

// ROUTE KEPALA SEKOLAH
// URL: /kepsek/*
// Untuk: Kepala Sekolah (Laporan & Statistik)
Route::prefix('kepsek')->name('kepsek.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [KepsekController::class, 'dashboard'])->name('dashboard');
    Route::get('/daftar-calon', [KepsekController::class, 'daftarCalonSiswa'])->name('daftar-calon');
    Route::get('/diterima', [KepsekController::class, 'calonSiswaDiterima'])->name('diterima');
    Route::get('/rekap-pembayaran', [KepsekController::class, 'rekapPembayaran'])->name('rekap-pembayaran');
    Route::get('/asal-sekolah', [KepsekController::class, 'dataAsalSekolah'])->name('asal-sekolah');
    Route::get('/asal-wilayah', [KepsekController::class, 'asalWilayah'])->name('asal-wilayah');
});

// ROUTE DEFAULT (Redirect)
// Jika user akses /login atau /register, arahkan ke pendaftaran
Route::get('/login', function() {
    return redirect()->route('pendaftaran.login');
})->name('login');

Route::post('/login', [PendaftaranController::class, 'login']);

Route::get('/register', function() {
    return redirect()->route('pendaftaran.register');
})->name('register');
