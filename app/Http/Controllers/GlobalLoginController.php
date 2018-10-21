<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GlobalLoginController extends Controller
{
    //Return login page
    public function globalLogin()
    {
    	return view('global-login');
    }
}
