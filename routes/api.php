<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function(){

    Route::get('/',function()
    {
        return 'you must authenticate to access the api';
    });

    //Login
    Route::post('signin', 'AuthController@login');
    //Register
    Route::post('signup', 'AuthController@signUp');

    Route::group(['middleware' => 'auth:api'], function()
    {
        //Logout
        Route::get('logout', 'AuthController@logout');
        //GetDataUser
        Route::get('user', 'AuthController@user');
        //Tasks
        Route::resource('/task','TaskController',['except' => ['create','edit']]);
    });
});