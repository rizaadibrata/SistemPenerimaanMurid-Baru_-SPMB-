# Grafik Data Asal Wilayah - Dashboard Kepsek

## Fitur Baru

✅ **Grafik Asal Wilayah Pendaftar** telah ditambahkan ke Dashboard Kepala Sekolah

### Lokasi
- **Halaman:** Dashboard Kepsek (`/kepsek/dashboard`)
- **Posisi:** Di bawah grafik pendaftaran bulanan dan status pendaftar

### Fitur Grafik
- **Jenis:** Bar Chart (Grafik Batang)
- **Data:** Top 10 Kabupaten dengan pendaftar terbanyak
- **Sumber Data:** Tabel `wilayah` dan `pendaftar_data_siswa`
- **Update:** Real-time sesuai data pendaftaran

### Informasi yang Ditampilkan
- Nama kabupaten asal pendaftar
- Jumlah pendaftar per kabupaten
- Tooltip menampilkan detail jumlah pendaftar
- Grafik responsif dan interaktif

### Status Data
- ✅ Database telah dikosongkan
- ✅ Grafik menampilkan pesan "Belum Ada Data Pendaftar"
- ✅ Grafik akan otomatis muncul setelah ada siswa yang mendaftar

### Command Tersedia
```bash
# Menambahkan data dummy untuk testing
php artisan ppdb:add-dummy-data

# Mengecek status data
php artisan ppdb:check-data

# Menghapus semua data pendaftaran
php artisan ppdb:clear-data
```

### Teknologi
- **Chart.js** untuk rendering grafik (tema disesuaikan dengan template admin)
- **Laravel Eloquent** untuk query data
- **MySQL** untuk penyimpanan data
- **SB Admin 2** template styling

### Fitur Tambahan
- **Empty State:** Menampilkan pesan ketika belum ada data
- **Responsive Design:** Grafik menyesuaikan ukuran layar
- **Consistent Theme:** Warna dan styling sesuai template admin

Grafik ini membantu Kepala Sekolah untuk:
1. Melihat sebaran geografis pendaftar
2. Mengidentifikasi wilayah dengan minat tertinggi
3. Merencanakan strategi promosi berdasarkan wilayah
4. Memahami jangkauan sekolah