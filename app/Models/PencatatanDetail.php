<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencatatanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'penerimaan_nama',
        'penerimaan_jumlah',
        'pengeluaran_nama',
        'pengeluaran_jumlah',
        'stok_nama',
        'stok_jumlah',
        'keterangan',
    ];

    public function pencatatan()
    {
        return $this->belongsTo(Pencatatan::class);
    }
}

