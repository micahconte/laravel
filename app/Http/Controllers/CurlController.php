<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api;

class CurlController extends Controller
{
    private $url;

    function __construct()
    {
        $this->url = url('/curlRequest');
    }
    /**
    * Display a list of all the user's tasks
    *
    * @param Request @request
    * @return Response
    */
    public function index(Request $request)
    {
    	return view('curl.index', ['url' => url($this->url)]);
    }

    /**
    * Create a new task
    *
    * @param Request $request
    * @return Response
    */
    public function send(Request $request)
    {
    	$this->validate($request, [
    		'name'    => 'required|max:255|min:2',
    		'email'   => 'required|email|min:2',
    		'phone'   => 'required|phone:US|max:15|min:7',
    	]);

    	$data = [
	    	'name'         => $request->get('name'),
	    	'email'        => $request->get('email'),
	    	'phoneNumber'  => $request->get('phone'),
            '_token'       => $request->get('_token')
    	];

    	return view('curl.index', ['url' => $this->url, 'result' => Api::guzzle($this->url, $data)->getBody()]);
    }
}
