<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Pencatatan;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function laporanGudang()
    {
        return $this->hasMany(LaporanGudang::class);
    }

    public function stpws()
    {
        return $this->hasMany(Stpw::class);
    }

    public function pencatatans()
    {
        return $this->hasMany(Pencatatan::class);
    }
}