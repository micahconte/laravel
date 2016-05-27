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
		$data = $this->getAddress($request);
        if(!empty($data['zip']) && !empty($data['address']) && !empty($data['city']))
        {
	    	$address = $request->user()->address()->create([
	    		'address' => $data['address'],
	    		'city'    => $data['city'],
	    		'state'   => $data['state'],
	    		'zip'     => $data['zip'],
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
		$data = $this->getAddress($request);
        if(!empty($data['zip']) && !empty($data['address']) && !empty($data['city']))
        {
	        $address->address   = $data['address'];
	        $address->city 		= $data['city'];
	        $address->state   	= $data['state'];
	        $address->zip   	= $data['zip'];

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

    private function getAddress($request)
    {
    	$data = [];
    	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$request->address.",+".$request->city.",+".$request->state."&components=postal_code&key=".env('GOOGLE_API_KEY');
    	$res = json_decode(Api::guzzle($url, [])->getBody());
    	
    	if(!empty($res->results))
    	{
	    	foreach($res->results[0]->address_components as $key => $value)
	    	{
	    		switch($value->types[0])
	    		{
	    			case 'street_number':
	    				$data['address'] = $value->short_name;
	    			break;

	    			case 'route':
	    				$data['address'] .= ' '.$value->short_name;
	    			break;

	    			case 'locality':
	    				$data['city'] = $value->short_name;
	    			break;

	    			case 'administrative_area_level_1':
	    				$data['state'] = $value->short_name;
	    			break;

	    			case 'postal_code':
	    				$data['zip'] = $value->short_name;
	    			break;
	    		}
	    	}
	    }
    	return $data;
    }

    private function states()
    {
    	return [
    		'Alabama'		=> 'AL',
			'Alaska'		=> 'AK',
			'Arizona'		=> 'AZ',
			'Arkansas'		=> 'AR',
			'California'	=> 'CA',
			'Colorado'		=> 'CO',
			'Connecticut'	=> 'CT',
			'Delaware'		=> 'DE',
			'Florida'		=> 'FL',
			'Georgia'		=> 'GA',
			'Hawaii'		=> 'HI',
			'Idaho'			=> 'ID',
			'Illinois'		=> 'IL',
			'Indiana'		=> 'IN',
			'Iowa'			=> 'IA',
			'Kansas'		=> 'KS',
			'Kentucky'		=> 'KY',
			'Louisiana'		=> 'LA',
			'Maine'			=> 'ME',
			'Maryland'		=> 'MD',
			'Massachusetts'	=> 'MA',
			'Michigan'		=> 'MI',
			'Minnesota'		=> 'MN',
			'Mississippi'	=> 'MS',
			'Missouri'		=> 'MO',
			'Montana'		=> 'MT',
			'Nebraska'		=> 'NE',
			'Nevada'		=> 'NV',
			'New Hampshire'	=> 'NH',
			'New Jersey'	=> 'NJ',
			'New Mexico'	=> 'NM',
			'New York'		=> 'NY',
			'North Carolina'=> 'NC',
			'North Dakota'	=> 'ND',
			'Ohio'			=> 'OH',
			'Oklahoma'		=> 'OK',
			'Oregon'		=> 'OR',
			'Pennsylvania'	=> 'PA',
			'Rhode Island'	=> 'RI',
			'South Carolina'=> 'SC',
			'South Dakota'	=> 'SD',
			'Tennessee'		=> 'TN',
			'Texas'			=> 'TX',
			'Utah'			=> 'UT',
			'Vermont'		=> 'VT',
			'Virginia'		=> 'VA',
			'Washington'	=> 'WA',
			'West Virginia'	=> 'WV',
			'Wisconsin'		=> 'WI',
			'Wyoming'		=> 'WY'
    	];
    }
}
