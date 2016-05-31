<?php

namespace App\Http\Controllers;

use App\Role;
use App\UserRole;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    function __construct()
    {

    }

    public function index(Request $request)
    {
    	return view('roles.index', 
			    		[
							'users' => $request->user()
										->select(
											'users.id as user_id',
											'users.name as user_name',
											'user_roles.id as user_role_id'
											)
										->leftJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
										->get(),
							'role' => Role::select('id')->where('name','=','admin')->first()
						]
					);
    }

    public function add(Request $request)
    {
    	$user_role = new UserRole();
    	$user_role->role_id = $request->get('role_id');
    	$user_role->user_id = $request->get('user_id');
    	$user_role->save();
    	return json_encode(['id'=>$user_role->id]);
    }

    public function remove(Request $request, UserRole $user_role)
    {
    	$user_role->delete();
    }
}
