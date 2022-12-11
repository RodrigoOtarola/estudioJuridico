<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    //Ejecutara este metodo antes que los demas, si se devuelve un true no ejecutara los demas, valida si el usuario es admin.
    //método is admin, se encuentra en el modelo User

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
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $authUser, User $user)
    {
        //Compara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function edit(User $authUser, User $user)
    {
        //Se debe conpara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }


    public function update(User $authUser, User $user)
    {
        //Compara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $authUser, User $user)
    {
        //Compara el usuario autenticado con el del modelo.
        return $authUser->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Team $team)
    {
        //
    }
}
