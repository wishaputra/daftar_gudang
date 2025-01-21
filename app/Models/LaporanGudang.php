<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanGudang extends Model
{
    use HasFactory;

    protected $table = 'laporan_gudang';

    protected $fillable = [
        'user_id', 'id_gudang', 'id_permohonan_izin', 'status_verifikasi', 'nib', 'nama_perusahaan',
        'nomor_ktp_paspor', 'email_perusahaan', 'alamat_perusahaan', 'kelurahan_perusahaan',
        'kecamatan_perusahaan', 'nomor_telepon', 'alamat_gudang', 'kelurahan_gudang',
        'kecamatan_gudang', 'kab_kota_gudang', 'provinsi_gudang', 'koordinat_lat',
        'koordinat_long', 'nomor_tdg', 'tanggal_terbit_tdg', 'luas_bangunan',
        'kapasitas_gudang', 'golongan_gudang', 'fasilitas', 'jenis_barang', 'catatan'
    ];

    protected $casts = [
        'jenis_barang' => 'array',
        'tanggal_terbit_tdg' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}