<?php

namespace App\Policies;

use App\Reserve;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReservePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any reserves.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the reserve.
     *
     * @param \App\User    $user
     * @param \App\Reserve $reserve
     * @return mixed
     */
    public function view(User $user, Reserve $reserve)
    {
        return $user->id == $reserve->court->created_by->id;
    }

    /**
     * Determine whether the user can create reserves.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the reserve.
     *
     * @param \App\User    $user
     * @param \App\Reserve $reserve
     * @return mixed
     */
    public function update(User $user, Reserve $reserve)
    {
        return $user->id == $reserve->court->created_by->id;
    }

    /**
     * Determine whether the user can delete the reserve.
     *
     * @param \App\User    $user
     * @param \App\Reserve $reserve
     * @return mixed
     */
    public function delete(User $user, Reserve $reserve)
    {
        return $user->id == $reserve->court->created_by->id;
    }
}
