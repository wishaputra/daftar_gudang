@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Daftar Laporan Gudang</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('laporan-gudang.create') }}" class="btn btn-primary">Tambah Laporan Gudang</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Gudang</th>
                    <th>ID Permohonan Izin</th>
                    <th>Status Verifikasi</th>
                    <th>NIB</th>
                    <th>Nama Perusahaan</th>
                    <th>No. KTP/Paspor</th>
                    <th>Email</th>
                    <th>Alamat Perusahaan</th>
                    <th>Kelurahan (Perusahaan)</th>
                    <th>Kecamatan (Perusahaan)</th>
                    <th>No. Telepon</th>
                    <th>Alamat Gudang</th>
                    <th>Kelurahan (Gudang)</th>
                    <th>Kecamatan (Gudang)</th>
                    <th>Kab/Kota (Gudang)</th>
                    <th>Provinsi (Gudang)</th>
                    <th>Koordinat (Lat)</th>
                    <th>Koordinat (Long)</th>
                    <th>Nomor TDG</th>
                    <th>Tanggal Terbit TDG</th>
                    <th>Luas Bangunan (m²)</th>
                    <th>Kapasitas (m³/ton)</th>
                    <th>Golongan</th>
                    <th>Fasilitas</th>
                    <th>Jenis Barang</th>
                    <th>Catatan</th>
                    <th>Tanggal Dibuat</th>
                    <th>Terakhir Diupdate</th>
                    <th style="min-width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laporanGudangList as $laporan)
                    <tr>
                        <td>{{ $laporan->id }}</td>
                        <td>{{ $laporan->id_gudang ?? '-' }}</td>
                        <td>{{ $laporan->id_permohonan_izin ?? '-' }}</td>
                        <td>{{ $laporan->status_verifikasi ?? '-' }}</td>
                        <td>{{ $laporan->nib }}</td>
                        <td>{{ $laporan->nama_perusahaan }}</td>
                        <td>{{ $laporan->nomor_ktp_paspor }}</td>
                        <td>{{ $laporan->email_perusahaan }}</td>
                        <td>{{ $laporan->alamat_perusahaan }}</td>
                        <td>{{ $laporan->kelurahan_perusahaan }}</td>
                        <td>{{ $laporan->kecamatan_perusahaan }}</td>
                        <td>{{ $laporan->nomor_telepon }}</td>
                        <td>{{ $laporan->alamat_gudang }}</td>
                        <td>{{ $laporan->kelurahan_gudang }}</td>
                        <td>{{ $laporan->kecamatan_gudang }}</td>
                        <td>{{ $laporan->kab_kota_gudang }}</td>
                        <td>{{ $laporan->provinsi_gudang }}</td>
                        <td>{{ $laporan->koordinat_lat }}</td>
                        <td>{{ $laporan->koordinat_long }}</td>
                        <td>{{ $laporan->nomor_tdg ?? '-' }}</td>
                        <td>{{ $laporan->tanggal_terbit_tdg ? $laporan->tanggal_terbit_tdg->format('d/m/Y') : '-' }}</td>
                        <td>{{ number_format($laporan->luas_bangunan, 2) }}</td>
                        <td>{{ number_format($laporan->kapasitas_gudang, 2) }}</td>
                        <td>{{ $laporan->golongan_gudang }}</td>
                        <td>{{ $laporan->fasilitas }}</td>
                        <td>
                            @if(is_array($laporan->jenis_barang))
                                <ul class="list-unstyled mb-0">
                                    @foreach($laporan->jenis_barang as $barang)
                                        <li>{{ $barang }}</li>
                                    @endforeach
                                </ul>
                            @else
                                {{ $laporan->jenis_barang }}
                            @endif
                        </td>
                        <td>{{ $laporan->catatan ?? '-' }}</td>
                        <td>{{ $laporan->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $laporan->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @can('view', $laporan)
                                <a href="{{ route('laporan-gudang.show', $laporan->id) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            @endcan
                            @can('update', $laporan)
                                <a href="{{ route('laporan-gudang.edit', $laporan->id) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            @endcan
                            @can('delete', $laporan)
                                <form action="{{ route('laporan-gudang.destroy', $laporan->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                            title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .table {
        font-size: 0.875rem;
    }
    .table th {
        white-space: nowrap;
    }
    .btn-group {
        gap: 0.25rem;
    }
</style>
@endpush
@endsection

