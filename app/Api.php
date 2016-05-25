<?php

namespace App;

use Curl;
use GuzzleHttp;

class Api
{

    public static function curl($url, $data)
    {
    	return Curl::to($url)
                        ->withData($data)
                        ->enableDebug(storage_path().'/logs/curl.log')
                        ->asJson()
                        ->post();
    }

    public static function guzzle($url, $data)
    {
        $res = new GuzzleHttp();
        return $res->post($url, null, $data)->send();
    }

    public static function curlo($url, $data)
    {
		$content = json_encode($data);

		$curl = curl_init($url);
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