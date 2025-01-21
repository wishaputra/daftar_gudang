<!-- Note: 
 fitur user untuk liat report yang udah di isi
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Administrasi Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <form action="{{ route('pencatatan.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="company_header" class="form-label">KOP PERUSAHAAN PENGELOLA GUDANG:</label>
                <input type="file" class="form-control" id="company_header" name="company_header" accept="image/*" required>
            </div>

            <h2 class="text-center mb-4">PENCATATAN ADMINISTRASI GUDANG</h2>

            <div class="mb-3">
                <label for="nomor" class="form-label">Nomor:</label>
                <input type="text" class="form-control" id="nomor" name="nomor" required>
            </div>

            <div class="mb-3">
                <label for="penanggung_jawab" class="form-label">Nama Penanggung Jawab Gudang:</label>
                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" required>
            </div>

            <div class="mb-3">
                <label for="alamat_penanggung_jawab" class="form-label">Alamat Penanggung Jawab Gudang:</label>
                <textarea class="form-control" id="alamat_penanggung_jawab" name="alamat_penanggung_jawab" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="alamat_gudang" class="form-label">Alamat Gudang:</label>
                <textarea class="form-control" id="alamat_gudang" name="alamat_gudang" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="periode_bulan" class="form-label">Periode Bulan:</label>
                <input type="date" class="form-control" id="periode_bulan" name="periode_bulan" required>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="pencatatanTable">
                    <thead>
                        <tr>
                            <th colspan="2">PENERIMAAN (KG/UNIT/LITER)</th>
                            <th colspan="2">PENGELUARAN (KG/UNIT/LITER)</th>
                            <th colspan="2">STOK AKHIR (KG/UNIT/LITER)</th>
                            <th rowspan="2">KET.</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th>NAMA JENIS/KELOMPOK BARANG</th>
                            <th>JUMLAH/VOLUME</th>
                            <th>NAMA JENIS/KELOMPOK BARANG</th>
                            <th>JUMLAH/VOLUME</th>
                            <th>NAMA JENIS/KELOMPOK BARANG</th>
                            <th>JUMLAH/VOLUME</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" class="form-control" name="penerimaan_nama[]" required></td>
                            <td><input type="number" class="form-control" name="penerimaan_jumlah[]" required></td>
                            <td><input type="text" class="form-control" name="pengeluaran_nama[]" required></td>
                            <td><input type="number" class="form-control" name="pengeluaran_jumlah[]" required></td>
                            <td><input type="text" class="form-control" name="stok_nama[]" required></td>
                            <td><input type="number" class="form-control" name="stok_jumlah[]" required></td>
                            <td><input type="text" class="form-control" name="keterangan[]"></td>
                            <td><button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mb-3">
                <button type="button" class="btn btn-primary" id="addRow">Tambah Baris</button>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const table = document.getElementById('pencatatanTable');
            const addRowBtn = document.getElementById('addRow');

            addRowBtn.addEventListener('click', function() {
                const newRow = table.insertRow(-1);
                newRow.innerHTML = `
                    <td><input type="text" class="form-control" name="penerimaan_nama[]" required></td>
                    <td><input type="number" class="form-control" name="penerimaan_jumlah[]" required></td>
                    <td><input type="text" class="form-control" name="pengeluaran_nama[]" required></td>
                    <td><input type="number" class="form-control" name="pengeluaran_jumlah[]" required></td>
                    <td><input type="text" class="form-control" name="stok_nama[]" required></td>
                    <td><input type="number" class="form-control" name="stok_jumlah[]" required></td>
                    <td><input type="text" class="form-control" name="keterangan[]"></td>
                    <td><button type="button" class="btn btn-danger btn-sm remove-row">Hapus</button></td>
                `;
            });

            table.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-row')) {
                    if (table.rows.length > 2) {
                        e.target.closest('tr').remove();
                    } else {
                        alert('Tidak dapat menghapus baris terakhir.');
                    }
                }
            });
        });
    </script>
</body>
</html>