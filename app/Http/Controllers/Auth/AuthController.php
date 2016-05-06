<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
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
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
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
        ]);
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

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
        ]);
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

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }


}
