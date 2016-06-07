<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware'=>['web']], function(){

	Route::get('/', function(){
		return view('welcome');
	});
	Route::get('/facebook', 'Auth\AuthController@facebook');
	Route::get('/github', 'Auth\AuthController@github');

	Route::get('/home', 'IndexController@home');

	Route::auth();
});

Route::group(['middleware'=>['auth']], function(){


	Route::get('/tasks', 'TaskController@index');
	Route::post('/task', 'TaskController@store');
	Route::delete('/task/{task}', 'TaskController@destroy');


	Route::get('/contacts', 'ContactController@index');
	Route::post('/contacts', 'ContactController@store');
	Route::get('/contacts/{contact}', 'ContactController@contact');
	Route::post('/contacts/{contact}', 'ContactController@update');
	Route::delete('/contacts/{contact}', 'ContactController@destroy');


	Route::get('/campaign/contact/{contact}', 'ContactController@addCampaignContact');
	Route::post('/campaign/contact/{contact}', 'ContactController@updateCampaignContact');
	Route::get('/campaign/list/{user}', 'Auth\AuthController@addCampaignList');

	Route::get('/datatable', 'ContactController@datatable');
	Route::get('/addresstable', 'AddressController@datatable');

	Route::get('/cards', 'CardsController@index');


	Route::get('/curl', 'CurlController@index');
	Route::post('/curl', 'CurlController@send');
	
});

Route::group(['middleware'=>['auth','role:admin']], function(){
	Route::get('/upload', 'UploadController@index');
	Route::post('/upload', 'UploadController@index');

	Route::get('/roles', 'RoleController@index');
	Route::post('/roles', 'RoleController@add');
	Route::delete('/roles/{user_role}', 'RoleController@remove');

	Route::get('/address', 'AddressController@index');
	Route::post('/address', 'AddressController@store');
	Route::get('/address/{address}', 'AddressController@address');
	Route::post('/address/{address}', 'AddressController@update');
	Route::delete('/address/{address}', 'AddressController@destroy');
});

Route::group(['middleware'=>['api']], function(){

	Route::match(['post','get'], '/curlRequest', 'ApiController@curl');

});
