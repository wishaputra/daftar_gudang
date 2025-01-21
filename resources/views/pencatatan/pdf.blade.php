<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Administrasi Gudang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            line-height: 1.3;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header h2 {
            font-size: 14px;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 0.5px solid #ddd;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .info-table th {
            width: 30%;
        }
        .details-table th, .details-table td {
            font-size: 8px;
            padding: 2px;
        }
        .details-table th {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>PENCATATAN ADMINISTRASI GUDANG</h2>
    </div>

    <table class="info-table">
        <tr>
            <th>Nomor:</th>
            <td>{{ $pencatatan->nomor }}</td>
        </tr>
        <tr>
            <th>Nama Penanggung Jawab Gudang:</th>
            <td>{{ $pencatatan->penanggung_jawab }}</td>
        </tr>
        <tr>
            <th>Alamat Penanggung Jawab Gudang:</th>
            <td>{{ $pencatatan->alamat_penanggung_jawab }}</td>
        </tr>
        <tr>
            <th>Alamat Gudang:</th>
            <td>{{ $pencatatan->alamat_gudang }}</td>
        </tr>
        <tr>
            <th>Periode Bulan:</th>
            <td>{{ $pencatatan->periode_bulan->format('F Y') }}</td>
        </tr>
    </table>

    <table class="details-table">
        <thead>
            <tr>
                <th colspan="2">PENERIMAAN (KG/UNIT/LITER)</th>
                <th colspan="2">PENGELUARAN (KG/UNIT/LITER)</th>
                <th colspan="2">STOK AKHIR (KG/UNIT/LITER)</th>
                <th>KET.</th>
            </tr>
            <tr>
                <th>NAMA JENIS/KELOMPOK BARANG</th>
                <th>JUMLAH/VOLUME</th>
                <th>NAMA JENIS/KELOMPOK BARANG</th>
                <th>JUMLAH/VOLUME</th>
                <th>NAMA JENIS/KELOMPOK BARANG</th>
                <th>JUMLAH/VOLUME</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pencatatan->details as $detail)
                <tr>
                    <td>{{ $detail->penerimaan_nama }}</td>
                    <td>{{ number_format($detail->penerimaan_jumlah, 2) }}</td>
                    <td>{{ $detail->pengeluaran_nama }}</td>
                    <td>{{ number_format($detail->pengeluaran_jumlah, 2) }}</td>
                    <td>{{ $detail->stok_nama }}</td>
                    <td>{{ number_format($detail->stok_jumlah, 2) }}</td>
                    <td>{{ $detail->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="info-table">
        <tr>
            <th>Tanggal:</th>
            <td>{{ $pencatatan->tanggal->format('d/m/Y') }}</td>
        </tr>
    </table>
</body>
</html>

