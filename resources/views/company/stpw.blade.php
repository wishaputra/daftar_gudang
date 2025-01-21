@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULIR PENDATAAN SURAT TANDA PENDAFTARAN WARALABA ( STPW )</title>
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

        <form action="{{ route('stpw.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center mb-4">
            <p>FORMULIR PENDATAAN SURAT TANDA PENDAFTARAN WARALABA ( STPW )</p>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="company_address" class="form-label">Alamat Perusahaan:</label>
                        <textarea class="form-control" id="company_address" name="company_address" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="store_name" class="form-label">Nama Toko:</label>
                        <input type="text" class="form-control" id="store_name" name="store_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="store_address" class="form-label">Alamat Toko:</label>
                        <textarea class="form-control" id="store_address" name="store_address" rows="3" required></textarea>
                        <small class="form-text text-muted">Harus ada kelurahan dan kecamatan</small>
                    </div>
                    <div class="mb-3">
                        <label for="trademark" class="form-label">Merek Dagang:</label>
                        <input type="text" class="form-control" id="trademark" name="trademark" required>
                    </div>
                    <div class="mb-3">
                        <label for="responsible_person" class="form-label">Penanggung Jawab:</label>
                        <input type="text" class="form-control" id="responsible_person" name="responsible_person" required>
                    </div>
                    <div class="mb-3">
                        <label for="business_types" class="form-label">5. Bidang Usaha:</label>
                        <input 
                            class="form-control" 
                            id="business_types" 
                            name="business_types" 
                            list="business_types_list" 
                            placeholder="Pilih atau ketik Bidang Usaha" 
                            required
                        />
                        <datalist id="business_types_list">
                            @foreach($businessTypes as $field)
                                <option value="{{ $field }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="investment_value" class="form-label">Nilai Investasi:</label>
                        <input type="number" class="form-control" id="investment_value" name="investment_value" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Waralaba:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="franchise_type" id="non_franchise" value="Bukan Waralaba" required>
                            <label class="form-check-label" for="non_franchise">Bukan Waralaba</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="franchise_type" id="franchise" value="Waralaba">
                            <label class="form-check-label" for="franchise">Waralaba</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>A. Kelengkapan Dokumen</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nib_copy" class="form-label">Foto Copy NIB:</label>
                        <input type="file" class="form-control" id="nib_copy" name="nib_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="franchise_prospectus_copy" class="form-label">Foto Copy Prospektus Penawaran Waralaba:</label>
                        <input type="file" class="form-control" id="franchise_prospectus_copy" name="franchise_prospectus_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="franchise_agreement_copy" class="form-label">Foto Copy Perjanjian Waralaba:</label>
                        <input type="file" class="form-control" id="franchise_agreement_copy" name="franchise_agreement_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="intellectual_property_copy" class="form-label">Foto Copy Hak Kekayaan Intelektual (HKI):</label>
                        <input type="file" class="form-control" id="intellectual_property_copy" name="intellectual_property_copy" required>
                    </div>
                    <div class="mb-3">
                        <label for="building_approval_copy" class="form-label">Foto Copy Persetujuan Bangunan Gedung (PBG):</label>
                        <input type="file" class="form-control" id="building_approval_copy" name="building_approval_copy" required>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>B. Jenis Pelayanan</h4>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="service_type" id="fixed_price" value="Harga Pasti" required>
                        <label class="form-check-label" for="fixed_price">Harga Pasti</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="service_type" id="negotiable_price" value="Harga Tawar Menawar">
                        <label class="form-check-label" for="negotiable_price">Harga Tawar Menawar</label>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>C. Kepemilikan Bangunan</h4>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="building_ownership" id="self_owned" value="Milik Sendiri" required>
                        <label class="form-check-label" for="self_owned">Milik Sendiri</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="building_ownership" id="rented" value="Sewa">
                        <label class="form-check-label" for="rented">Sewa</label>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>D. Kondisi Fisik/Teknis</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="franchised_goods_composition" class="form-label">1. Komposisi Barang/Bahan Baku yang diwaralabakan:</label>
                        <textarea class="form-control" id="franchised_goods_composition" name="franchised_goods_composition" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="workforce" class="form-label">2. Tenaga Kerja:</label>
                        <input type="number" class="form-control" id="workforce" name="workforce" required>
                    </div>
                    <div class="mb-3">
                        <label for="allowed_other_products" class="form-label">3. Apakah diperbolehkan menjual produk selain yang diwaralabakan:</label>
                        <input type="text" class="form-control" id="allowed_other_products" name="allowed_other_products" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">4. Asal Distributor Produk:</label>
                        <div id="distributors">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="distributors[]" required>
                                <button type="button" class="btn btn-success add-distributor">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">5. Fasilitas Bangunan:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="building_facility" id="ac" value="AC" required>
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="building_facility" id="non_ac" value="Non AC">
                            <label class="form-check-label" for="non_ac">Non AC</label>
                        </div>
                        <div id="ac_units" class="mt-2 d-none">
                            <label for="ac_unit_count" class="form-label">Jumlah Unit AC:</label>
                            <input type="number" class="form-control" id="ac_unit_count" name="ac_unit_count">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h4>E. Catatan</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <p class="fst-italic">
                    Berdasarkan Peraturan Menteri Perdagangan Republik Indonesia Nomor 71 Tahun 2019 Tentang Penyelenggaraan Waralaba segera lengkapi dan diserahkan ke kantor Disperindag Kota Tangerang Selatan Jl. Maruga Raya No. 1 Lantai 1 Serua Ciputat Tangerang Selatan.
                </p>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const distributorsContainer = document.getElementById('distributors');
            const addDistributorBtn = distributorsContainer.querySelector('.add-distributor');

            addDistributorBtn.addEventListener('click', function() {
                const newDistributor = document.createElement('div');
                newDistributor.className = 'input-group mb-2';
                newDistributor.innerHTML = `
                    <input type="text" class="form-control" name="distributors[]" required>
                    <button type="button" class="btn btn-danger remove-distributor">-</button>
                `;
                distributorsContainer.insertBefore(newDistributor, addDistributorBtn.parentNode);
            });

            distributorsContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-distributor')) {
                    e.target.closest('.input-group').remove();
                }
            });

            const acRadio = document.getElementById('ac');
            const nonAcRadio = document.getElementById('non_ac');
            const acUnitsDiv = document.getElementById('ac_units');

            acRadio.addEventListener('change', function() {
                acUnitsDiv.classList.toggle('d-none', !this.checked);
            });

            nonAcRadio.addEventListener('change', function() {
                acUnitsDiv.classList.add('d-none');
            });
        });
    </script>
</body>
</html>
@endsection