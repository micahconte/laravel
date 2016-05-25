<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{

    public function curl(Request $request)
    {
        return $request->all();
    }
}
