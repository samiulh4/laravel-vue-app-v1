<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelVueController extends Controller
{
    public function index()
    {
        return view('layouts.vue');
    }
}
