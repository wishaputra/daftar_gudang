@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Daftar Pencatatan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('pencatatan.form') }}" class="btn btn-primary">Tambah Pencatatan Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nomor</th>
                    <th>Penanggung Jawab</th>
                    <th>Alamat Gudang</th>
                    <th>Periode Bulan</th>
                    <th>Tanggal</th>
                    <th>Jumlah Item</th>
                    <th>Total Penerimaan</th>
                    <th>Total Pengeluaran</th>
                    <th>Total Stok</th>
                    <th>Tanggal Dibuat</th>
                    <th>Terakhir Diupdate</th>
                    <th style="min-width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pencatatanList as $pencatatan)
                    <tr>
                        <td>{{ $pencatatan->id }}</td>
                        <td>{{ $pencatatan->nomor }}</td>
                        <td>{{ $pencatatan->penanggung_jawab }}</td>
                        <td>{{ $pencatatan->alamat_gudang }}</td>
                        <td>{{ $pencatatan->periode_bulan ? $pencatatan->periode_bulan->format('F Y') : 'N/A' }}</td>
                        <td>{{ $pencatatan->tanggal ? $pencatatan->tanggal->format('d/m/Y') : 'N/A' }}</td>
                        <td>{{ $pencatatan->details->count() }}</td>
                        <td>{{ number_format($pencatatan->details->sum('penerimaan_jumlah'), 2) }}</td>
                        <td>{{ number_format($pencatatan->details->sum('pengeluaran_jumlah'), 2) }}</td>
                        <td>{{ number_format($pencatatan->details->sum('stok_jumlah'), 2) }}</td>
                        <td>{{ $pencatatan->created_at ? $pencatatan->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                        <td>{{ $pencatatan->updated_at ? $pencatatan->updated_at->format('d/m/Y H:i') : 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('pencatatan.show', $pencatatan->id) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Detail" target="_blank">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <!-- <a href="{{ route('pencatatan.edit', $pencatatan->id) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a> -->
                                <form action="{{ route('pencatatan.destroy', $pencatatan->id) }}" 
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
                            </div>
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

