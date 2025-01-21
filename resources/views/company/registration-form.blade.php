<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULIR PENDATAAN GUDANG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2>PEMERINTAH KOTA TANGERANG SELATAN</h2>
            <h3>DINAS PERINDUSTRIAN DAN PERDAGANGAN</h3>
            <p>Jl. Maruga Raya No. 1 Lantai 1 Serua Ciputat Tangerang Selatan</p>
            <p>Telp (021) 537 9802, Fax (021) 537 9808</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('company.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <h4>A. Umum</h4>
                </div>
                <div class="card-body">
                    <!-- add new form ID Gudang (optional form) -->

                    <!-- add new form ID Permohonan Izin (optional form)-->

                    <!-- add new form Status Verifikasi (optional form)-->

                    <!-- add new form called "NIB" -->

                    <div class="mb-3">
                        <label for="company_name" class="form-label">1. Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>
                    
                    <!-- add new form Nomor KTP/Paspor Penanggungjawab/Pengelola Gudang -->

                    <!-- add new form Email Perusahaan -->


                    <!-- <div class="mb-3">
                        <label for="head_office_address" class="form-label">2. Alamat Kantor Pusat:</label>
                        <textarea class="form-control" id="head_office_address" name="head_office_address" rows="3" required></textarea>
                    </div> (delete this form) -->

                    <div class="mb-3">
                        <label for="company_address" class="form-label">3. Alamat Perusahaan:</label>
                        <textarea class="form-control" id="company_address" name="company_address" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="responsible_person" class="form-label">4. Penanggung Jawab/Jabatan:</label>
                        <input type="text" class="form-control" id="responsible_person" name="responsible_person" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_field" class="form-label">5. Bidang Usaha:</label>
                        <input 
                            class="form-control" 
                            id="business_field" 
                            name="business_field" 
                            list="business_fields_list" 
                            placeholder="Pilih atau ketik Bidang Usaha" 
                            required
                        />
                        <datalist id="business_fields_list">
                            @foreach($businessFields as $field)
                                <option value="{{ $field }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="investment_amount" class="form-label">6. Besarnya Investasi (Rp/US$):</label>
                        <input type="number" class="form-control" id="investment_amount" name="investment_amount" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">7. Status Penanaman Modal:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="investment_status" id="pma" value="PMA" required>
                            <label class="form-check-label" for="pma">PMA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="investment_status" id="pmdn" value="PMDN">
                            <label class="form-check-label" for="pmdn">PMDN</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="investment_status" id="swasta_nasional" value="Swasta Nasional">
                            <label class="form-check-label" for="swasta_nasional">Swasta Nasional</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">8. Jumlah Tenaga Kerja:</label>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="indonesian_workers" class="form-label">Indonesia:</label>
                                <input type="number" class="form-control" id="indonesian_workers" name="indonesian_workers" required>
                            </div>
                            <div class="col-md-4">
                                <label for="foreign_workers" class="form-label">Asing:</label>
                                <input type="number" class="form-control" id="foreign_workers" name="foreign_workers" required>
                            </div>
                            <div class="col-md-4">
                                <label for="total_workers" class="form-label">Jumlah:</label>
                                <input type="number" class="form-control" id="total_workers" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>B. Kelengkapan Dokumen</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="ktp_copy" class="form-label">1. Foto Copy KTP:</label>
                        <input type="file" class="form-control" id="ktp_copy" name="ktp_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="director_npwp_copy" class="form-label">2. Foto Copy NPWP Direktur:</label>
                        <input type="file" class="form-control" id="director_npwp_copy" name="director_npwp_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_npwp_copy" class="form-label">3. Foto Copy NPWP Perusahaan:</label>
                        <input type="file" class="form-control" id="company_npwp_copy" name="company_npwp_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="establishment_deed_copy" class="form-label">4. Foto Copy Akte Pendirian beserta Pengesahannya:</label>
                        <input type="file" class="form-control" id="establishment_deed_copy" name="establishment_deed_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="latest_amendment_deed_copy" class="form-label">5. Foto Copy Akte Perubahan Terakhir beserta Pengesahannya:</label>
                        <input type="file" class="form-control" id="latest_amendment_deed_copy" name="latest_amendment_deed_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="building_approval_copy" class="form-label">6. Foto Copy Persetujuan Bangunan Gedung (PBG):</label>
                        <input type="file" class="form-control" id="building_approval_copy" name="building_approval_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="warehouse_registration_copy" class="form-label">7. Foto Copy Tanda Daftar Gudang:</label>
                        <input type="file" class="form-control" id="warehouse_registration_copy" name="warehouse_registration_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_registration_number_copy" class="form-label">8. Foto Copy Nomor Induk Berusaha:</label>
                        <input type="file" class="form-control" id="business_registration_number_copy" name="business_registration_number_copy" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>C. Prasarana Fisik</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="land_area" class="form-label">1. Luas Tanah (M2):</label>
                        <input type="number" step="0.01" class="form-control" id="land_area" name="land_area" required>
                    </div>
                    <div class="mb-3">
                        <label for="building_area" class="form-label">2. Luas Bangunan (M2):</label>
                        <input type="number" step="0.01" class="form-control" id="building_area" name="building_area" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">3. Status Tanah/Bangunan:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_status" id="land_status_own" value="Milik Sendiri" required>
                            <label class="form-check-label" for="land_status_own">Milik Sendiri</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_status" id="land_status_rent" value="Sewa">
                            <label class="form-check-label" for="land_status_rent">Sewa</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_status" id="land_status_contract" value="Kontrak">
                            <label class="form-check-label" for="land_status_contract">Kontrak</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="land_status" id="land_status_other" value="Lainnya">
                            <label class="form-check-label" for="land_status_other">Lainnya</label>
                        </div>
                        <div id="land_status_other_input" class="mt-2 d-none">
                            <input type="text" class="form-control" name="land_status_other_value" placeholder="Sebutkan status tanah/bangunan">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">4. Kondisi Bangunan:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="building_condition" id="building_condition_permanent" value="Permanen" required>
                            <label class="form-check-label" for="building_condition_permanent">Permanen</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="building_condition" id="building_condition_semi" value="Semi Permanen">
                            <label class="form-check-label" for="building_condition_semi">Semi Permanen</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>D. Kapasitas Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="warehouse_item_type" class="form-label">1. Jenis Barang:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="warehouse_item_type" 
                            name="warehouse_item_type" 
                            placeholder="Masukkan jenis barang" 
                            required 
                        />
                    </div>
                    <div class="mb-3">
                        <label for="warehouse_capacity" class="form-label">2. Kapasitas Gudang:</label>
                        <input type="text" class="form-control" id="warehouse_capacity" name="warehouse_capacity" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>E. Jenis Komoditi dan Omset Penjualan Pertahun</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                            <label for="commodity_type" class="form-label">1. Komoditi:</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="commodity_type" 
                                name="commodity_type" 
                                placeholder="Masukkan komoditi" 
                                required 
                            />
                        </div>
                    <div class="mb-3">
                        <label for="annual_sales" class="form-label">2. Omset Penjualan/Tahun (Rp):</label>
                        <input type="number" class="form-control" id="annual_sales" name="annual_sales" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>F. Data Gudang</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="warehouse_item_type" class="form-label">1. Jenis Barang:</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="warehouse_item_type" 
                            name="warehouse_item_type" 
                            placeholder="Masukkan jenis barang" 
                            required 
                        />
                    </div>
                    <div class="mb-3">
                        <label for="item_origin" class="form-label">2. Asal Barang:</label>
                        <input type="text" class="form-control" id="item_origin" name="item_origin" required>
                    </div>
                    <div class="mb-3">
                        <label for="storage_duration" class="form-label">3. Masa Simpan:</label>
                        <input type="text" class="form-control" id="storage_duration" name="storage_duration" required>
                    </div>
                    <div class="mb-3">
                        <label for="country_of_origin" class="form-label">4. Negara Asal:</label>
                        <input type="text" class="form-control" id="country_of_origin" name="country_of_origin" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>G. Pemasaran</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="domestic_market" class="form-label">1. Dalam Negeri (%):</label>
                        <input type="number" min="0" max="100" class="form-control" id="domestic_market" name="domestic_market" required>
                    </div>
                    <div class="mb-3">
                        <label for="export_market" class="form-label">2. Ekspor (%):</label>
                        <input type="number" min="0" max="100" class="form-control" id="export_market" name="export_market" required>
                    </div>
                    <div class="mb-3">
                        <label for="export_destination" class="form-label">3. Negara Tujuan:</label>
                        <input type="text" class="form-control" id="export_destination" name="export_destination" required>
                    </div>
                    <div class="mb-3">
                        <label for="export_value" class="form-label">4. Nilai Ekspor:</label>
                        <input type="number" class="form-control" id="export_value" name="export_value" required>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const indonesianWorkersInput = document.getElementById('indonesian_workers');
            const foreignWorkersInput = document.getElementById('foreign_workers');
            const totalWorkersInput = document.getElementById('total_workers');

            function updateTotalWorkers() {
                const indonesianWorkers = parseInt(indonesianWorkersInput.value) || 0;
                const foreignWorkers = parseInt(foreignWorkersInput.value) || 0;
                totalWorkersInput.value = indonesianWorkers + foreignWorkers;
            }

            indonesianWorkersInput.addEventListener('input', updateTotalWorkers);
            foreignWorkersInput.addEventListener('input', updateTotalWorkers);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const landStatusOther = document.getElementById('land_status_other');
            const landStatusOtherInput = document.getElementById('land_status_other_input');
            const domesticMarketInput = document.getElementById('domestic_market');
            const exportMarketInput = document.getElementById('export_market');

            landStatusOther.addEventListener('change', function() {
                landStatusOtherInput.classList.toggle('d-none', !this.checked);
            });

            function updateExportMarket() {
                const domesticValue = parseInt(domesticMarketInput.value) || 0;
                exportMarketInput.value = 100 - domesticValue;
            }

            domesticMarketInput.addEventListener('input', updateExportMarket);
            exportMarketInput.addEventListener('input', function() {
                const exportValue = parseInt(this.value) || 0;
                domesticMarketInput.value = 100 - exportValue;
            });
        });
    </script>
</body>
</html>

