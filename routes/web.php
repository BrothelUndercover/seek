<?php

//return response('', 404);
Route::middleware('throttle:60,1')->group(function () {
    Route::get('/', 'PagesController@root')->name('pages.root');
    Route::get('area','PagesController@region')->name('pages.region');
    Route::get('introduce','PagesController@mind')->name('pages.jieshao');
    //用户登录相关
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // 用户注册相关路由
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    // 密码重置相关路由
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    //帖子相关
    Route::get('topices/create/{provi?}','TopicesController@create')->name('topices.create');
    Route::get('topice/{province}/{category?}/{city?}/{county?}','TopicesController@index')->name('topices.index');
    Route::get('topices/{topice}','TopicesController@show')->name('topices.show');
    Route::post('topices','TopicesController@store')->name('topices.store');
    Route::get('topices/{topice?}/edit','TopicesController@edit')->name('topices.edit');
    Route::patch('topices','TopicesController@update')->name('topices.update');
    Route::delete('topices','TopicesController@destroy')->name('topices.destroy');
    Route::get('search','TopicesController@search')->name('topices.search');

    //用户相关
    Route::resource('users','UsersController',['only'=> ['update','edit']]);
    Route::get('users/{user}/{stype?}','UsersController@show')->name('users.show');

    //关注列表&粉丝列表
    Route::get('users/{user}/followings', 'UsersController@followings')->name('users.followings');
    Route::get('users/{user}/followers', 'UsersController@followers')->name('users.followers');
    Route::post('users/activation','UsersController@checkSecret')->name('users.authSecret');
    //关注&取消关注
    Route::post('users/followers/{userid}','FollowersController@store')->name('followers.store');
    Route::delete('users/followers/{userid}','FollowersController@destroy')->name('followers.destroy');

    //帖子评论
    Route::resource('replies', 'RepliesController', ['only' => ['store','destroy']]);

    Route::post('uploadImage','TopicesController@uploadImage')->name('topices.uploade_image');
});
