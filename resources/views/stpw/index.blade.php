@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <h1 class="text-center mb-4">Daftar STPW</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('stpw.form') }}" class="btn btn-primary">Tambah STPW Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama Toko</th>
                    <th>Merek Dagang</th>
                    <th>Penanggung Jawab</th>
                    <th>Jenis Usaha</th>
                    <th>Nilai Investasi</th>
                    <th>Jenis Waralaba</th>
                    <th>Jenis Layanan</th>
                    <th>Kepemilikan Bangunan</th>
                    <th>Jumlah Tenaga Kerja</th>
                    <th>Fasilitas Bangunan</th>
                    <th>Jumlah Unit AC</th>
                    <th>Tanggal Dibuat</th>
                    <th>Terakhir Diupdate</th>
                    <th style="min-width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stpwList as $stpw)
                    <tr>
                        <td>{{ $stpw->id }}</td>
                        <td>{{ $stpw->company_name }}</td>
                        <td>{{ $stpw->store_name }}</td>
                        <td>{{ $stpw->trademark }}</td>
                        <td>{{ $stpw->responsible_person }}</td>
                        <td>{{ $stpw->business_types }}</td>
                        <td>{{ number_format($stpw->investment_value, 2) }}</td>
                        <td>{{ $stpw->franchise_type }}</td>
                        <td>{{ $stpw->service_type }}</td>
                        <td>{{ $stpw->building_ownership }}</td>
                        <td>{{ $stpw->workforce }}</td>
                        <td>{{ $stpw->building_facility }}</td>
                        <td>{{ $stpw->ac_unit_count ?? '-' }}</td>
                        <td>{{ $stpw->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $stpw->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('stpw.show', $stpw->id) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <!-- <a href="{{ route('stpw.edit', $stpw->id) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a> -->
                                <form action="{{ route('stpw.destroy', $stpw->id) }}" 
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

