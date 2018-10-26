<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsystemController extends Controller
{
    public function showSubsystems()
    {
    	return view('subsystem.selector');
    }
}
