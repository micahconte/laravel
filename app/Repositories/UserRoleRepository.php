<?php
namespace App\Repositories;

use App\User;
use App\UserRole;

class UserRoleRepository
{
	/**
	* Get all of the roles for a given user
	* @param User $user
	* @return Collection
	*/
	public function forUser(User $user, $filter=null)
	{
		if(empty($filter))
		{
			return UserRole::where('users.user_id', $user->id)
						->join('user_roles','user_roles.role_id','=','roles.id')
						->join('users','users.id','=','user_roles.user_id')
						->get();
		}
		else
		{
			return UserRole::where('users.user_id', $user->id)
						->where('roles.name','=',$filter)
						->join('user_roles','user_roles.role_id','=','roles.id')
						->join('users','users.id','=','user_roles.user_id')
						->first();
		}
	}
}