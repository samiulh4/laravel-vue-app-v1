<?php

namespace App\Http\Controllers\Error;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends Controller
{
    public function redirectToWebErrorHandle($message = '', $code = '')
    {
        return view('errors.web.error', compact('code', 'message'));
    }// end -:- redirectToWebErrorHandle()
}// end -:- ErrorController
