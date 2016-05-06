<?php

namespace App\Policies;

use App\User;
use App\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
     * @param  Contact  $contact
     * @return bool
     */
    public function destroy(User $user, Contact $contact)
    {
        return intval($user->id) === intval($contact->user_id);
    }
}
