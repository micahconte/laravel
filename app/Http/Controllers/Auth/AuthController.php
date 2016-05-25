<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Api;
use Validator;
use Session;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $list = $this->campaignList($data);
        $data['list'] = $list ? $list->id : null;
        Session::put('list', $data['list']);

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'list'  => 'required|integer|unique:users,list_id'
        ], ['list.required'=>'Something is wrong with Active Campaign']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'list_id' => Session::has('list') ? Session::get('list') : 0
            ]);
        return $list;
    }

    /**
    * Facebook Route
    *
    **/
    public function facebook(Request $request)
    {
        if($request->has('code'))
        {
            $user = $this->facebookCallback();
            $loggedIn = \Auth::loginUsingId($user->id, true);
            return \Redirect::to('/home');
        }
        else
            return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        if($authUser = User::where('email', $user->email)->first())
            return $authUser;

        $list = $this->campaignList($user);

        if($list)
            return User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('facebook'.microtime()),
                'list_id' => $list->id
            ]);
        return $list;
    }

    /**
    * Github Route
    *
    **/
    public function github(Request $request)
    {
        if($request->has('code'))
        {
            $user = $this->githubCallback();
            $loggedIn = \Auth::loginUsingId($user->id, true);
            return \Redirect::to('/home');
        }
        else
            return Socialite::driver('github')->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function githubCallback()
    {
        $user = Socialite::driver('github')->user();

        if($authUser = User::where('email', $user->email)->first())
            return $authUser;
        $list = $this->campaignList($user);

        if($list)
            return User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('github'.microtime()),
                'list_id' => $list->id
            ]);
        return $list;
    }

    private function campaignList($user)
    {
        $url = 'https://micahconte.api-us1.com';

        $params = array(
            'api_key'      => env('ACTIVECAMPAIGN_API_KEY'),
            'api_action'   => 'list_add',
            'api_output'   => 'json',
        );

        // here we define the data we are posting in order to perform an update
        $post = array(
            'id'                       => 1, // adds a new one
            'name'                     => $user['name'], // list name
            'subscription_notify'      => $user['email'], // comma-separated list of email addresses to notify on new subscriptions to this list
            'unsubscription_notify'    => $user['email'], // comma-separated list of email addresses to notify on any unsubscriptions from this list
            'to_name'                  => $user['name'] != '' ? $user['name'] : "Recipient", // if contact doesn't enter a name, use this
            'carboncopy'               => '', // comma-separated list of email addresses to send a copy of all mailings to upon send
            
            // Sender information (all fields below) required
            'sender_name'       => 'micahconte', // Company (or Organization)
            'sender_addr1'      => '1 happy st', // Address
            'sender_zip'        => '92591', // Zip or Postal Code
            'sender_city'       => 'temecula', // City
            'sender_country'    => 'USA', // Country
            'sender_url'        => 'http://www.micahconte.info', // URL
            'sender_reminder'   => 'Hi', // Sender's reminder to contacts
        );

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
        $url = $url . '/admin/api.php?' . $query;

        return Api::guzzle($url, $data);
    }

}
