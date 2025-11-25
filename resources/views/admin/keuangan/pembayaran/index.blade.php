@extends('admin.layouts.main')

@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Verifikasi Pembayaran</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>No Pendaftaran</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftars as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->no_pendaftaran }}</td>
                        <td>{{ $pendaftar->pengguna->nama }}</td>
                        <td>{{ $pendaftar->jurusan->nama }}</td>
                        <td>
                            @if($pendaftar->status_pembayaran == 'pending')
                                <span class="badge badge-warning">Pending</span>
                            @elseif($pendaftar->status_pembayaran == 'lunas')
                                <span class="badge badge-success">Lunas</span>
                            @else
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                        </td>
                        <td>{{ $pendaftar->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal{{ $pendaftar->id }}">
                                Verifikasi
                            </button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="modal{{ $pendaftar->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Verifikasi Pembayaran - {{ $pendaftar->pengguna->nama }}</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.pembayaran.verifikasi', $pendaftar) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        @if($pendaftar->bukti_pembayaran)
                                            <div class="mb-3">
                                                <label>Bukti Pembayaran:</label><br>
                                                <img src="{{ asset('storage/' . $pendaftar->bukti_pembayaran) }}" class="img-fluid" style="max-height: 300px;">
                                            </div>
                                        @endif
                                        
                                        <div class="form-group">
                                            <label>Status Pembayaran</label>
                                            <select name="status_pembayaran" class="form-control" required>
                                                <option value="pending" {{ $pendaftar->status_pembayaran == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="lunas" {{ $pendaftar->status_pembayaran == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                                <option value="ditolak" {{ $pendaftar->status_pembayaran == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <textarea name="catatan_pembayaran" class="form-control" rows="3">{{ $pendaftar->catatan_pembayaran }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection