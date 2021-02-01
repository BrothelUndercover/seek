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

Route::get('province','CommonController@province')->name('getProvince');
Route::get('city','CommonController@city')->name('getCity');
Route::get('county','CommonController@county')->name('getCounty');
Route::post('upload','CommonController@upload');


