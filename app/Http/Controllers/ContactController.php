<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{

	protected $contacts;

	/**
	* Creates a new controller instance
	*
	* @return void
	*/
    public function __construct(ContactRepository $contacts)
    {
    	$this->middleware('auth');
    	$this->contacts = $contacts;
    }


    function index(Request $request)
    {
    	return view('contacts.index', [
    		'contacts' => $this->contacts->forUser($request->user())
    	]);
    }


    /**
    * Create a new contact
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
    	$validation = $this->validate($request, [
    		'name'    => 'required|max:55|min:2',
    		'surname' => 'max:255|min:2',
    		'email'   => 'required|email|unique:contacts,email|max:55|min:5',
    		'phone'   => 'phone:US|max:20|min:7'
    	]);

    	$insert = $request->user()->contacts()->create([
    		'name'      => $request->name,
    		'surname'   => $request->surname,
    		'email'     => $request->email,
    		'phone'     => $request->phone,
            'custom1'   => $request->custom1,
            'custom2'   => $request->custom2,
            'custom3'   => $request->custom3,
            'custom4'   => $request->custom4,
            'custom5'   => $request->custom5,
    	]);

        return json_encode(array('id'=> $insert->id));
    }

    /**
    * Return the given contact
    *
    * @param Request $request
    * @param Contact $contact
    *
    * @return Contact
    */
    public function contact(Request $request, Contact $contact)
    {
        if($request->user()->id == $contact->user_id)
            return $contact;
    }

    /**
    * Update the given contact
    *
    * @param Request $request
    * @param Contact $contact
    *
    */
    public function update(Request $request, Contact $contact)
    {
        $validation = $this->validate($request, [
            'name'    => 'required|max:55|min:2',
            'surname' => 'max:255|min:2',
            'email'   => 'required|email|max:55|min:5',
            'phone'   => 'phone:US|max:20|min:7'
        ]);
        $customsArray = $this->filterCustoms($request);

        $request->session()->put('old_contact', $contact);

        $contact->name    = $request->name;
        $contact->surname = $request->surname;
        $contact->email   = $request->email;
        $contact->phone   = $request->phone;

        $contact->custom1   = $customsArray[1];
        $contact->custom2   = $customsArray[2];
        $contact->custom3   = $customsArray[3];
        $contact->custom4   = $customsArray[4];
        $contact->custom5   = $customsArray[5];
        $contact->save();

        return json_encode($contact);
    }


    /**
    * Destroy the given contact
    *
    * @param Request $request
    * @param Contact $contact
	*
	*/
	public function destroy(Request $request, Contact $contact)
	{
    	$this->authorize('destroy', $contact);
    	
	    $contact->delete();

        $this->campaignContact($contact, 'contact_delete', $request->user()->list_id);
	}

    /**
    * Filter used custom fields to top
    *
    * @param Request $request
    *
    * @return Array
    **/
    private function filterCustoms($request)
    {
        //filter down custom array to removed skipped elements
        $customs = array(0);//save used elements to top of list-not using 0 element
        $empty = array();//separate empty customs
        for($i=1;$i<6;$i++)
        {
            $value = $request["custom$i"];
            if('' != $value)
                array_push($customs, $value);
            else
                array_push($empty, $value);
        }
        return array_merge($customs, $empty);
    }


    /**
    * Ajax request to add campaign contact
    * @param Request $request
    * @param Contact $contact
    *
    * @return Json $contact
    **/
    public function addCampaignContact(Request $request, Contact $contact)
    {
        $subscriber = $this->campaignContact($contact, 'contact_add', $request->user()->list_id);
        $contact->subscriber_id = $subscriber->subscriber_id;// add subscriber id to contact
        $contact->save();
        return json_encode($contact);
    }


    /**
    * Ajax request to update campaign contact
    * @param Request $request
    * @param Contact $contact
    *
    * @return Json $contact
    **/
    public function updateCampaignContact(Request $request, Contact $contact)
    {
        if($request->session()->has('old_contact'))
        {
            // delete old tags to prevent duplicates
            $this->campaignContact($request->session()->get('old_contact'), 'contact_tag_remove', $request->user()->list_id);
            $request->session()->forget('old_contact');
        }
        $this->campaignContact($contact, 'contact_edit', $request->user()->list_id);
        return json_encode($contact);
    }


    /**
    * Ajax request to delete campaign contact
    * @param Request $request
    * @param Contact $contact
    *
    * @return Json $contact
    **/
    public function deleteCampaignContact(Request $request, Contact $contact)
    {
        $subscriber = $this->campaignContact($contact, 'contact_delete', $request->user()->list_id);
        return json_encode($contact);
    }

    /**
    * Add contact to active campaign
    *
    * @param Contact $contact
    *
    **/
    private function campaignContact($contact, $action, $list)
    {
        $url = 'https://micahconte.api-us1.com';

        $params = array(
            // the API Key
            'api_key'      => env('ACTIVECAMPAIGN_API_KEY'),
            'api_action'   => $action,
            'api_output'   => 'json',
        );

        // here we define the data we are posting in order to perform an update
        $post = array(
            'id'          => $contact['subscriber_id'],
            'first_name'  => $contact['name'], 
            'last_name'   => $contact['surname'],
            'email'       => $contact['email'], 
            'phone'       => $contact['phone'],
            "p[$list]"    => $list,
            "status[1]"   => "1"
        );

        
        for($i=1;$i<6;$i++)
        {
            $post["tags[$i]"] = "{$contact["custom$i"]},";
        }

        // This section takes the input fields and converts them to the proper format
        $query = "";
        foreach( $params as $key => $value ) $query .= $key . '=' . urlencode($value) . '&';
        $query = rtrim($query, '& ');

        // This section takes the input data and converts it to the proper format
        $data = "";
        foreach( $post as $key => $value ) $data .= $key . '=' . urlencode($value) . '&';
        $data = rtrim($data, '& ');

        // clean up the url
        $url = rtrim($url, '/ ');

        // define a final API request - GET
        $api = $url . '/admin/api.php?' . $query;

        $request = curl_init($api); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
        curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
        //curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response and are using HTTPS
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

        $response = json_decode(curl_exec($request)); // execute curl post and store results in $response

        curl_close($request); // close curl object
        return $response;
    }

    public function datatable(Request $request)
    {
        $data = array();
        if($request->search)
        {
            $vals = json_decode(json_encode($request->search));

            $contacts = $request->user()->contacts()->select('id','user_id','name','surname','email','phone')
                                    ->where('name', 'like', '%'.$vals->value.'%')
                                    ->orWhere('surname', 'like', '%'.$vals->value.'%')
                                    ->orWhere('email', 'like', '%'.$vals->value.'%')
                                    ->orWhere('phone', 'like', '%'.$vals->value.'%')
                                    ->get();

            foreach($contacts as $key => $value)
            {
                if($request->user()->id == $value->user_id)
                    $data[$key] = array(
                        $value->name,
                        $value->surname,
                        $value->phone,
                        $value->email,
                        "<button type='button' data-toggle='modal' data-target='#myModal' id='contact-".$value->id."' data-contact-id='".$value->id."' class='contact-edit btn btn-warning'> Edit </button>",
                        "<button type='button' class='contact-delete btn btn-danger' data-contact-id='".$value->id."'><i class='fa fa-trash'></i> Delete </button>"
                    );
            }
        }
        return json_encode(array('data'=>$data));
    }
}
