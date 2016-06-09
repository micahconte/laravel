<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function resume(Request $request, Response $response)
    {
        return \Response::download(base_path().'/public/file/micah_conte_resume.doc');
    }

    public function coverLetter(Request $request, Response $response)
    {
        return \Response::download(base_path().'/public/file/micah_conte_cover_letter.doc');
    }
}
