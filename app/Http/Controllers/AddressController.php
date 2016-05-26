<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use App\Api;
use App\Http\Requests;
use App\Repositories\AddressRepository;

class AddressController extends Controller
{
    protected $address;

	/**
	* Creates a new controller instance
	*
	* @return void
	*/
    public function __construct(AddressRepository $address)
    {
    	$this->address = $address;
    }


    function index(Request $request)
    {
    	return view('address.index', [
    		'address' => array(),
    		'states' => $this->states()
    	]);
    }


    /**
    * Create a new address
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
    	$validation = $this->validate($request, [
            'address'   => 'required|max:255|min:2',
            'city' 		=> 'required|max:255|min:2',
            'state'   	=> 'required|max:2|min:2'
    	]);

        if($zip = $this->getZipCode($request))
        {
	    	$address = $request->user()->address()->create([
	    		'address' => $request->address,
	    		'city'    => $request->city,
	    		'state'   => $request->state,
	    		'zip'     => $zip,
	    	]);
	    }
	    else
	    {
	    	header("HTTP/1.1 500 Internal Server Error");
	    	echo 'Address unknown';
	    	die();
	    }
        return json_encode($address);
    }


    /**
    * Update the given address
    *
    * @param Request $request
    * @param Address $address
    *
    */
    public function update(Request $request, Address $address)
    {
        $this->authorize('modify', $address);

        $validation = $this->validate($request, [
            'address'   => 'required|max:255|min:2',
            'city' 		=> 'required|max:255|min:2',
            'state'   	=> 'required|max:2|min:2'
        ]);

        if($zip = $this->getZipCode($request))
        {
	        $address->address   = $request->address;
	        $address->city 		= $request->city;
	        $address->state   	= $request->state;
	        $address->zip   	= $zip;

	        $address->save();
	    }
	    else
	    {
	    	header("HTTP/1.1 500 Internal Server Error");
	    	echo 'Address unknown';
	    	die();
	    }
        return json_encode($address);
    }


    /**
    * Destroy the given address
    *
    * @param Request $request
    * @param Address $address
	*
	*/
	public function destroy(Request $request, Address $address)
	{
    	$this->authorize('modify', $address);
    	
	    $address->delete();
    }

    /**
    * Return the given address
    *
    * @param Request $request
    * @param Address $address
    *
    * @return address
    */
    public function address(Request $request, Address $address)
    {
        if($request->user()->id == $address->user_id)
            return $address;
    }

    public function datatable(Request $request)
    {
        $data = array();
        if($request->search)
        {
            $vals = json_decode(json_encode($request->search));

            $contacts = $request->user()->address()->select('id','user_id','address','city','state','zip')
                                    ->where('address', 'like', '%'.$vals->value.'%')
                                    //->orWhere('name', 'like', '%'.$vals->value.'%')
                                    ->orWhere('city', 'like', '%'.$vals->value.'%')
                                    ->orWhere('state', 'like', '%'.$vals->value.'%')
                                    ->orWhere('zip', 'like', '%'.$vals->value.'%')
                                    ->get();

            foreach($contacts as $key => $value)
            {
                if($request->user()->id == $value->user_id)
                    $data[] = array(
                        $value->address,
                        $value->city,
                        $value->state,
                        $value->zip,
                        "<button type='button' data-toggle='modal' data-target='#myModal' id='address-".$value->id."' data-address-id='".$value->id."' class='address-edit btn btn-warning'> Edit </button>",
                        "<button type='button' class='address-delete btn btn-danger' data-address-id='".$value->id."'><i class='fa fa-trash'></i> Delete </button>"
                    );
            }
        }
        return json_encode(array('data'=>$data));
    }

    private function getZipCode($request)
    {
    	$zip = false;
    	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$request->address.",+".$request->city.",+".$request->state."&components=postal_code&key=".env('GOOGLE_API_KEY');
    	$res = json_decode(Api::guzzle($url, [])->getBody());
    	if(!empty($res->results))
	    	foreach($res->results[0]->address_components as $key => $value)
	    		if($value->types[0] == 'postal_code')
	    			$zip = $value->long_name;
    	return $zip;
    }

    private function states()
    {
    	return [
    		'ALABAMA'	=> 'AL',
			'ALASKA'	=> 'AK',
			'ARIZONA'	=> 'AZ',
			'ARKANSAS'	=> 'AR',
			'CALIFORNIA'	=> 'CA',
			'COLORADO'	=> 'CO',
			'CONNECTICUT'	=> 'CT',
			'DELAWARE'	=> 'DE',
			'FLORIDA'	=> 'FL',
			'GEORGIA'	=> 'GA',
			'HAWAII'	=> 'HI',
			'IDAHO'	=> 'ID',
			'ILLINOIS'	=> 'IL',
			'INDIANA'	=> 'IN',
			'IOWA'	=> 'IA',
			'KANSAS'	=> 'KS',
			'KENTUCKY'	=> 'KY',
			'LOUISIANA'	=> 'LA',
			'MAINE'	=> 'ME',
			'MARYLAND'	=> 'MD',
			'MASSACHUSETTS'	=> 'MA',
			'MICHIGAN'	=> 'MI',
			'MINNESOTA'	=> 'MN',
			'MISSISSIPPI'	=> 'MS',
			'MISSOURI'	=> 'MO',
			'MONTANA'	=> 'MT',
			'NEBRASKA'	=> 'NE',
			'NEVADA'	=> 'NV',
			'NEW HAMPSHIRE'	=> 'NH',
			'NEW JERSEY'	=> 'NJ',
			'NEW MEXICO'	=> 'NM',
			'NEW YORK'	=> 'NY',
			'NORTH CAROLINA'	=> 'NC',
			'NORTH DAKOTA'	=> 'ND',
			'OHIO'	=> 'OH',
			'OKLAHOMA'	=> 'OK',
			'OREGON'	=> 'OR',
			'PENNSYLVANIA'	=> 'PA',
			'RHODE ISLAND'	=> 'RI',
			'SOUTH CAROLINA'	=> 'SC',
			'SOUTH DAKOTA'	=> 'SD',
			'TENNESSEE'	=> 'TN',
			'TEXAS'	=> 'TX',
			'UTAH'	=> 'UT',
			'VERMONT'	=> 'VT',
			'VIRGINIA'	=> 'VA',
			'WASHINGTON'	=> 'WA',
			'WEST VIRGINIA'	=> 'WV',
			'WISCONSIN'	=> 'WI',
			'WYOMING'	=> 'WY'
    	];
    }
}
