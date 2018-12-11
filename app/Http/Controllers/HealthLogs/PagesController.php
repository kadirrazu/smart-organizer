<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HealthLogs;

class PagesController extends Controller
{
    public function dashboard()
    {
    	
    	$all_logs = HealthLogs::all()->sortByDesc('id')->take(10);

    	return view('health-logs.dashboard', compact('all_logs'));
    } //end of function 'dashboard'
}
