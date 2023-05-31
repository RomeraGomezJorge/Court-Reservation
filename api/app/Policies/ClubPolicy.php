<?php

namespace App\Policies;

use App\Club;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function view(User $user, Club $club)
    {
        return $user->id == $club->created_by_id;
    }

    /**
     * Determine whether the user can update the club.
     *
     * @param  \App\User  $user
     * @param  \App\Club  $club
     * @return mixed
     */
    public function update(User $user, Club $club)
    {
        return $user->id == $club->created_by_id;
    }

 }

