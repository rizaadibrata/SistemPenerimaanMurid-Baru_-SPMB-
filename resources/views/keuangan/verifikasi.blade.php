@extends('admin.layouts.main')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Verifikasi Pembayaran</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran Menunggu Verifikasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Pendaftaran</th>
                        <th>Nama</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Upload</th>
                        <th>Bukti Transfer</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $pendaftar->firstItem() + $index }}</td>
                        <td>{{ $item->no_pendaftaran }}</td>
                        <td>{{ $item->dataSiswa->nama ?? $item->pengguna->nama }}</td>
                        <td>
                            @if($item->pembayaran->count() > 0)
                                <span class="badge badge-warning">Menunggu Verifikasi</span>
                            @else
                                <span class="badge badge-secondary">Belum Upload</span>
                            @endif
                        </td>
                        <td>
                            @if($item->pembayaran->count() > 0)
                                {{ $item->pembayaran->first()->created_at->format('d/m/Y H:i') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($item->pembayaran->count() > 0 && $item->pembayaran->first()->bukti_transfer)
                                <button class="btn btn-sm btn-info" onclick="showBukti('{{ asset('storage/' . $item->pembayaran->first()->bukti_transfer) }}')">
                                    <i class="fas fa-eye"></i> Lihat
                                </button>
                            @else
                                <span class="text-muted">Belum ada</span>
                            @endif
                        </td>
                        <td>
                            @if($item->pembayaran->count() > 0)
                                <button class="btn btn-sm btn-success" onclick="verifikasi({{ $item->pembayaran->first()->id }}, 'VERIFIED')">
                                    <i class="fas fa-check"></i> Terima
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="verifikasi({{ $item->pembayaran->first()->id }}, 'REJECTED')">
                                    <i class="fas fa-times"></i> Tolak
                                </button>
                            @else
                                <span class="text-muted">Menunggu upload</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada pendaftar yang menunggu verifikasi pembayaran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pendaftar->links() }}
    </div>
</div>

<!-- Modal Bukti Transfer -->
<div class="modal fade" id="buktiModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bukti Transfer</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="buktiImage" src="" class="img-fluid" style="max-height: 500px;">
            </div>
        </div>
    </div>
</div>

<!-- Modal Verifikasi -->
<div class="modal fade" id="verifikasiModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verifikasi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="verifikasiForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan..."></textarea>
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
function showBukti(imageUrl) {
    $('#buktiImage').attr('src', imageUrl);
    $('#buktiModal').modal('show');
}

function verifikasi(id, status) {
    $('#verifikasiForm').attr('action', '/keuangan/verifikasi/' + id);
    $('#statusInput').val(status);
    $('#submitBtn').text(status === 'VERIFIED' ? 'Terima' : 'Tolak');
    $('#submitBtn').removeClass().addClass('btn ' + (status === 'VERIFIED' ? 'btn-success' : 'btn-danger'));
    $('#verifikasiModal').modal('show');
}
</script>
@endpush