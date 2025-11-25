@extends('admin.layouts.main')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pendaftar - {{ $pendaftar->pengguna->nama }}</h1>
    <a href="{{ route('verifikator.verifikasi') }}" class="btn btn-secondary btn-sm">Kembali</a>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">No Pendaftaran</td>
                        <td>: {{ $pendaftar->no_pendaftaran }}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: {{ $pendaftar->pengguna->nama }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>: {{ $pendaftar->pengguna->email }}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>: {{ $pendaftar->pengguna->hp }}</td>
                    </tr>
                    <tr>
                        <td>Jurusan Pilihan</td>
                        <td>: {{ $pendaftar->jurusan->nama ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        @if($pendaftar->dataSiswa)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">NISN</td>
                        <td>: {{ $pendaftar->dataSiswa->nisn ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: {{ $pendaftar->dataSiswa->nik ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>: {{ $pendaftar->dataSiswa->tmp_lahir ?? '-' }}, {{ $pendaftar->dataSiswa->tgl_lahir ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $pendaftar->dataSiswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $pendaftar->dataSiswa->alamat ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif

        @if($pendaftar->asalSekolah)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Sekolah Asal</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">NPSN</td>
                        <td>: {{ $pendaftar->asalSekolah->npsn ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nama Sekolah</td>
                        <td>: {{ $pendaftar->asalSekolah->nama_sekolah ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>: {{ $pendaftar->asalSekolah->kabupaten ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif

        @if($pendaftar->dataOrtu)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Orang Tua/Wali</h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td width="200">Nama Ayah</td>
                        <td>: {{ $pendaftar->dataOrtu->nama_ayah ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ayah</td>
                        <td>: {{ $pendaftar->dataOrtu->pekerjaan_ayah ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ibu</td>
                        <td>: {{ $pendaftar->dataOrtu->nama_ibu ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan Ibu</td>
                        <td>: {{ $pendaftar->dataOrtu->pekerjaan_ibu ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>No HP Orang Tua</td>
                        <td>: {{ $pendaftar->dataOrtu->hp_ayah ?? '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berkas Pendaftaran</h6>
            </div>
            <div class="card-body">
                @forelse($pendaftar->berkas as $berkas)
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                        <div>
                            <strong>{{ $berkas->jenis }}:</strong><br>
                            <small>{{ $berkas->nama_file }}</small>
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="showPreview('{{ url('storage/' . $berkas->url) }}', '{{ $berkas->nama_file }}')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                @empty
                    <p class="text-muted">Belum ada berkas yang diupload</p>
                @endforelse
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Verifikasi</h6>
            </div>
            <div class="card-body">
                <button class="btn btn-success btn-block mb-2" onclick="verifikasi({{ $pendaftar->id }}, 'ADM_PASS')">
                    <i class="fas fa-check"></i> Terima
                </button>
                <button class="btn btn-danger btn-block" onclick="verifikasi({{ $pendaftar->id }}, 'ADM_REJECT')">
                    <i class="fas fa-times"></i> Tolak
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview -->
<div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="previewModalLabel">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center" style="min-height: 400px; display: flex; align-items: center; justify-content: center;">
        <div id="previewLoading" style="display: none;">
          <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <p class="mt-2">Memuat berkas...</p>
        </div>
        <img id="previewImage" src="" alt="Preview" style="max-width: 100%; max-height: 70vh; display: none;">
        <iframe id="previewPdf" src="" style="width: 100%; height: 600px; border: none; display: none;"></iframe>
        <div id="previewError" style="display: none; color: #dc3545;">
          <i class="fas fa-exclamation-circle" style="font-size: 3rem;"></i>
          <p class="mt-2">Gagal memuat berkas</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Verifikasi -->
<div class="modal fade" id="verifikasiModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verifikasi Berkas</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="verifikasiForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan <span class="text-danger">*</span></label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan verifikasi (wajib diisi untuk penolakan)..." required></textarea>
                        <small class="form-text text-muted">Keterangan ini akan dilihat oleh pendaftar untuk mengetahui alasan verifikasi.</small>
                    </div>
                    <input type="hidden" name="status" id="statusInput">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function showPreview(url, filename) {
  const previewImage = document.getElementById('previewImage');
  const previewPdf = document.getElementById('previewPdf');
  const previewLoading = document.getElementById('previewLoading');
  const previewError = document.getElementById('previewError');
  const modalLabel = document.getElementById('previewModalLabel');
  
  previewImage.style.display = 'none';
  previewPdf.style.display = 'none';
  previewLoading.style.display = 'block';
  previewError.style.display = 'none';
  
  modalLabel.textContent = filename;
  
  $('#previewModal').modal('show');
  
  const ext = filename.split('.').pop().toLowerCase();
  
  if (['jpg', 'jpeg', 'png', 'gif'].includes(ext)) {
    previewImage.onload = function() {
      previewLoading.style.display = 'none';
      previewImage.style.display = 'block';
    };
    previewImage.onerror = function() {
      previewLoading.style.display = 'none';
      previewError.style.display = 'block';
    };
    previewImage.src = url;
  } else if (ext === 'pdf') {
    previewLoading.style.display = 'none';
    previewPdf.src = url;
    previewPdf.style.display = 'block';
  }
}

function verifikasi(id, status) {
    $('#verifikasiForm').attr('action', '/verifikator/verifikasi/' + id);
    $('#statusInput').val(status);
    $('#submitBtn').text(status === 'ADM_PASS' ? 'Terima' : 'Tolak');
    $('#submitBtn').removeClass().addClass('btn ' + (status === 'ADM_PASS' ? 'btn-success' : 'btn-danger'));
    
    // Reset form dan set required berdasarkan status
    const keteranganField = $('textarea[name="keterangan"]');
    keteranganField.val('');
    
    if (status === 'ADM_REJECT') {
        keteranganField.attr('required', true);
        keteranganField.attr('placeholder', 'Wajib diisi! Jelaskan alasan penolakan agar pendaftar dapat memperbaiki data.');
    } else {
        keteranganField.attr('required', false);
        keteranganField.attr('placeholder', 'Masukkan keterangan verifikasi (opsional)...');
    }
    
    $('#verifikasiModal').modal('show');
}

// Validasi form sebelum submit
$('#verifikasiForm').on('submit', function(e) {
    const status = $('#statusInput').val();
    const keterangan = $('textarea[name="keterangan"]').val().trim();
    
    if (status === 'ADM_REJECT' && keterangan === '') {
        e.preventDefault();
        alert('Keterangan wajib diisi untuk penolakan!');
        $('textarea[name="keterangan"]').focus();
        return false;
    }
    
    if (status === 'ADM_REJECT') {
        return confirm('Yakin ingin menolak pendaftar ini? Pastikan keterangan sudah jelas agar pendaftar dapat memperbaiki data.');
    }
    
    return confirm('Yakin ingin menerima pendaftar ini?');
})
</script>
@endsection
