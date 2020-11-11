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

Route::get('province','CommonController@province');
Route::get('city','CommonController@city');
Route::get('county','CommonController@county');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace'     => 'App\Http\Controllers\Api',
    // 'middleware'    => ['cors'],
],function($api) {
    $api->get('getCaptcha',"CaptchaController@captcha");
    $api->post('register','UserController@register');
    $api->post('login','AuthController@login');
    $api->post('logout','AuthController@logout');
    $api->post('refresh','AuthController@refresh');
    $api->get('me','UserController@me');
    $api->get('categories','CategoriesController@index')->name('categories.index');
    // $api->get('topices','TopiceController@index')->name('topices.index'); //帖子列表
    $api->resource('topices','TopiceController');
    $api->get('ship','ShipController@index')->name('ship.index');
});

