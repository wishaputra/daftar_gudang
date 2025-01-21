<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatansTable extends Migration
{
    public function up()
    {
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id();
            $table->string('company_header');
            $table->string('nomor');
            $table->string('penanggung_jawab');
            $table->text('alamat_penanggung_jawab');
            $table->text('alamat_gudang');
            $table->date('periode_bulan');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pencatatans');
    }
}

