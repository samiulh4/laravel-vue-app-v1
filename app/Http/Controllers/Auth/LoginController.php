<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
//use App\User;
use App\Modules\Users\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    //Google callback
    public function handleGoogleCallback()
    {
        try {
            $loginData = Socialite::driver('google')->user();
            //dd($loginData );


           $user = new User();


           $user->name = $loginData->name;
           $user->email = $loginData->email;
           $user->username = $loginData->email;
           $user->password = bcrypt($loginData->email);

           $user->provider_type_id = 1;
           $user->provider_id = $loginData->getId();
           $user->provider_token = $loginData->token;
           $user->provider_refresh_token = $loginData->refreshToken;
           $user->provider_expiry = $loginData->expiresIn;
           $user->photo = $loginData->avatar;
           $user->save();

           auth()->login($user);
           return redirect()->route('home');
        }catch (\Exception $e) {
           return $e->getMessage();
        }
    }
    protected function _registerOrLoginUser($data){
        $user = User::where('email', $data->email)->first();
          if(!empty($user)){
             $user = new User();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->password = bcrypt($data->name);
             //$user->provider_id = $data->id;
             $user->photo = $data->avatar;
             $user->save();
          }
          return $user;
        }
}// end -:- LoginController
