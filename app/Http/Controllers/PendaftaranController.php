<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Pendaftar;
use App\Models\PendaftarDataSiswa;
use App\Models\PendaftarDataOrtu;
use App\Models\PendaftarAsalSekolah;
use App\Models\PendaftarBerkas;
use App\Models\Otp;
use App\Models\Gelombang;
use App\Models\Jurusan;
use App\Mail\SendOtp;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    // FUNGSI: Tampilkan halaman awal pendaftaran
    public function index()
    {
        return view('pendaftaran.index');
    }

    // FUNGSI: Tampilkan form registrasi
    public function showRegister()
    {
        return view('pendaftaran.register');
    }

    // FUNGSI: Proses registrasi user baru
    // STEP 1: User isi form registrasi
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'email' => 'required|email|max:120|unique:users,email|unique:pengguna,email',
            'no_hp' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'nama_lengkap.required' => 'Kolom nama lengkap wajib diisi.',
            'nama_lengkap.max' => 'Nama lengkap maksimal 100 karakter.',
            'email.required' => 'Kolom email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_hp.required' => 'Kolom nomor HP wajib diisi.',
            'password.required' => 'Kolom password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        try {
            // STEP 1: Buat kode OTP (6 angka acak) dan kirim ke email
            $otp = Otp::generateOtp($request->email);
            Mail::to($request->email)->send(new SendOtp($otp->otp, $request->email));
            
            // STEP 2: Simpan data registrasi sementara di session (belum masuk database)
            session([
                'register_data' => [
                    'nama_lengkap' => $request->nama_lengkap,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'password' => $request->password,
                ],
                'otp_email' => $request->email
            ]);
            
            // STEP 3: Arahkan ke halaman verifikasi OTP
            return redirect()->route('otp.verify')->with('success', 'OTP telah dikirim ke email Anda');
        } catch (\Exception $e) {
            // Jika ada error, catat di log dan tampilkan pesan error
            \Log::error('Registration error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.'])->withInput();
        }
    }
    
    // FUNGSI: Verifikasi kode OTP yang diinput user
    // STEP 2: User input kode OTP dari email
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);
        
        // STEP 1: Cek apakah kode OTP benar dan belum kadaluarsa
        if (!Otp::verifyOtp($request->email, $request->otp)) {
            return back()->withErrors(['otp' => 'OTP tidak valid atau sudah kadaluarsa']);
        }
        
        // STEP 2: Ambil data registrasi dari session
        $registerData = session('register_data');
        if (!$registerData) {
            return redirect()->route('pendaftaran.register')->withErrors(['error' => 'Data registrasi tidak ditemukan']);
        }
        
        try {
            // STEP 3: Buat akun user di tabel USERS (untuk login Laravel)
            $user = User::create([
                'name' => $registerData['nama_lengkap'],
                'email' => $registerData['email'],
                'password' => Hash::make($registerData['password']), // Password di-enkripsi
            ]);

            // STEP 4: Buat data pengguna di tabel PENGGUNA (data lengkap)
            Pengguna::create([
                'nama' => $registerData['nama_lengkap'],
                'email' => $registerData['email'],
                'hp' => $registerData['no_hp'],
                'password_hash' => Hash::make($registerData['password']),
                'role' => 'pendaftar', // Role otomatis jadi pendaftar
                'aktif' => 1, // Status aktif
            ]);

            // STEP 5: Login otomatis setelah registrasi berhasil
            Auth::login($user);
            
            // STEP 6: Hapus data session karena sudah tidak diperlukan
            session()->forget('register_data');
            // STEP 7: Arahkan ke halaman form pendaftaran
            return redirect()->route('pendaftaran.form')->with('success', 'Email berhasil diverifikasi! Silakan lengkapi formulir pendaftaran.');
        } catch (\Exception $e) {
            // Jika ada error, catat di log dan tampilkan pesan error
            \Log::error('OTP verification error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat verifikasi. Silakan coba lagi.']);
        }
    }

    // FUNGSI: Tampilkan form login
    public function showLogin()
    {
        return view('pendaftaran.login');
    }

    // FUNGSI: Proses login user
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // STEP 1: Cari user berdasarkan email di tabel USERS
        $user = User::where('email', $request->email)->first();
        
        // STEP 2: Cari data pengguna di tabel PENGGUNA
        $pengguna = Pengguna::where('email', $request->email)->first();
        
        if ($user) {
            $passwordMatches = false;
            
            // STEP 3: Cek apakah password sudah di-enkripsi atau masih plain text
            if (str_starts_with($user->password, '$2y$')) {
                // Password sudah di-enkripsi, cek dengan Hash::check
                $passwordMatches = Hash::check($request->password, $user->password);
            } else {
                // Password masih plain text (untuk backward compatibility)
                $passwordMatches = ($user->password === $request->password);
                
                // Jika cocok, update password ke format enkripsi
                if ($passwordMatches) {
                    $user->update(['password' => Hash::make($request->password)]);
                }
            }
            
            // STEP 4: Jika password cocok, login user
            if ($passwordMatches) {
                Auth::login($user);
                $request->session()->regenerate(); // Generate session baru untuk keamanan
                
                // Log login activity
                if ($pengguna) {
                    \App\Models\LogAktivitas::log($pengguna->id, 'LOGIN', 'USER_LOGIN', [
                        'email' => $pengguna->email
                    ]);
                }
                
                // STEP 5: Cek apakah user sudah punya data pendaftar
                $pendaftar = $pengguna ? Pendaftar::where('user_id', $pengguna->id)->first() : null;
                
                // STEP 6: Jika sudah ada data pendaftar, arahkan ke halaman status
                if ($pendaftar) {
                    return redirect()->route('pendaftaran.status');
                }
                
                // STEP 7: Jika belum ada data pendaftar, arahkan ke form pendaftaran
                return redirect()->intended(route('pendaftaran.form'));
            }
        }

        // Jika email atau password salah, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    // FUNGSI: Tampilkan form pendaftaran
    public function showForm()
    {
        if (!Auth::check()) {
            return redirect()->route('pendaftaran.login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }
        
        // STEP 1: Ambil data pengguna yang sedang login
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        // Buat data pengguna jika belum ada
        if (!$pengguna) {
            $pengguna = Pengguna::create([
                'nama' => Auth::user()->name,
                'email' => Auth::user()->email,
                'hp' => '-',
                'password_hash' => Auth::user()->password,
                'role' => 'pendaftar',
                'aktif' => 1,
            ]);
        }
        
        // STEP 2: Cek apakah user sudah punya data pendaftar
        $pendaftar = $pengguna ? Pendaftar::where('user_id', $pengguna->id)->first() : null;
        
        // STEP 3: Jika sudah ada data pendaftar, arahkan ke halaman edit
        if ($pendaftar) {
            return redirect()->route('pendaftaran.edit')->with('info', 'Anda sudah memiliki data pendaftaran. Silakan edit jika diperlukan.');
        }
        
        // STEP 4: Ambil data jurusan yang aktif untuk ditampilkan di form
        $jurusans = Jurusan::where('aktif', 1)->get();
        
        // STEP 5: Ambil data provinsi untuk dropdown wilayah
        $provinces = \DB::table('provinces')->get();
        
        // STEP 6: Tampilkan form pendaftaran
        return view('pendaftaran.form', compact('jurusans', 'pendaftar', 'provinces'));
    }

    // ========================================
    // FUNGSI: Simpan data form pendaftaran
    // ========================================
    public function storeForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'tmp_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'village_id' => 'required|string|max:10',
            'npsn' => 'required|string|max:20',
            'kabupaten_sekolah' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_pilihan_1' => 'required|exists:jurusan,id',
            'jurusan_pilihan_2' => 'required|exists:jurusan,id|different:jurusan_pilihan_1',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_hp_ortu' => 'required|string|max:20',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
        ], [
            'jurusan_pilihan_2.different' => 'Jurusan pilihan 2 harus berbeda dengan jurusan pilihan 1.',
        ]);

        try {
            // STEP 1: Cek apakah user sudah login
            if (!Auth::check()) {
                return redirect()->route('pendaftaran.login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
            }
            
            // STEP 2: Ambil data pengguna yang sedang login
            $pengguna = Pengguna::where('email', Auth::user()->email)->first();
            
            // STEP 3: Jika data pengguna tidak ada, buat otomatis
            if (!$pengguna) {
                \Log::warning('Creating missing Pengguna record for email: ' . Auth::user()->email);
                $pengguna = Pengguna::create([
                    'nama' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'hp' => '-',
                    'password_hash' => Auth::user()->password,
                    'role' => 'pendaftar',
                    'aktif' => 1,
                ]);
            }

            // STEP 2: Ambil gelombang pendaftaran yang sedang aktif
            $currentGelombang = Gelombang::getCurrentGelombang();
            
            if (!$currentGelombang) {
                return back()->withErrors(['error' => 'Tidak ada gelombang pendaftaran yang aktif saat ini.'])->withInput();
            }
            
            // STEP 3: Simpan harga pendaftaran di session untuk pembayaran nanti
            session(['harga_pendaftaran' => $currentGelombang->harga]);

            // STEP 4: Buat data PENDAFTAR (data utama)
            $pendaftar = Pendaftar::updateOrCreate(
                ['user_id' => $pengguna->id],
                [
                    'tanggal_daftar' => now(),
                    'no_pendaftaran' => $this->generateNoPendaftaran(),
                    'gelombang_id' => $currentGelombang->id,
                    'jurusan_id' => $request->jurusan_pilihan_1,
                    'jurusan_pilihan_2' => $request->jurusan_pilihan_2,
                    'status' => 'DRAFT',
                ]
            );

            $wilayahData = $this->getWilayahIdFromVillage($request->village_id);
            
            PendaftarDataSiswa::updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nik' => $request->nik,
                    'nisn' => $request->nisn,
                    'nama' => $request->nama_lengkap,
                    'jk' => $request->jenis_kelamin,
                    'tmp_lahir' => $request->tmp_lahir,
                    'tgl_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'kode_pos' => $wilayahData['kode_pos'],
                    'village_id' => $request->village_id,
                    'wilayah_id' => $wilayahData['wilayah_id'],
                ]
            );

            // Create/update data ortu
            PendaftarDataOrtu::updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nama_ayah' => $request->nama_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah ?? 'Tidak Diketahui',
                    'hp_ayah' => $request->no_hp_ortu,
                    'nama_ibu' => $request->nama_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu ?? 'Tidak Diketahui',
                    'hp_ibu' => $request->no_hp_ortu,
                ]
            );

            // Create/update asal sekolah
            PendaftarAsalSekolah::updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->asal_sekolah,
                    'kabupaten' => $request->kabupaten_sekolah,
                    'nilai_rata' => 0.00,
                ]
            );

            return redirect()->route('pendaftaran.upload')->with('success', 'Data berhasil disimpan! Silakan upload berkas persyaratan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()])->withInput();
        }
    }

    public function showUpload()
    {
        if (!Auth::check()) {
            return redirect()->route('pendaftaran.login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }
        
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        if (!$pengguna) {
            $pengguna = Pengguna::create([
                'nama' => Auth::user()->name,
                'email' => Auth::user()->email,
                'hp' => '-',
                'password_hash' => Auth::user()->password,
                'role' => 'pendaftar',
                'aktif' => 1,
            ]);
        }
        $pendaftar = $pengguna ? Pendaftar::with(['dataSiswa', 'dataOrtu', 'asalSekolah'])->where('user_id', $pengguna->id)->first() : null;
        
        if (!$pendaftar) {
            return redirect()->route('pendaftaran.form')->with('error', 'Silakan lengkapi formulir pendaftaran terlebih dahulu.');
        }
        
        // Check if required data exists
        if (!$pendaftar->dataSiswa || !$pendaftar->dataOrtu || !$pendaftar->asalSekolah) {
            return redirect()->route('pendaftaran.edit')->with('error', 'Data pendaftaran belum lengkap. Silakan lengkapi terlebih dahulu.');
        }
        
        $berkas = PendaftarBerkas::where('pendaftar_id', $pendaftar->id)->get();
        
        // Debug: Log berkas data
        \Log::info('Berkas data for pendaftar ' . $pendaftar->id . ':', $berkas->toArray());
        
        return view('pendaftaran.upload', compact('berkas', 'pendaftar'));
    }

    public function storeUpload(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('pendaftaran.login')->withErrors(['error' => 'Silakan login terlebih dahulu.']);
        }
        
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        if (!$pengguna) {
            $pengguna = Pengguna::create([
                'nama' => Auth::user()->name,
                'email' => Auth::user()->email,
                'hp' => '-',
                'password_hash' => Auth::user()->password,
                'role' => 'pendaftar',
                'aktif' => 1,
            ]);
        }
        $pendaftar = Pendaftar::where('user_id', $pengguna->id ?? 0)->first();
        $berkas = $pendaftar ? PendaftarBerkas::where('pendaftar_id', $pendaftar->id)->get() : collect();
        
        $rules = [
            'berkas_ijazah' => ($berkas->where('jenis', 'IJAZAH')->first() ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'berkas_kk' => ($berkas->where('jenis', 'KK')->first() ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'berkas_akta' => ($berkas->where('jenis', 'AKTA')->first() ? 'nullable' : 'required') . '|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'pas_foto' => ($berkas->where('jenis', 'FOTO')->first() ? 'nullable' : 'required') . '|file|mimes:jpg,jpeg,png|max:10240',
            'sertifikat_prestasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'sktm' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10240',
        ];
        
        $request->validate($rules);

        try {
            if (!$pendaftar) {
                return back()->withErrors(['error' => 'Data pendaftaran tidak ditemukan. Silakan lengkapi formulir terlebih dahulu.']);
            }
            
            // Handle file uploads to pendaftar_berkas table
            $files = ['berkas_ijazah', 'berkas_kk', 'berkas_akta', 'pas_foto', 'sertifikat_prestasi', 'sktm'];
            
            foreach ($files as $file) {
                if ($request->hasFile($file)) {
                    $filePath = $request->file($file)->store('uploads/berkas', 'public');
                    $fileSize = $request->file($file)->getSize() / 1024; // KB
                    $fileName = $request->file($file)->getClientOriginalName();
                    
                    $jenisMap = [
                        'berkas_ijazah' => 'IJAZAH',
                        'berkas_kk' => 'KK',
                        'berkas_akta' => 'AKTA',
                        'pas_foto' => 'FOTO',
                        'sertifikat_prestasi' => 'LAINNYA',
                        'sktm' => 'LAINNYA'
                    ];
                    
                    // Delete existing file of same type to prevent duplicates
                    if (in_array($file, ['sertifikat_prestasi', 'sktm'])) {
                        // For LAINNYA type, delete based on file type identifier
                        $identifier = $file === 'sertifikat_prestasi' ? 'prestasi' : 'sktm';
                        PendaftarBerkas::where('pendaftar_id', $pendaftar->id)
                                      ->where('jenis', 'LAINNYA')
                                      ->where('nama_file', 'LIKE', '%' . $identifier . '%')
                                      ->delete();
                    } else {
                        PendaftarBerkas::where('pendaftar_id', $pendaftar->id)
                                      ->where('jenis', $jenisMap[$file])
                                      ->delete();
                    }
                    
                    // Add identifier for LAINNYA type files
                    $finalFileName = $fileName;
                    if (in_array($file, ['sertifikat_prestasi', 'sktm'])) {
                        $identifier = $file === 'sertifikat_prestasi' ? 'prestasi' : 'sktm';
                        $finalFileName = $identifier . '_' . $fileName;
                    }
                    
                    PendaftarBerkas::create([
                        'pendaftar_id' => $pendaftar->id,
                        'jenis' => $jenisMap[$file] ?? 'LAINNYA',
                        'nama_file' => $finalFileName,
                        'url' => $filePath,
                        'ukuran_kb' => (int) $fileSize,
                        'valid' => 0,
                    ]);
                }
            }

            // Update status to submitted only if all required files are uploaded
            $requiredFiles = ['IJAZAH', 'KK', 'AKTA', 'FOTO'];
            $uploadedFiles = PendaftarBerkas::where('pendaftar_id', $pendaftar->id)
                ->whereIn('jenis', $requiredFiles)
                ->pluck('jenis')
                ->toArray();
            
            if (count($uploadedFiles) >= 4) {
                $pendaftar->update(['status' => 'SUBMIT']);
            }
            
            return redirect()->route('pendaftaran.status')->with('success', 'Berkas berhasil diupload! Pendaftaran Anda telah selesai.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat upload berkas: ' . $e->getMessage()])->withInput();
        }
    }

    public function showStatus()
    {
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        // If this is an AJAX request for session keep-alive, just return success
        if (request()->ajax()) {
            return response()->json(['status' => 'success']);
        }
        
        // Check if user is admin/staff accessing specific pendaftar
        if ($pengguna && in_array($pengguna->role, ['admin', 'verifikator_adm', 'keuangan', 'kepsek'])) {
            // For admin, get the pendaftar by no_pendaftaran from request or session
            $noPendaftaran = request('no_pendaftaran') ?? session('view_pendaftar_no');
            if ($noPendaftaran) {
                $pendaftar = Pendaftar::with(['gelombang', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'berkas', 'pengguna'])
                    ->where('no_pendaftaran', $noPendaftaran)->first();
            } else {
                // Default to first pendaftar for demo
                $pendaftar = Pendaftar::with(['gelombang', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'berkas', 'pengguna'])
                    ->where('no_pendaftaran', 'PPDB2025110001')->first();
            }
        } else {
            // For regular users, get their own pendaftar data
            $pendaftar = $pengguna ? Pendaftar::with(['gelombang', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'berkas', 'pengguna'])->where('user_id', $pengguna->id)->first() : null;
        }
        
        // Set harga in session if pendaftar exists
        if ($pendaftar && $pendaftar->gelombang) {
            session(['harga_pendaftaran' => $pendaftar->gelombang->harga]);
        }
        
        return view('pendaftaran.status', compact('pendaftar'));
    }

    private function generateNoPendaftaran()
    {
        $year = date('Y');
        $month = date('m');
        $lastNumber = Pendaftar::whereYear('created_at', $year)
                              ->whereMonth('created_at', $month)
                              ->count() + 1;
        
        return sprintf('PPDB%s%s%04d', $year, $month, $lastNumber);
    }
    
    private function getPostalCodeByDistrict($districtId)
    {
        // Mapping kode pos berdasarkan district_id
        $postalCodeMap = [
            // Kota Bekasi
            '3275010' => '17112', // BEKASI UTARA - HARAPAN JAYA
            '3275020' => '17143', // BEKASI SELATAN - PEKAYON JAYA
            '3275030' => '17113', // BEKASI TIMUR - AREN JAYA
            '3275040' => '17113', // BEKASI TIMUR
            '3275050' => '17141', // BEKASI SELATAN
            '3275060' => '17134', // BEKASI BARAT
            '3275070' => '17122', // BEKASI UTARA
            
            // Kabupaten Bandung
            '3204010' => '40391', // CIWIDEY
            '3204290' => '40625', // CILEUNYI
            
            // Kabupaten Bekasi
            '3216022' => '17530', // CIKARANG PUSAT
            
            // Kota Bandung
            '3273110' => '40614', // CIBIRU
            
            // Jakarta Selatan
            '3171060' => '12190', // KEBAYORAN BARU
            
            // Kabupaten Indramayu
            '3212041' => '45264', // TERISI
        ];
        
        return $postalCodeMap[$districtId] ?? '00000';
    }
    
    private function getWilayahIdFromVillage($villageId)
    {
        $village = \DB::table('villages')
                      ->join('districts', 'villages.district_id', '=', 'districts.id')
                      ->join('regencies', 'districts.regency_id', '=', 'regencies.id')
                      ->join('provinces', 'regencies.province_id', '=', 'provinces.id')
                      ->where('villages.id', $villageId)
                      ->select(
                          'provinces.name as provinsi', 
                          'regencies.name as kabupaten', 
                          'districts.name as kecamatan', 
                          'districts.id as district_id',
                          'villages.name as kelurahan'
                      )
                      ->first();
        
        if (!$village) {
            return ['wilayah_id' => null, 'kode_pos' => '00000'];
        }
        
        // Get postal code based on district
        $kodePos = $this->getPostalCodeByDistrict($village->district_id);
        
        $wilayah = \DB::table('wilayah')
                      ->where('provinsi', $village->provinsi)
                      ->where('kabupaten', $village->kabupaten)
                      ->where('kecamatan', $village->kecamatan)
                      ->where('kelurahan', $village->kelurahan)
                      ->first();
        
        if ($wilayah) {
            // Update kode pos jika belum ada
            if (empty($wilayah->kodepos)) {
                \DB::table('wilayah')
                    ->where('id', $wilayah->id)
                    ->update(['kodepos' => $kodePos, 'updated_at' => now()]);
            }
            return ['wilayah_id' => $wilayah->id, 'kode_pos' => $kodePos];
        }
        
        $wilayahId = \DB::table('wilayah')->insertGetId([
            'provinsi' => $village->provinsi,
            'kabupaten' => $village->kabupaten,
            'kecamatan' => $village->kecamatan,
            'kelurahan' => $village->kelurahan,
            'kodepos' => $kodePos,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        return ['wilayah_id' => $wilayahId, 'kode_pos' => $kodePos];
    }

    public function editForm()
    {
        if (!Auth::check()) {
            return redirect()->route('pendaftaran.login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        $pendaftar = $pengguna ? Pendaftar::with(['dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'jurusanPilihan2', 'gelombang'])->where('user_id', $pengguna->id)->first() : null;
        
        if (!$pendaftar) {
            return redirect()->route('pendaftaran.form')->with('error', 'Data pendaftaran tidak ditemukan. Silakan lengkapi formulir terlebih dahulu.');
        }
        
        $jurusans = Jurusan::where('aktif', 1)->get();
        
        return view('pendaftaran.edit', compact('pendaftar', 'jurusans'));
    }

    public function updateForm(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20', 
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'npsn' => 'required|string|max:20',
            'kabupaten_sekolah' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_pilihan_1' => 'required|exists:jurusan,id',
            'jurusan_pilihan_2' => 'required|exists:jurusan,id|different:jurusan_pilihan_1',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'no_hp_ortu' => 'required|string|max:20',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
        ], [
            'jurusan_pilihan_2.different' => 'Jurusan pilihan 2 harus berbeda dengan jurusan pilihan 1.',
        ]);

        try {
            $pengguna = Pengguna::where('email', Auth::user()->email)->first();
            $pendaftar = Pendaftar::where('user_id', $pengguna->id)->first();

            if (!$pendaftar) {
                return back()->withErrors(['error' => 'Data pendaftaran tidak ditemukan.'])->withInput();
            }

            // Get current gelombang automatically
            $currentGelombang = Gelombang::getCurrentGelombang();
            
            if (!$currentGelombang) {
                return back()->withErrors(['error' => 'Tidak ada gelombang pendaftaran yang aktif saat ini.'])->withInput();
            }

            // Update pendaftar
            $pendaftar->update([
                'jurusan_id' => $request->jurusan_pilihan_1,
                'jurusan_pilihan_2' => $request->jurusan_pilihan_2,
                'gelombang_id' => $currentGelombang->id
            ]);
            
            $dataSiswa = $pendaftar->dataSiswa;
            $wilayahData = ['wilayah_id' => $dataSiswa->wilayah_id, 'kode_pos' => $dataSiswa->kode_pos];
            if ($dataSiswa->village_id) {
                $wilayahData = $this->getWilayahIdFromVillage($dataSiswa->village_id);
            }
            
            $pendaftar->dataSiswa()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nik' => $request->nik,
                    'nisn' => $request->nisn,
                    'nama' => $request->nama_lengkap,
                    'jk' => $request->jenis_kelamin,
                    'tmp_lahir' => $request->tempat_lahir,
                    'tgl_lahir' => $request->tanggal_lahir,
                    'alamat' => $request->alamat,
                    'kode_pos' => $wilayahData['kode_pos'],
                    'village_id' => $dataSiswa->village_id ?? null,
                    'wilayah_id' => $wilayahData['wilayah_id'],
                ]
            );
            
            // Update data ortu
            $pendaftar->dataOrtu()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'nama_ayah' => $request->nama_ayah,
                    'pekerjaan_ayah' => $request->pekerjaan_ayah ?? 'Tidak Diketahui',
                    'hp_ayah' => $request->no_hp_ortu,
                    'nama_ibu' => $request->nama_ibu,
                    'pekerjaan_ibu' => $request->pekerjaan_ibu ?? 'Tidak Diketahui',
                    'hp_ibu' => $request->no_hp_ortu,
                ]
            );
            
            // Update asal sekolah
            $pendaftar->asalSekolah()->updateOrCreate(
                ['pendaftar_id' => $pendaftar->id],
                [
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->asal_sekolah,
                    'kabupaten' => $request->kabupaten_sekolah,
                    'nilai_rata' => 0.00,
                ]
            );

            return redirect()->route('pendaftaran.upload')->with('success', 'Data berhasil diperbarui! Silakan periksa berkas persyaratan.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()])->withInput();
        }
    }

    public function keepAlive(Request $request)
    {
        if (Auth::check()) {
            return response()->json(['status' => 'success', 'message' => 'Session refreshed']);
        }
        
        return response()->json(['status' => 'error', 'message' => 'Not authenticated'], 401);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('pendaftaran.login');
    }

    public function showProfile()
    {
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        $pendaftar = $pengguna ? Pendaftar::with(['gelombang', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'jurusanPilihan2', 'berkas'])->where('user_id', $pengguna->id)->first() : null;
        
        return view('pendaftaran.profile', compact('pendaftar', 'pengguna'));
    }

    public function showPembayaran()
    {
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        // Check if user is admin/staff accessing specific pendaftar
        if ($pengguna && in_array($pengguna->role, ['admin', 'verifikator_adm', 'keuangan', 'kepsek'])) {
            // For admin, get the pendaftar by no_pendaftaran from request or session
            $noPendaftaran = request('no_pendaftaran') ?? session('view_pendaftar_no') ?? 'PPDB2025110001';
            $pendaftar = Pendaftar::with(['gelombang', 'dataSiswa'])->where('no_pendaftaran', $noPendaftaran)->first();
        } else {
            // For regular users, get their own pendaftar data
            $pendaftar = $pengguna ? Pendaftar::with(['gelombang', 'dataSiswa'])->where('user_id', $pengguna->id)->first() : null;
        }
        
        if (!$pendaftar || $pendaftar->status !== 'ADM_PASS') {
            return redirect()->route('pendaftaran.status')->with('error', 'Anda belum bisa melakukan pembayaran.');
        }
        
        $harga = $pendaftar->gelombang->harga ?? 0;
        
        return view('pendaftaran.pembayaran', compact('pendaftar', 'harga'));
    }

    public function storePembayaran(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'nama_pengirim' => 'required|string|max:255',
            'jumlah_transfer' => 'required|numeric|min:0',
        ]);

        // Get pendaftar
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        
        if ($pengguna && in_array($pengguna->role, ['admin', 'verifikator_adm', 'keuangan', 'kepsek'])) {
            $noPendaftaran = request('no_pendaftaran') ?? session('view_pendaftar_no') ?? 'PPDB2025110001';
            $pendaftar = Pendaftar::where('no_pendaftaran', $noPendaftaran)->first();
        } else {
            $pendaftar = $pengguna ? Pendaftar::where('user_id', $pengguna->id)->first() : null;
        }

        if (!$pendaftar) {
            return back()->withErrors(['error' => 'Data pendaftar tidak ditemukan.']);
        }

        // Check if pembayaran already exists for this pendaftar
        $existingPembayaran = \App\Models\Pembayaran::where('pendaftar_id', $pendaftar->id)
                                                     ->where('status', 'PENDING')
                                                     ->first();
        
        if ($existingPembayaran) {
            return back()->withErrors(['error' => 'Anda sudah memiliki pembayaran yang menunggu verifikasi.']);
        }

        // Store file
        $filePath = $request->file('bukti_pembayaran')->store('uploads/pembayaran', 'public');

        // Create pembayaran record
        \App\Models\Pembayaran::create([
            'pendaftar_id' => $pendaftar->id,
            'nominal' => $request->jumlah_transfer,
            'tanggal_bayar' => now(),
            'bukti_transfer' => $filePath,
            'status' => 'PENDING',
        ]);

        // Update pendaftar status to pending payment verification
        $pendaftar->update(['status' => 'PENDING_PAYMENT']);

        return redirect()->route('pendaftaran.status')->with('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi dari admin.');
    }

    public function cetakKartu()
    {
        $pengguna = Pengguna::where('email', Auth::user()->email)->first();
        $pendaftar = $pengguna ? Pendaftar::with(['gelombang', 'dataSiswa', 'dataOrtu', 'asalSekolah', 'jurusan', 'pengguna'])->where('user_id', $pengguna->id)->first() : null;
        
        if (!$pendaftar || $pendaftar->status !== 'ACCEPTED') {
            return redirect()->route('pendaftaran.status')->with('error', 'Anda belum bisa mencetak kartu siswa.');
        }
        
        return view('pendaftaran.cetak-kartu', compact('pendaftar'));
    }
}