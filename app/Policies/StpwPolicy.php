<?php

namespace App\Policies;

use App\Models\Stpw;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StpwPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Stpw $stpw)
    {
        return $user->id === $stpw->user_id;
    }

    public function update(User $user, Stpw $stpw)
    {
        return $user->id === $stpw->user_id;
    }

    public function delete(User $user, Stpw $stpw)
    {
        return $user->id === $stpw->user_id;
    }
}

