<?php

namespace App\Modules\Authentication\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthenticationApiController extends Controller
{
    public function apiSignIn(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (!$token = auth()->attempt(["email" => $request->email, "password" => $request->password])) {
            return response()->json([
                "success" => false,
                "status" => 401,
                "message" => "Invalid credentials !"
            ]);
        }
        return response()->json([
            "success" => true,
            "status" => 200,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            "user" => auth()->user(),
            "message" => "Token generate successfully.",
        ]);
        //return $this->respondWithToken($token);
    }// end -:- apiSignIn()
    public function apiSignOut()
    {
        try{
            auth()->logout();
            return response()->json([
                "success" => true,
                "status" => 200,
                "message" => "User logged out successfully."
            ]);
        }catch (\Exception $e){
            return response()->json([
                "success" => false,
                "status" => 401,
                "message" => $e->getMessage()
            ]);
        }
    }// end -:- apiSignOut()
    public function apiTokenRefresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }// end -:- apiTokenRefresh()
    public function apiMe()
    {
        try{
            return response()->json([
                "success" => true,
                "status" => 200,
                "user" => auth()->user(),
                "message" => 'Authorization token found.'
            ]);
        }catch (\Exception $e){
            return response()->json([
                "success" => false,
                "status" => 401,
                "message" => $e->getMessage()
            ]);
        }

    }// end -:- apiMe()
    protected function respondWithToken($token)
    {
        return response()->json([
            "success" => true,
            "status" => 200,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            "message" => "Token generate successfully.",
        ]);
    }// end -:- respondWithToken()
}// end -:- AuthenticationApiController
