<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Validator;
use Input;
use Auth;

class GlobalLoginController extends Controller
{
    public function __construct()
    {
        
    }

    //Show Login Form
    public function globalLogin()
    {

        if( Auth::check() ) 
        {
            return redirect('subsystem-selector');
        }

        return view('global.login');

    } //getLoginForm

    //Validate Login Request
    public function globalLoginCheck(Request $request)
    {


        $credentials = array(
            'email' => $request->input('email'), 
            'password' => $request->input('password')
        );

        $keep_remember = ($request->input('remember_me') == 'on') ? true : false;

        if ( Auth::attempt($credentials, $keep_remember) ) 
        {
            return redirect('subsystem-selector');
        } 
        else
        {
            return redirect('/')->withErrors('Invalid email address or password')->withInput();
        }   

    } //globalLoginCheck


    //Logout
    public function globalLogout()
    {
        
        Auth::logout();

        return Redirect::to('/')->withErrors('Logged Out Successfully.');

    } //Logout

    
}
