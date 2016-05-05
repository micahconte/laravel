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
    		'name'    => 'required|max:255|min:2',
    		'surname' => 'max:255|min:2',
    		'email'   => 'email|unique:contacts,email|max:255|min:5',
    		'phone'   => 'required|unique:contacts,phone|phone:US|max:15|min:7'
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
            'custom5'   => $request->custom5
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
            'name'    => 'required|max:255|min:2',
            'surname' => 'max:255|min:2',
            'email'   => 'email|max:255|min:5',
            'phone'   => 'required|phone:US|max:15|min:7'
        ]);
        $customsArray = $this->filterCustoms($request);

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

	    return redirect('/contacts');
	}

    private function filterCustoms($request)
    {
        //filter down custom array to removed skipped elements
        $i=1;
        $customs = array(0);//save used elements to top of list-not using 0 element
        $empty = array();//separate empty customs
        while($value = $request["custom$i"])
        {
            if($value!=':')
                array_push($customs, $value);
            else
                array_push($empty, $value);
            $i++;
        }
        return array_merge($customs, $empty);
    }
}
