<?php

namespace App\Http\Controllers\HealthLogs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HealthLogs;
use App\Http\Requests\HealthLogs\StoreHealthLog;

class LoggingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$all_logs = HealthLogs::all();

        $all_logs = HealthLogs::all()->sortByDesc('id');

        return view('health-logs.index', compact('all_logs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('health-logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHealthLog $request)
    {

        $this->checkIfAnyOneSectionIsFilled($request);

        //Generate Input Array
        $input_array = $this->generateSubmittedFormData($request);

        $loggingResult = HealthLogs::create($input_array);

        if($loggingResult){
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-success', 'Log saved successfully in the database!');

            return redirect('hl/logs');
        }
        else{
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'Something went wrong, log save failed!');

            return back()->withInput();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = HealthLogs::find($id);

        return view('health-logs.show', compact('log'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $log = HealthLogs::find($id);

        return view('health-logs.edit', compact('log'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHealthLog $request, $id)
    {
        $this->checkIfAnyOneSectionIsFilled($request);

        $input_array = $this->generateSubmittedFormData($request);

        $loggingResult = HealthLogs::where('id', $id)->update($input_array);

        if($loggingResult){
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-success', 'Log updated successfully in the database!');

            return redirect('hl/logs');
        }
        else{
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'Something went wrong, log update failed!');

            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $loggingResult = HealthLogs::destroy($id);

        if($loggingResult){
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-warning', 'You just deleted a single log entry!');

            return redirect('hl/logs');
        }
        else{
            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'Something went wrong, log deletion failed!');

            return back()->withInput();
        }
    }

    public function checkIfAnyOneSectionIsFilled($request)
    {

        $bp = $request->input('bp');
        $hr = $request->input('hr');
        $wt = $request->input('wt');
        $lp = $request->input('lp');
        $lp = $request->input('bs');
        $creatinine = $request->input('creatinine');
        $cbc = $request->input('cbc');
        $others = $request->input('others');

        if($bp == null && $hr == null && $wt == null && $lp == null && $creatinine == null && $cbc == null && $others == null)
        {

            $request->session()->flash('flash-msg', true);
            $request->session()->flash('alert-danger', 'You provided nothing to store as a log!');

            return back()->withInput();

        }

        return;
    } //End of checkIfAnyOneSectionIsFilled()


    public function generateSubmittedFormData($request)
    {

        //Generate Input Array
        $input_array = [
            'log_date'  => $request->log_date,
            'log_time'  => $request->log_time,
        ];

        //If BP Exists
        if ($request->has('bp')) {
            $input_array['bp'] = 1;
            $input_array['sys'] = $request->sys;
            $input_array['dia'] = $request->dia;
        }

        //If HR Exists
        if ($request->has('hr')) {
            $input_array['hr'] = 1;
            $input_array['h_rate'] = $request->h_rate;
        }

        //If WT Exists
        if ($request->has('wt')) {
            $input_array['wt'] = 1;
            $input_array['weight'] = $request->weight;
        }
          

        //If LP Exists
        if ($request->has('lp')) {
            $input_array['lp'] = 1;
            $input_array['lp_details'] = $request->lp_total."|".$request->lp_hdl."|".$request->lp_ldl."|".$request->lp_triglycerides;
        }
          

        //If BS Exists
        if ($request->has('bs')) {
            $input_array['bs'] = 1;
            $input_array['bs_details'] = $request->bs_rbs."|".$request->bs_fbs."|".$request->bs_abf;
        }

        //If Creatinine Exists
        if ($request->has('creatinine')) {
            $input_array['creatinine'] = 1;
            $input_array['creatinine_details'] = $request->creatinine_details;
        }

        //If cbc Exists
        if ($request->has('cbc')) {
            $input_array['cbc'] = 1;
            $input_array['cbc_details'] = $request->cbc_details;
        }

        //If others Exists
        if ($request->has('others')) {
            $input_array['others'] = 1;
            $input_array['others_details'] = $request->others_details;
        }

        //If comments Exists
        if ($request->has('comments')) {
            $input_array['comments'] = 1;
            $input_array['comments_details'] = $request->comments_details;
        }

        return $input_array;
    } //End of generateSubmittedFormData()

}
