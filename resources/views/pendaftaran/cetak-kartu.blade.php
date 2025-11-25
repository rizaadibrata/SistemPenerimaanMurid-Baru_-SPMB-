<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Siswa - {{ $pendaftar->dataSiswa->nama ?? $pendaftar->pengguna->nama }}</title>
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: #f5f5f5;
        }
        
        .kartu-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            background: #007bff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
        
        .school-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .school-address {
            color: #666;
            font-size: 14px;
        }
        
        .kartu-title {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            margin: 20px 0;
            font-size: 20px;
            font-weight: bold;
            border-radius: 5px;
        }
        
        .data-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .data-item {
            margin-bottom: 15px;
        }
        
        .data-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .data-value {
            color: #666;
            padding: 8px 12px;
            background: #f8f9fa;
            border-radius: 4px;
            border-left: 4px solid #007bff;
        }
        
        .status-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            border-radius: 10px;
        }
        
        .status-badge {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            color: #666;
            font-size: 12px;
        }
        
        .print-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        .print-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button class="print-btn" onclick="window.print()">
            <i class="bi bi-printer"></i> Cetak Kartu
        </button>
        <button class="print-btn" onclick="window.close()" style="background: #6c757d; margin-left: 10px;">
            Tutup
        </button>
    </div>

    <div class="kartu-container">
        <div class="header">
            <div class="logo">SMK</div>
            <div class="school-name">SMK BAKTI NUSANTARA 666</div>
            <div class="school-address">Jl. Pendidikan No. 123, Jakarta Selatan</div>
        </div>
        
        <div class="kartu-title">KARTU SISWA DITERIMA</div>
        
        <div class="data-section">
            <div class="data-column">
                <div class="data-item">
                    <div class="data-label">Nomor Pendaftaran</div>
                    <div class="data-value">{{ $pendaftar->no_pendaftaran }}</div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Nama Lengkap</div>
                    <div class="data-value">{{ $pendaftar->dataSiswa->nama ?? $pendaftar->pengguna->nama }}</div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">NISN</div>
                    <div class="data-value">{{ $pendaftar->dataSiswa->nisn ?? '-' }}</div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Tempat, Tanggal Lahir</div>
                    <div class="data-value">
                        {{ $pendaftar->dataSiswa->tmp_lahir ?? '-' }}, 
                        {{ $pendaftar->dataSiswa->tgl_lahir ? $pendaftar->dataSiswa->tgl_lahir->format('d F Y') : '-' }}
                    </div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Jenis Kelamin</div>
                    <div class="data-value">{{ $pendaftar->dataSiswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                </div>
            </div>
            
            <div class="data-column">
                <div class="data-item">
                    <div class="data-label">Jurusan</div>
                    <div class="data-value">{{ $pendaftar->jurusan->nama ?? '-' }}</div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Asal Sekolah</div>
                    <div class="data-value">{{ $pendaftar->asalSekolah->nama_sekolah ?? '-' }}</div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Nama Orang Tua</div>
                    <div class="data-value">
                        Ayah: {{ $pendaftar->dataOrtu->nama_ayah ?? '-' }}<br>
                        Ibu: {{ $pendaftar->dataOrtu->nama_ibu ?? '-' }}
                    </div>
                </div>
                
                <div class="data-item">
                    <div class="data-label">Tanggal Diterima</div>
                    <div class="data-value">{{ $pendaftar->tanggal_diterima ? $pendaftar->tanggal_diterima->format('d F Y, H:i') : '-' }}</div>
                </div>
            </div>
        </div>
        
        <div class="status-section">
            <div class="status-badge">✓ DITERIMA</div>
            <div>Selamat! Anda telah diterima sebagai siswa SMK Bakti Nusantara 666</div>
        </div>
        
        <div class="footer">
            <p>Kartu ini dicetak pada: {{ now()->format('d F Y, H:i:s') }}</p>
            <p>Simpan kartu ini sebagai bukti penerimaan siswa</p>
        </div>
    </div>
</body>
</html>