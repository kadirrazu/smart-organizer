<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use PDF;

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

		$dateTimeStamp = date('d-m-Y_h-i_A');
		$fileName = 'bp-wt-report-'.$dateTimeStamp.'.pdf';

		$inputStartDate = $request->input('start-date');
		$inputEndDate = $request->input('end-date');

		$startDatePieces = explode('-', $inputStartDate);
		$formattedStartDate = $startDatePieces[2] .'-'. $startDatePieces[1] .'-'. $startDatePieces[0];

		$endDatePieces = explode('-', $inputEndDate);
		$formattedEndDate = $endDatePieces[2] .'-'. $endDatePieces[1] .'-'. $endDatePieces[0];

		$results = DB::table('health_logs')
						->whereBetween('log_date', [$formattedStartDate, $formattedEndDate])
						->where(function ($query) {
				                $query->where('bp', 1)
				                      ->orWhere('wt', 1);
				            })
						->orderBy('id', 'asc')
						->get();

		if($results->count() > 0 )
		{

			$pdf = PDF::loadView('health-logs.reports.bp-wt', compact('results'));
			return $pdf->download($fileName);

			//return view('health-logs.reports.bp-wt', compact('results'));
		}
		else
		{
			$request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'No result found within specified date!');

            return back()->withInput();
		}
    }
}
