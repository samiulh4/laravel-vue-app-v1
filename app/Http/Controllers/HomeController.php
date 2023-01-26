<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*if(Auth::user()->access_portal == 1){
            return redirect('/web/dashboard');
        }else if(Auth::user()->access_portal == 2){
            return redirect('/admin/v2/dashboard');
        }else{
            return view('home');
        }*/
        return redirect('/admin/v2/dashboard');
    }
}
