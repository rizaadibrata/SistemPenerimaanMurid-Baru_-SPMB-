@extends('admin.layouts.main')

@section('title', 'Verifikasi Berkas')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Verifikasi Berkas</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Berkas Menunggu Verifikasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Tanggal Submit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $pendaftar->firstItem() + $index }}</td>
                        <td>{{ $item->no_pendaftaran }}</td>
                        <td>{{ $item->pengguna->nama }}</td>
                        <td>{{ $item->jurusan->nama ?? '-' }}</td>
                        <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @switch($item->status)
                                @case('DRAFT')
                                    <span class="badge badge-secondary">Draft</span>
                                    @break
                                @case('SUBMIT')
                                    <span class="badge badge-warning">Menunggu Verifikasi</span>
                                    @break
                                @case('ADM_PASS')
                                    <span class="badge badge-success">Diterima</span>
                                    @break
                                @case('ADM_REJECT')
                                    <span class="badge badge-danger">Ditolak</span>
                                    @break
                                @case('ADM_REJECT_FINAL')
                                    <span class="badge badge-dark">Ditolak Final</span>
                                    @break
                                @case('PENDING_PAYMENT')
                                    <span class="badge badge-primary">Menunggu Pembayaran</span>
                                    @break
                                @case('PAID')
                                    <span class="badge badge-info">Lunas</span>
                                    @break
                                @case('ACCEPTED')
                                    <span class="badge badge-success">Diterima</span>
                                    @break
                                @default
                                    <span class="badge badge-light">{{ $item->status }}</span>
                            @endswitch
                        </td>
                        <td>
                            <a href="{{ route('verifikator.detail', $item->id) }}" class="btn btn-sm btn-info mb-1">
                                <i class="fas fa-eye"></i> Lihat Detail
                            </a>
                            @if($item->status === 'SUBMIT')
                                <button class="btn btn-sm btn-success mb-1" onclick="verifikasi({{ $item->id }}, 'ADM_PASS')">
                                    <i class="fas fa-check"></i> Terima
                                </button>
                                <div class="btn-group mb-1">
                                    <button class="btn btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="verifikasi({{ $item->id }}, 'ADM_REJECT', 'berkas')">Berkas Tidak Lengkap</a>
                                        <a class="dropdown-item" href="#" onclick="verifikasi({{ $item->id }}, 'ADM_REJECT', 'data')">Data Tidak Valid</a>
                                        <a class="dropdown-item" href="#" onclick="verifikasi({{ $item->id }}, 'ADM_REJECT', 'syarat')">Tidak Memenuhi Syarat</a>
                                        <a class="dropdown-item" href="#" onclick="verifikasi({{ $item->id }}, 'ADM_REJECT', 'lainnya')">Lainnya</a>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada berkas yang menunggu verifikasi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pendaftar->links() }}
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
                    <div class="form-group" id="jenisTolakGroup" style="display: none;">
                        <label>Jenis Penolakan</label>
                        <input type="text" class="form-control" id="jenisTolakDisplay" readonly>
                        <input type="hidden" name="jenis_tolak" id="jenisTolakInput">
                    </div>
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
@endsection

@push('scripts')
<script>
function verifikasi(id, status, jenisTolak = null) {
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
        
        // Show jenis tolak field
        $('#jenisTolakGroup').show();
        $('#jenisTolakInput').val(jenisTolak);
        
        const jenisTolakLabels = {
            'berkas': 'Berkas Tidak Lengkap',
            'data': 'Data Tidak Valid', 
            'syarat': 'Tidak Memenuhi Syarat',
            'lainnya': 'Lainnya'
        };
        $('#jenisTolakDisplay').val(jenisTolakLabels[jenisTolak] || jenisTolak);
    } else {
        keteranganField.attr('required', false);
        keteranganField.attr('placeholder', 'Masukkan keterangan verifikasi (opsional)...');
        
        // Hide jenis tolak field
        $('#jenisTolakGroup').hide();
        $('#jenisTolakInput').val('');
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
@endpush
