<?php

namespace App\Policies;

use App\Models\Autosrobado;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EditPolicy
{
    use HandlesAuthorization;

    public function editor(User $user,Autosrobado $autosrobado)
    {
        return $user->id === $autosrobado->user_id;

    }
}
