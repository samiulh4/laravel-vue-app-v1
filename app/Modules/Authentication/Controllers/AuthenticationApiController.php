<?php

namespace App\Modules\Authentication\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return $this->respondWithToken($token);
    }// end -:- apiSignIn()
    public function apiSignOut()
    {
        auth()->logout();
        return response()->json([
            "success" => true,
            "status" => 200,
            "message" => "User logged out successfully."
        ]);
    }// end -:- apiSignOut()
    public function apiTokenRefresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }// end -:- apiTokenRefresh()
    public function apiMe()
    {
        return response()->json(auth()->user());
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
