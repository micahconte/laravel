<?php

namespace App\Http\Controllers;

use App\Role;
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
											'roles.id as role_id',
											'roles.name as role_name'
											)
										->leftJoin('roles', 'users.id', '=', 'roles.user_id')
										->get()
						]
					);
    }

    public function add(Request $request)
    {
    	$role = new Role();
    	$role->name = $request->get('role');
    	$role->user_id = $request->get('user');
    	$role->save();
    }

    public function remove(Request $request, Role $role)
    {
    	$role->delete();
    }
}
