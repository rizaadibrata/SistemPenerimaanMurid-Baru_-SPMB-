# PPDB Management Commands

## Daftar Command

### 1. Menghapus Semua Data Pendaftaran
```bash
php artisan ppdb:clear-data
```
atau untuk skip konfirmasi:
```bash
php artisan ppdb:clear-data --force
```

**Fungsi:** Menghapus semua data pendaftaran termasuk:
- Data pendaftar
- Data siswa
- Data orang tua
- Data asal sekolah
- Berkas pendaftaran
- Data pembayaran
- Log aktivitas
- Akun pengguna siswa

### 2. Mengecek Status Data
```bash
php artisan ppdb:check-data
```

**Fungsi:** Menampilkan jumlah data di setiap tabel terkait pendaftaran

## Catatan Penting

- Command `ppdb:clear-data` akan menghapus SEMUA data pendaftaran secara permanen
- Data admin, kepsek, keuangan, dan verifikator TIDAK akan terhapus
- Data master (jurusan, gelombang, wilayah) TIDAK akan terhapus
- Gunakan dengan hati-hati karena tidak dapat dibatalkan

## Status Saat Ini

✅ Database telah dibersihkan dari semua data pendaftaran
✅ Sistem siap untuk pendaftaran baru dari awal (mulai dari 0)