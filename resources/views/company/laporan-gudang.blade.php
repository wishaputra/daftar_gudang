@extends('layouts.app')


@section('content')
<div class="container">
    <form action="{{ route('laporan-gudang.store') }}" method="POST">
        @csrf
        
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_gudang" class="form-label">ID Gudang (Opsional)</label>
                    <input type="text" class="form-control" id="id_gudang" name="id_gudang">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="id_permohonan_izin" class="form-label">ID Permohonan Izin (Opsional)</label>
                    <input type="text" class="form-control" id="id_permohonan_izin" name="id_permohonan_izin">
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="status_verifikasi" class="form-label">Status Verifikasi (Opsional)</label>
                    <input type="text" class="form-control" id="status_verifikasi" name="status_verifikasi">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nib" class="form-label">NIB</label>
                    <input type="text" class="form-control" id="nib" name="nib" required>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nomor_ktp_paspor" class="form-label">Nomor KTP/Paspor Penanggungjawab/Pengelola Gudang</label>
                    <input type="text" class="form-control" id="nomor_ktp_paspor" name="nomor_ktp_paspor" required>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                    <input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" required>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Alamat Penanggung Jawab/Pengelola Gudang</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan Penanggungjawab/Pengelola Gudang</label>
                        <input type="text" class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan_perusahaan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan_perusahaan" name="kelurahan_perusahaan" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan_perusahaan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan_perusahaan" name="kecamatan_perusahaan" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_telepon" class="form-label">Nomor Telepon Penanggungjawab Gudang</label>
                        <input type="tel" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Alamat Gudang</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                        <input type="text" class="form-control" id="alamat_gudang" name="alamat_gudang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kelurahan_gudang" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan_gudang" name="kelurahan_gudang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kecamatan_gudang" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan_gudang" name="kecamatan_gudang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kab_kota_gudang" class="form-label">Kab/Kota Gudang</label>
                        <input type="text" class="form-control" id="kab_kota_gudang" name="kab_kota_gudang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="provinsi_gudang" class="form-label">Provinsi Gudang</label>
                        <input type="text" class="form-control" id="provinsi_gudang" name="provinsi_gudang" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="koordinat_lat" class="form-label">T. Koordinat (Lat)</label>
                        <input type="text" class="form-control" id="koordinat_lat" name="koordinat_lat" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="koordinat_long" class="form-label">T. Koordinat (Long)</label>
                        <input type="text" class="form-control" id="koordinat_long" name="koordinat_long" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nomor_tdg" class="form-label">Nomor TDG (Opsional)</label>
                    <input type="text" class="form-control" id="nomor_tdg" name="nomor_tdg">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tanggal_terbit_tdg" class="form-label">Tanggal Terbit TDG (Opsional)</label>
                    <input type="date" class="form-control" id="tanggal_terbit_tdg" name="tanggal_terbit_tdg">
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="luas_bangunan" class="form-label">Luas Bangunan Gudang (m2)</label>
                    <input type="number" step="0.01" class="form-control" id="luas_bangunan" name="luas_bangunan" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="kapasitas_gudang" class="form-label">Kapasitas Gudang (m3/ton)</label>
                    <input type="number" step="0.01" class="form-control" id="kapasitas_gudang" name="kapasitas_gudang" required>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="golongan_gudang" class="form-label">Golongan Gudang</label>
                    <select class="form-select" id="golongan_gudang" name="golongan_gudang" required>
                        <option value="">Pilih Golongan</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="Terbuka">Terbuka</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas</label>
                    <select class="form-select" id="fasilitas" name="fasilitas" required>
                        <option value="">Pilih Fasilitas</option>
                        <option value="Berpendingin">Berpendingin</option>
                        <option value="Non-Berpendingin">Non-Berpendingin</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label">Jenis Barang (Bapokting/Non Bapokting/Barang Lainnya)</label>
            <div id="jenis_barang_container">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="jenis_barang[]" required>
                    <button type="button" class="btn btn-success add-jenis-barang">+</button>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan" rows="4"></textarea>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('jenis_barang_container');
    const addButton = container.querySelector('.add-jenis-barang');

    addButton.addEventListener('click', function() {
        const newInput = document.createElement('div');
        newInput.classList.add('input-group', 'mb-2');
        newInput.innerHTML = `
            <input type="text" class="form-control" name="jenis_barang[]" required>
            <button type="button" class="btn btn-danger remove-jenis-barang">-</button>
        `;
        container.appendChild(newInput);

        newInput.querySelector('.remove-jenis-barang').addEventListener('click', function() {
            container.removeChild(newInput);
        });
    });
});
</script>
@endsection