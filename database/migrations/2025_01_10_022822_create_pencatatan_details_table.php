<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('pencatatan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pencatatan_id')->constrained()->onDelete('cascade');
            $table->string('penerimaan_nama');
            $table->decimal('penerimaan_jumlah', 10, 2);
            $table->string('pengeluaran_nama');
            $table->decimal('pengeluaran_jumlah', 10, 2);
            $table->string('stok_nama');
            $table->decimal('stok_jumlah', 10, 2);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pencatatan_details');
    }
}

