<?php

namespace App\Policies;

use App\Court;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourtPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any courts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the court.
     *
     * @param  \App\User  $user
     * @param  \App\Court  $court
     * @return mixed
     */
    public function view(User $user, Court $court)
    {
        return $user->id == $court->created_by->id;
    }

    /**
     * Determine whether the user can create courts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the court.
     *
     * @param  \App\User  $user
     * @param  \App\Court  $court
     * @return mixed
     */
    public function update(User $user, Court $court)
    {
        return $user->id == $court->created_by->id;
    }

    /**
     * Determine whether the user can delete the court.
     *
     * @param  \App\User  $user
     * @param  \App\Court  $court
     * @return mixed
     */
    public function delete(User $user, Court $court)
    {
        return $user->id == $court->created_by->id;
    }

}
