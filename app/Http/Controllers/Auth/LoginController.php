<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

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
            $data = Socialite::driver('google')->user();
           // dd($data);
           $user = new User();
           $user->name = $data->name;
           $user->email = $data->email;
           $user->password = bcrypt($data->name);
           //$user->provider_id = $data->id;
           $user->photo = $data->avatar;
           $user->save();
            auth()->login($user); 
            return redirect()->route('home');
        }catch (\Exception $e) {
           echo $e->getMessage();
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
