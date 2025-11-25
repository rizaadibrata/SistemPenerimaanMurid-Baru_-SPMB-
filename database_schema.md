# Database Schema PPDB SMKBN

## Struktur Relasi Database

```
pengguna (users)
├── pendaftar (1:N)
    ├── pendaftar_data_siswa (1:1)
    │   └── wilayah (N:1)
    ├── pendaftar_data_ortu (1:1)
    ├── pendaftar_asal_sekolah (1:1)
    ├── pendaftar_berkas (1:N)
    ├── pembayaran (1:N)
    ├── gelombang (N:1)
    └── jurusan (N:1)
```

## Tabel Utama
- **pengguna**: Data user/akun
- **pendaftar**: Data pendaftaran utama

## Tabel Detail Pendaftar
- **pendaftar_data_siswa**: Data pribadi siswa
- **pendaftar_data_ortu**: Data orang tua/wali
- **pendaftar_asal_sekolah**: Data sekolah asal
- **pendaftar_berkas**: Upload berkas

## Tabel Master
- **jurusan**: Master jurusan
- **gelombang**: Master gelombang pendaftaran
- **wilayah**: Master wilayah/daerah

## Tabel Transaksi
- **pembayaran**: Data pembayaran pendaftaran