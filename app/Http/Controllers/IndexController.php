<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends Controller
{

    function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function home(Request $request)
    {
    	return view('home');
    }
}
