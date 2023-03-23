<?php

namespace App\Modules\JobSearch\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobSearchController extends Controller
{
    public function index()
    {
        return view("JobSearch::index");
    }

}// end -:- JobSearchController
