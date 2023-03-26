<?php

namespace App\Modules\JobSearch\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\JobSearch\Models\JobDataMaster;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class AdminJobSearchController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $jobData = JobDataMaster::leftJoin('settings_companies', 'jobs_data_master.company_id', '=', 'settings_companies.id')
                ->leftJoin('settings_countries', 'jobs_data_master.job_country_id', '=', 'settings_countries.id')
                ->orderBy('updated_at', 'desc')->get([
                            'jobs_data_master.*',
                            'settings_countries.name as country_name',
                            'settings_companies.name as company_name'
                       ]);
            return Datatables::of($jobData)
                ->addIndexColumn()// for serial no
                ->make(true);
        }
        return view("JobSearch::admin-v2.index");
    }// end -:- index()

}// end -:- AdminJobSearchController
