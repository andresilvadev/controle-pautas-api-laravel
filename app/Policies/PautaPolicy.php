<?php

namespace App\Policies;

use App\User;
use App\Pauta;
use Illuminate\Auth\Access\HandlesAuthorization;

class PautaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pauta.
     *
     * @param  \App\User  $user
     * @param  \App\Pauta  $pauta
     * @return mixed
     */
    public function view(User $user, Pauta $pauta)
    {
        //
    }

    /**
     * Determine whether the user can create pautas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the pauta.
     *
     * @param  \App\User  $user
     * @param  \App\Pauta  $pauta
     * @return mixed
     */
    public function update(User $user, Pauta $pauta)
    {
        return $user->id === $pauta->user_id;
    }

    /**
     * Determine whether the user can delete the pauta.
     *
     * @param  \App\User  $user
     * @param  \App\Pauta  $pauta
     * @return mixed
     */
    public function delete(User $user, Pauta $pauta)
    {
        return $user->id === $pauta->user_id;
    }

    /**
     * Determine whether the user can restore the pauta.
     *
     * @param  \App\User  $user
     * @param  \App\Pauta  $pauta
     * @return mixed
     */
    public function restore(User $user, Pauta $pauta)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pauta.
     *
     * @param  \App\User  $user
     * @param  \App\Pauta  $pauta
     * @return mixed
     */
    public function forceDelete(User $user, Pauta $pauta)
    {
        //
    }
}
