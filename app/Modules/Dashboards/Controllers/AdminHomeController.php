<?php

namespace App\Modules\Dashboards\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminHomeController extends Controller
{
    public function adminV1Home()
    {
        return view("Dashboards::admin-v1.admin-v1-home");
    }// end -:- adminV1Home()

    public function adminV2Home()
    {
        return view("Dashboards::admin-v2.admin-v2-home");
    }// end -:- adminV2Home()

}// end -:- AdminHomeController
