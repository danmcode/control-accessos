<?php

namespace App\Policies;

use App\Models\User;

class RolPolicy
{
    public function accessConfiguration(User $user) //Administrador
    {
        return $user->rol_id === 1;
    }

    //Administrador - Guarda de seguridad - Jefe de Seguridad / Coordinador
    public function accessAGSJC(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3;
    }
    // Administrador - Guarda de seguridad - Jefe S - Coordinador - Directores - Jefe A - Colaborador 
    public function accessAGSJCDJAC(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 4 || $user->rol_id === 5;
    }

    // Administrador - Guarda de seguridad - Jefe S - Coordinador - Directores - Jefe A 
    public function accessAGSJCDJA(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 4;
    }

    // Administrador - Guarda de seguridad - Jefe S - Coordinador - Colaborador
    public function accessAGSJCC(User $user)
    {
        return $user->rol_id === 1 || $user->rol_id === 2 || $user->rol_id === 3 || $user->rol_id === 5;
    }


    // Directores - Jefe A - Colaborador
    public function accessDJAC(User $user)
    {
        return $user->rol_id === 4 || $user->rol_id === 5;
    }
}
