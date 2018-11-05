<?php

use Illuminate\Http\Request;

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

Route::prefix('v1')->group(function (){
    Route::get('country', 'CountryController@index')->name('country.index');
    Route::get('country/{country}', 'CountryController@fetchCity')->name('country.city');
    Route::post('country', 'CountryController@store')->name('country.store');
    Route::get('state', 'StateController@index')->name('state.index');
    Route::post('state', 'StateController@store')->name('state.store');
    Route::get('city', 'CityController@index')->name('city.index');
    Route::post('city', 'CityController@store')->name('city.store');
});
