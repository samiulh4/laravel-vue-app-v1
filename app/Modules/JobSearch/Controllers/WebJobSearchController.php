<?php

namespace App\Modules\JobSearch\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebJobSearchController extends Controller
{
    public function index()
    {
        return view("JobSearch::index");
    }

}// end -:- WebJobSearchController
