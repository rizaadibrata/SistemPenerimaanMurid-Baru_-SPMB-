@extends('admin.layouts.main')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Pendaftar - {{ $pendaftar->pengguna->nama }}</h1>
    <a href="{{ route('admin.pendaftar.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
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
                        <td>: {{ $pendaftar->jurusan->nama }}</td>
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
                        <td>: {{ $pendaftar->dataSiswa->nisn }}</td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: {{ $pendaftar->dataSiswa->nik }}</td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td>: {{ $pendaftar->dataSiswa->tempat_lahir }}, {{ $pendaftar->dataSiswa->tanggal_lahir }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>: {{ $pendaftar->dataSiswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $pendaftar->dataSiswa->alamat }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Status Verifikasi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pendaftar.verifikasi', $pendaftar) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status_verifikasi" class="form-control" required>
                            <option value="pending" {{ $pendaftar->status_verifikasi == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="terverifikasi" {{ $pendaftar->status_verifikasi == 'terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                            <option value="ditolak" {{ $pendaftar->status_verifikasi == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan_verifikasi" class="form-control" rows="4">{{ $pendaftar->catatan_verifikasi }}</textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">Update Status</button>
                </form>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berkas Pendaftaran</h6>
            </div>
            <div class="card-body">
                @forelse($pendaftar->berkas as $berkas)
                    <div class="d-flex justify-content-between align-items-center mb-2 p-2 border rounded">
                        <div>
                            <strong>{{ $berkas->jenis }}:</strong> {{ $berkas->nama_file }}
                        </div>
                        <button type="button" class="btn btn-sm btn-primary" onclick="showPreview('{{ url('storage/' . $berkas->url) }}', '{{ $berkas->nama_file }}')">
                            <i class="fas fa-eye"></i> Lihat
                        </button>
                    </div>
                @empty
                    <p class="text-muted">Belum ada berkas yang diupload</p>
                @endforelse
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

<script>
function showPreview(url, filename) {
  const previewImage = document.getElementById('previewImage');
  const previewPdf = document.getElementById('previewPdf');
  const previewLoading = document.getElementById('previewLoading');
  const previewError = document.getElementById('previewError');
  const modalLabel = document.getElementById('previewModalLabel');
  
  // Reset displays
  previewImage.style.display = 'none';
  previewPdf.style.display = 'none';
  previewLoading.style.display = 'block';
  previewError.style.display = 'none';
  
  modalLabel.textContent = filename;
  
  // Show modal
  $('#previewModal').modal('show');
  
  // Check file extension
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
</script>
@endsection