<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function dashboard()
    {
    	return view('health-logs.dashboard');
    } //end of function 'dashboard'
}
