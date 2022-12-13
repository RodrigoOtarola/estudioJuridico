<?php

namespace App\Policies;

use App\Models\Causes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CausasPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function before($user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Causes  $causes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Causes $causes)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,User $authUser)
    {
        //Compara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Causes  $causes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $authUser)
    {

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Causes  $causes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Causes $causes)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Causes  $causes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Causes $causes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Causes  $causes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Causes $causes)
    {
        //
    }
}
