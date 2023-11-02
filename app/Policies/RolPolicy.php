<?php

namespace App\Policies;

use App\Models\User;

class RolPolicy
{
    public function accessConfiguration(User $user)
    {
        return $user->rol_id === 1;
    }

    public function accessAGSJC(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3;
    }

    public function accessAGSJCDJAC(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 4 || $user->rol_id === 5;
    }
}
