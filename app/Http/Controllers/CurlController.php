<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Curl;
use GuzzleHttp;

class CurlController extends Controller
{
    private $url;

    function __construct()
    {
        $this->url = url('/curlRequest');
        // $this->middleware('auth');
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
	    	'phoneNumber'  => $request->get('phone')
    	];

    	return view('curl.index', ['url' => $this->url, 'result' => $this->guzzle($data)->getBody()]);
    }



    public function receive(Request $request)
    {
        return $request->all();
    }



    private function curl($data)
    {
    	return Curl::to($this->url)
                        ->withData($data)
                        ->enableDebug(storage_path().'/logs/curl.log')
                        ->asJson()
                        ->post();
    }

    private function guzzle($data)
    {
        $res = new GuzzleHttp();
        return $res->post(url($this->url), null, $data)->send();
    }

    private function curlo($data)
    {
		$content = json_encode($data);

		$curl = curl_init($this->url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER,
		        array("Content-type: application/json"));
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        // curl_setopt($curl, CURLOPT_USERAGENT, "User-Agent: Some-Agent/1.0");

		$json_response = curl_exec($curl);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		if ( $status != 201 ) {
		    dd("Error: call to URL failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}

		curl_close($curl);

		$response = json_decode($json_response, true);
    }

}
