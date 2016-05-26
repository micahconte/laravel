<?php

namespace App\Policies;

use App\User;
use App\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Address  $address
     * @return bool
     */
    public function modify(User $user, Address $address)
    {
        return intval($user->id) === intval($address->user_id);
    }
}
