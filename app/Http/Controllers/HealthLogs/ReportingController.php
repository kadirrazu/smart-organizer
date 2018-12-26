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
    	return view('health-logs.custom-show');
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
    } //End of BP-WT Report

    public function process_custom_report(Request $request)
    {

    	$request->validate([
		    'limit' => 'nullable|numeric'
		]);

    	$dateRange = $request->input('date-range');
    	$inputStartDate = $request->input('start-date');
		$inputEndDate = $request->input('end-date');
		$limit = $request->input('limit');

		//dd($request->input());

		$items = array();

		$query = DB::table('health_logs');

		if ($request->has('e-all')) 
		{
		    
		}
		else
		{
			if($request->has('e-bp')){
				$query->orWhere('bp', 1);
				$items['bp'] = true;
			}

			if($request->has('e-hr')){
				$query->orWhere('hr', 1);
				$items['hr'] = true;
			}

			if($request->has('e-wt')){
				$query->orWhere('wt', 1);
				$items['wt'] = true;
			}

			if($request->has('e-lp')){
				$query->orWhere('lp', 1);
				$items['lp'] = true;
			}

			if($request->has('e-bs')){
				$query->orWhere('bs', 1);
				$items['bs'] = true;
			}

			if($request->has('e-creatinine')){
				$query->orWhere('creatinine', 1);
				$items['creatinine'] = true;
			}

			if($request->has('e-cbc')){
				$query->orWhere('cbc', 1);
				$items['cbc'] = true;
			}

			if($request->has('e-other')){
				$query->orWhere('others', 1);
				$items['others'] = true;
			}
		}

		$startDate = ""; $endDate = "";

		if( ($request->has('start-date') && $request->has('start-date')) || $request->has('date-range') == "one-month" || $request->has('three-month') == "" ){

		}

		$query->orWhere('comments', 1);

		if( $dateRange == "last-n"){
			$query->orderBy('id', 'desc');
			$query->take($limit);
		}
		else{
			if($request->input('sort-format') == "sort-asc"){
				$query->orderBy('id', 'asc');
			}
			else{
				$query->orderBy('id', 'desc');
			}
		}
		

		//$results = $query->get();
		$results = $query->toSql();

		dd($results);

    	if( $dateRange == "custom-date" && ( $inputStartDate == "" || $inputEndDate== "" ) )
		{
			$request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-warning', 'You want a custom range report, but you skipped start or end date field!');

            return back()->withInput();
		}



    } //End of Custom Report
}
