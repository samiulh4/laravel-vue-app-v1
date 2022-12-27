<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

use App\User;

//use App\Modules\Users\Models\User;
use Carbon\Carbon;

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

            //$user = new User();
            $user =  User::firstOrNew(['email' => $loginData->email]);
            $user->name = $loginData->name;
            $user->email = $loginData->email;
            $user->username = $loginData->email;
            $user->password = bcrypt($loginData->name);
            $user->provider_type_id = 1;
            $user->provider_id = $loginData->getId();
            $user->provider_token = $loginData->token;
            $user->provider_refresh_token = $loginData->refreshToken;
            $user->provider_expiry = Carbon::now()->addSeconds($loginData->expiresIn);
            $user->photo = $loginData->avatar;
            $user->save();

            Auth()->login($user);

            return redirect()->route('home');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}// end -:- LoginController
