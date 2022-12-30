<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Image;
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

            $user =  User::firstOrNew(['email' => $loginData->email]);

            if(isset($user->provider_type_id)){
                if($user->provider_type_id == 0){
                    return \Redirect::route('web.error.handler',
                        [
                         'message' => 'You dont have the permission to access using the google login',
                         'code'=>'401',
                        ]
                    );
                }
            }

            $user->name = $loginData->name;
            $user->email = $loginData->email;
            $user->username = $loginData->email;
            $user->password = bcrypt($loginData->name);
            $user->provider_type_id = 1;
            $user->provider_id = $loginData->getId();
            $user->provider_token = $loginData->token;
            $user->provider_refresh_token = $loginData->refreshToken;
            $user->provider_expiry = Carbon::now()->addSeconds($loginData->expiresIn);




            $picture_contents = file_get_contents($loginData->avatar);
            $picture_extention = 'png';
            $picture_name_temp = 'TEMP_'.date('YmdHis').'.'.$picture_extention;
            $picture_name = 'USER_'.date('YmdHis').'.'.$picture_extention;
            $picture_directory = public_path().'/uploads/images/users/';
            $picture_link = 'uploads/images/users/'.$picture_name;
            file_put_contents($picture_directory.$picture_name_temp,$picture_contents);
            $picture_resize = Image::make($picture_directory.$picture_name_temp);
            $picture_resize->fit(300, 300);
            $picture_resize->save($picture_directory.$picture_name);

            if (file_exists($picture_directory.$picture_name_temp)) {
                unlink($picture_directory.$picture_name_temp);
            }

            if(!empty($user->photo)){
                if (file_exists(public_path().'/'.$user->photo)) {
                    unlink(public_path().'/'.$user->photo);
                }
            }

            $user->photo = $picture_link;

            if(isset($user->id)){
                $user->updated_by = $user->id;
                $user->updated_at = date('Y-m-d H:i:s');
            }
            $user->save();

            Auth()->login($user);

            return redirect()->route('home');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}// end -:- LoginController
