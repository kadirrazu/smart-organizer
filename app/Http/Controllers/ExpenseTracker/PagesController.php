<?php

namespace App\Http\Controllers\ExpenseTracker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function dashboard()
    {
    	return view('expense-tracker.dashboard');
    } //end of function 'dashboard'
}
