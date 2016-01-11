<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/temp', function () {
    return view('backend.temp');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//\Auth::loginUsingId(1);



Route::group(['middleware' => 'web'], function () {


    /***************************************************************************************************
     * Localization
     ***************************************************************************************************/
    Route::get('/lang/{lang}', ['uses' => 'LanguageController@changeLocale']);


    Route::auth();

    Route::group(['middleware' => 'auth'], function () {

        Route::group(['middleware' => 'admin.zone'], function () {
            Route::resource('invoice', 'Backend\InvoiceController');
            Route::resource('quotation', 'Backend\QuotationController');
        });

        Route::resource('maintenance', 'Backend\MaintenanceController');

        Route::get('/', ['as' => 'home', 'uses' => 'Backend\DashboardController@index']);
        Route::get('/home', 'Backend\DashboardController@index');
    });


});
