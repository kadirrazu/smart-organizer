<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportingController extends Controller
{
    public function bp_wt_view_load()
    {
    	return view('health-logs.bp-wt-show');
    }

    public function custom_view_load()
    {
    	return view('health-logs.custom_show');
    }

    public function process_bp_wt_report(Request $request)
    {
    	$request->validate([
		    'start-date' => 'required',
		    'end-date' => 'required',
		]);
    }
}
