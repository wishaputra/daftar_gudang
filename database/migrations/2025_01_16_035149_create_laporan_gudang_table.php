<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanGudangTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_gudang', function (Blueprint $table) {
            $table->id();
            $table->string('id_gudang')->nullable();
            $table->string('id_permohonan_izin')->nullable();
            $table->string('status_verifikasi')->nullable();
            $table->string('nib');
            $table->string('nama_perusahaan');
            $table->string('nomor_ktp_paspor');
            $table->string('email_perusahaan');
            $table->text('alamat_perusahaan');
            $table->string('kelurahan_perusahaan');
            $table->string('kecamatan_perusahaan');
            $table->string('nomor_telepon');
            $table->text('alamat_gudang');
            $table->string('kelurahan_gudang');
            $table->string('kecamatan_gudang');
            $table->string('kab_kota_gudang');
            $table->string('provinsi_gudang');
            $table->string('koordinat_lat');
            $table->string('koordinat_long');
            $table->string('nomor_tdg')->nullable();
            $table->date('tanggal_terbit_tdg')->nullable();
            $table->decimal('luas_bangunan', 10, 2);
            $table->decimal('kapasitas_gudang', 10, 2);
            $table->string('golongan_gudang');
            $table->string('fasilitas');
            $table->json('jenis_barang');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_gudang');
    }
}

