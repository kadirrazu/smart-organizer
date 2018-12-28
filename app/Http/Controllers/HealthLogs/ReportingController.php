<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use App\HealthLogs;

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

    public function single_log_download($id)
    {
    	$log = HealthLogs::findOrFail($id);

        //return view('health-logs.reports.single', compact('log'));

        $dateTimeStamp = date('d-m-Y_h-i_A');
		$fileName = 'Single-Report-'.$dateTimeStamp.'.pdf';

		$pdf = PDF::loadView('health-logs.reports.single', compact('log'));
		return $pdf->download($fileName);
    }

    public function process_bp_wt_report(Request $request)
    {
    	$request->validate([
		    'start-date' => 'required',
		    'end-date' => 'required',
		]);

		$dateTimeStamp = date('d-m-Y_h-i_A');
		$fileName = 'BP-WT-Report-'.$dateTimeStamp.'.pdf';

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

    	//Check if limit is provided, it should be numeric
    	$request->validate([
		    'limit' => 'nullable|numeric'
		]);

    	//Grab necessary inputs
    	$dateRange = $request->input('date-range');
    	$inputStartDate = $request->input('start-date');
		$inputEndDate = $request->input('end-date');
		$limit = $request->input('limit');

		//Store reporting elements, pass it to view
		$items = array();

		//Validation for input date range, if applicable
		if( $dateRange == "custom-date" && ( $inputStartDate == "" || $inputEndDate== "" ) )
		{
			$request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-warning', 'You want a custom range report, but you skipped start or end date field!');

            return back()->withInput();
		}

		//Build the base query
		$query = DB::table('health_logs');

		//Build query according to the selected checkboxes
		if ($request->has('e-all')) 
		{
		    $items['bp'] = true;
		    $items['hr'] = true;
		    $items['wt'] = true;
		    $items['lp'] = true;
		    $items['bs'] = true;
		    $items['creatinine'] = true;
		    $items['cbc'] = true;
		    $items['others'] = true;

		    $query->orWhere('bp', 1);
		    $query->orWhere('hr', 1);
		    $query->orWhere('wt', 1);
		    $query->orWhere('lp', 1);
		    $query->orWhere('bs', 1);
		    $query->orWhere('creatinine', 1);
		    $query->orWhere('cbc', 1);
		    $query->orWhere('others', 1);
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

		$items['comments'] = true;

		$formattedStartDate = ""; $formattedEndDate = "";

		//Generate date range, pass it to query if require by the input conditon
		if( $dateRange == "one-month" || $dateRange == "three-month" || $dateRange == "custom-date" )
		{
			//If reporting date has a custom range
			if($dateRange == "custom-date" && ($request->has('start-date') && $request->has('end-date')))
			{
				$inputStartDate = $request->input('start-date');
				$inputEndDate = $request->input('end-date');

				$startDatePieces = explode('-', $inputStartDate);
				$formattedStartDate = $startDatePieces[2] .'-'. $startDatePieces[1] .'-'. $startDatePieces[0];

				$endDatePieces = explode('-', $inputEndDate);
				$formattedEndDate = $endDatePieces[2] .'-'. $endDatePieces[1] .'-'. $endDatePieces[0];
			}

			//If reporting date is one month back
			if( $dateRange == "one-month" )
			{
				$formattedStartDate = date('Y-m-d');
				$formattedEndDate = date("Y-m-d",strtotime("-30 day"));
			}

			//If reporting date is three month back
			if( $dateRange == "three-month" )
			{
				$formattedStartDate = date('Y-m-d');
				$formattedEndDate = date("Y-m-d",strtotime("-90 day"));
			}

			$query->whereBetween('log_date', [$formattedStartDate, $formattedEndDate]);
		}

		//Query last n-elements, if set. Also perform sorting.
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
		

		$results = $query->get();
		//$results = $query->toSql();

    	
		if($results->count() > 0 )
		{

			$dateTimeStamp = date('d-m-Y_h-i_A');
			$fileName = 'Customized-Report-'.$dateTimeStamp.'.pdf';

			//return view('health-logs.reports.custom', compact('results', 'items'));

			$pdf = PDF::loadView('health-logs.reports.custom', compact('results', 'items'));
			return $pdf->download($fileName);
		}
		else
		{
			$request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'No result found according to your provided parameters!');

            return back()->withInput();
		}


    } //End of Custom Report
}
