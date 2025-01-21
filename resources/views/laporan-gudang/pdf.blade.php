<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Gudang Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 18px;
            margin: 0 0 5px;
        }
        .subtitle {
            font-size: 14px;
            margin: 0 0 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 14px;
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 5px;
            margin-bottom: 10px;
        }
        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }
        .info-row {
            display: table-row;
        }
        .info-label {
            display: table-cell;
            width: 200px;
            padding: 3px 10px 3px 0;
            font-weight: bold;
        }
        .info-value {
            display: table-cell;
            padding: 3px 0;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 10px;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN DETAIL GUDANG</h1>
        <div class="subtitle">Nomor: {{ $laporan->id_gudang ?? $laporan->id }}</div>
    </div>

    <div class="section">
        <div class="section-title">Informasi Umum</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">ID Gudang</div>
                <div class="info-value">{{ $laporan->id_gudang ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">ID Permohonan Izin</div>
                <div class="info-value">{{ $laporan->id_permohonan_izin ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Status Verifikasi</div>
                <div class="info-value">{{ $laporan->status_verifikasi ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">NIB</div>
                <div class="info-value">{{ $laporan->nib }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informasi Perusahaan</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nama Perusahaan</div>
                <div class="info-value">{{ $laporan->nama_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Email Perusahaan</div>
                <div class="info-value">{{ $laporan->email_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">No. KTP/Paspor</div>
                <div class="info-value">{{ $laporan->nomor_ktp_paspor }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">No. Telepon</div>
                <div class="info-value">{{ $laporan->nomor_telepon }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Alamat Perusahaan</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $laporan->alamat_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kelurahan</div>
                <div class="info-value">{{ $laporan->kelurahan_perusahaan }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kecamatan</div>
                <div class="info-value">{{ $laporan->kecamatan_perusahaan }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Informasi Gudang</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Alamat</div>
                <div class="info-value">{{ $laporan->alamat_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kelurahan</div>
                <div class="info-value">{{ $laporan->kelurahan_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kecamatan</div>
                <div class="info-value">{{ $laporan->kecamatan_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kab/Kota</div>
                <div class="info-value">{{ $laporan->kab_kota_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Provinsi</div>
                <div class="info-value">{{ $laporan->provinsi_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Koordinat</div>
                <div class="info-value">Lat: {{ $laporan->koordinat_lat }}, Long: {{ $laporan->koordinat_long }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Spesifikasi Gudang</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-label">Nomor TDG</div>
                <div class="info-value">{{ $laporan->nomor_tdg ?? '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Tanggal Terbit TDG</div>
                <div class="info-value">{{ $laporan->tanggal_terbit_tdg ? $laporan->tanggal_terbit_tdg->format('d/m/Y') : '-' }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Luas Bangunan</div>
                <div class="info-value">{{ number_format($laporan->luas_bangunan, 2) }} m²</div>
            </div>
            <div class="info-row">
                <div class="info-label">Kapasitas</div>
                <div class="info-value">{{ number_format($laporan->kapasitas_gudang, 2) }} m³/ton</div>
            </div>
            <div class="info-row">
                <div class="info-label">Golongan</div>
                <div class="info-value">{{ $laporan->golongan_gudang }}</div>
            </div>
            <div class="info-row">
                <div class="info-label">Fasilitas</div>
                <div class="info-value">{{ $laporan->fasilitas }}</div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Jenis Barang</div>
        <div class="info-grid">
            @if(is_array($laporan->jenis_barang))
                @foreach($laporan->jenis_barang as $index => $barang)
                    <div class="info-row">
                        <div class="info-label">Barang {{ $index + 1 }}</div>
                        <div class="info-value">{{ $barang }}</div>
                    </div>
                @endforeach
            @else
                <div class="info-row">
                    <div class="info-label">Barang</div>
                    <div class="info-value">{{ $laporan->jenis_barang }}</div>
                </div>
            @endif
        </div>
    </div>

    @if($laporan->catatan)
    <div class="section">
        <div class="section-title">Catatan</div>
        <div class="info-grid">
            <div class="info-row">
                <div class="info-value">{{ $laporan->catatan }}</div>
            </div>
        </div>
    </div>
    @endif

    <div class="footer">
        Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>

