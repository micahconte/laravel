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
		// return Auth::check() ? "Welcome back ". Auth::user()->username : "Hi guest <a href=".url('login').">Login with GitHub</a>";

	});


	Route::get('/facebook', 'Auth\AuthController@facebook');
	Route::get('/github', 'Auth\AuthController@github');

	Route::get('/home', 'IndexController@home');

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
	Route::get('/campaign/list/{user}', 	  'Auth\AuthController@addCampaignList');

	Route::get('/datatable', 'ContactController@datatable');

	Route::get('/curl', 'CurlController@index');
	Route::post('/curl', 'CurlController@send');

	Route::get('/cards', 'CardsController@index');

	Route::auth();
});
