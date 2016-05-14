<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;

class CurlController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a list of all the user's tasks
    *
    * @param Request @request
    * @return Response
    */
    public function index(Request $request)
    {
    	return view('curl.index');
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
	    	'resume'       => $request->get('resume'),
            '_token'       => $request->get('_token')
    	];

    	return view('curl.index', ['result' => $this->curl($data)]);
    }

    public function receive(Request $request)
    {
        return 'true';
    }

    private function curl($data)
    {
    	return Curl::to('http://www.micahconte.info/curlRequest')
                        ->withData($data)
                        ->enableDebug(storage_path().'/logs/curl.log')
                        ->asJson()
                        ->post();
    }

    private function curlo($data)
    {
		$content = json_encode($data);

		$curl = curl_init('http://www.micahconte.info/curlRequest');
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
		        array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        curl_setopt($curl, CURLOPT_USERAGENT, "User-Agent: Some-Agent/1.0");

		$json_response = curl_exec($curl);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		if ( $status != 201 ) {
		    dd("Error: call to URL failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}

		curl_close($curl);

		$response = json_decode($json_response, true);
    }

}
