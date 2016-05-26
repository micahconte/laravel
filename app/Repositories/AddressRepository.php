<?php
namespace App\Repositories;

use App\User;
use App\Address;

class AddressRepository
{
	/**
	* Get all of the tasks for a given user
	* @param User $user
	* @return Collection
	*/
	public function forUser(User $user, $filter=null)
	{
		if(empty($filter))
		{
			return Address::where('user_id', $user->id)
						->orderBy('created_at', 'asc')
						->get();
		}
		else
		{
			return Address::where('user_id', $user->id)
						->where('address', 'LIKE', "%$filter%")
						->orWhere('city', 'LIKE', "%$filter%")
						->orWhere('state', 'LIKE', "%$filter%")
						->orWhere('zip', 'LIKE', "%$filter%")
						->orderBy('created_at', 'asc')
						->get();
		}
	}
}