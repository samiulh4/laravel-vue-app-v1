<?php

namespace App\Modules\Dashboards\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function webDashboard()
    {
        return view("Dashboards::web-dashboard");
    }

    public function adminDashboard()
    {
        return view("Dashboards::admin-dashboard");
    }

    public function niceAdminDashboard()
    {
        return view("Dashboards::niceadmin-dashboard");
    }
    

    public function index()
    {
        return view("Dashboards::index");
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}// end -:- DashboardController
