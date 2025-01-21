<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_header',
        'nomor',
        'penanggung_jawab',
        'alamat_penanggung_jawab',
        'alamat_gudang',
        'periode_bulan',
        'tanggal',
    ];

    protected $casts = [
        'periode_bulan' => 'date',
        'tanggal' => 'date',
    ];

    public function details()
    {
        return $this->hasMany(PencatatanDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

