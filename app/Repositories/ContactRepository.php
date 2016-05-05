<?php
namespace App\Repositories;

use App\User;
use App\Contact;

class ContactRepository
{
	/**
	* Get all of the tasks for a given user
	* @param User $user
	* @return Collection
	*/
	public function forUser(User $user, $filter=null)
	{
		if(!empty($filter))
		{
			return Contact::where('user_id', $user->id)
						->orderBy('created_at', 'asc')
						->get();
		}
		else
		{
			return Contact::where('user_id', $user->id)
						->where('name', 'LIKE', "%$filter%")
						->orWhere('email', 'LIKE', "%$filter%")
						->orWhere('phone', 'LIKE', "%$filter%")
						->orderBy('created_at', 'asc')
						->get();
		}
	}
}