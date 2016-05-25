<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JpGraph\JpGraph;
use Excel;

use App\Http\Requests;

class UploadController extends Controller
{

	private $counts = array();   
	private $legends = array();


	function __construct()
	{
		
	}

    public function index(Request $request)
    {
    	$url = 'file/';

    	if($request->hasFile('doc'))
    	{
    		$filePath = $url.$request->file('doc')->getClientOriginalName();
    		$request->file('doc')->move($url, $request->file('doc')->getClientOriginalName());
    		Excel::load($filePath, function($reader) {
			    // Loop through all sheets
				$reader->each(function($sheet) {
				    // Loop through all rows
				    $sheet->each(function($row) {
				    	// Legend and pie data 
						array_push($this->counts,$row->count);
						array_push($this->legends,$row->name);
				    });
				});
				JpGraph::module('pie');
				JpGraph::module('pie3d');


				$graph = new \PieGraph(450, 375);
			    $graph->SetShadow();
			  
			  	// Adding a theme
				// $theme_class= new \VividTheme;
				// $graph->SetTheme($theme_class);

			    // Naming the graphic  
			    // $graph->title->Set('Excel Upload');   
			  
			    // Legend positioning (%/100)   
			    $graph->legend->Pos(0.1, 0.05);   
			  
			    // Creating a 3D pie graphic   
			    $p1 = new \PiePlot3d($this->counts);   
			  
			    // Setting the graphic center (%/100)   
			    $p1->SetCenter(0.5, 0.6);   
			  
			    // Setting the angle   
			    $p1->SetAngle(55);   
			  
			    // Setting legends for graphic segments  
			    $p1->SetLegends($this->legends); 
			  
			    // Adding the diagram to the graphic  
			    $graph->Add($p1); 

			    // Showing graphic  
			    $graph->Stroke('img/charts/pie.png');   
			});
    	}
    	return view('upload.index', [
    					'image'=> file_exists('img/charts/pie.png') ? 'img/charts/pie.png?'.microtime() : ''
    				]);
    }
}
