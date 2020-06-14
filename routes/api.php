<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function() {
    Route::prefix('property')->group(function() {
        Route::post('/', 'PropertyController@create');

        Route::prefix('{property}')->group(function() {
            Route::prefix('analytic')->group(function() {
                Route::get('/', 'AnalyticController@all');
                Route::post('/', 'AnalyticController@create');
                Route::put('{analytic}', 'AnalyticController@update');
            });
        });
    });

    Route::prefix('analytic')->group(function() {
        Route::get('suburb/{suburb}', 'AnalyticController@suburbSummary');
        Route::get('state/{suburb}', 'AnalyticController@stateSummary');
        Route::get('country/{suburb}', 'AnalyticController@countrySummary');
    });
});
