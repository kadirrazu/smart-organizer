<?php

date_default_timezone_set('Asia/Dhaka');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'GlobalLoginController@globalLogin');
Route::get('/', [ 'as' => 'login', 'uses' => 'GlobalLoginController@globalLogin']);

Route::get('logout', 'GlobalLoginController@globalLogout');

Route::post('global-login', [
	    'as' => 'global.login-check', 'uses' => 'GlobalLoginController@globalLoginCheck'
	]);

//Subsystems Routes
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('subsystem-selector', 'SubsystemController@showSubsystems');

});

//Expense Tracker Routes
Route::group(['middleware' => ['auth']], function () {

	
	//EexpeseTracker Routes
	Route::namespace('ExpenseTracker')->group(function () {
	    Route::prefix('et')->group(function () {

		    Route::get('dashboard', 'PagesController@dashboard');

		}); //Group = prefix 'et'
	}); //Group = Namespace 'ExpenseTracker'

	//HealthLogs Routes
	Route::namespace('HealthLogs')->group(function () {
	    Route::prefix('hl')->group(function () {

		    Route::get('dashboard', 'PagesController@dashboard');

		    Route::resource('logs', "LoggingController");

		    Route::get('bp-wt-report-view', 'ReportingController@bp_wt_view_load');
		    Route::get('custom-report-view', 'ReportingController@custom_view_load');

		    Route::get('logs/download/{id}', 'ReportingController@single_log_download');

		    Route::post('process-bp-wt-report', 'ReportingController@process_bp_wt_report');
		    Route::post('process-custom-report', 'ReportingController@process_custom_report');

		}); //Group = prefix 'hl'
	}); //Group = Namespace 'HealthLogs'

}); //Group = middleware 'auth'
