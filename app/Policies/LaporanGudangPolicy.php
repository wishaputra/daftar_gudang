<?php

namespace App\Policies;

use App\Models\LaporanGudang;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LaporanGudangPolicy
{
    use HandlesAuthorization;

    public function view(User $user, LaporanGudang $laporanGudang)
    {
        return $user->id === $laporanGudang->user_id;
    }

    // public function update(User $user, LaporanGudang $laporanGudang)
    // {
    //     return $user->id === $laporanGudang->user_id;
    // }

    public function delete(User $user, LaporanGudang $laporanGudang)
    {
        return $user->id === $laporanGudang->user_id;
    }
}

