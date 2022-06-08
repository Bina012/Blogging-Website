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

Route::prefix('/user')->group(function () {
    Route::post('/login', 'Api\LoginController@login');
    // Route::post('/register', 'Api\User\UserController@register');
    // Route::post('/sendVerificationCode', 'Api\User\UserController@sendVerificationCode');
    // Route::post('/checkVerificationCode', 'Api\User\UserController@checkVerificationCode');
   
    Route::group(['middleware' => 'auth:api'], function () {
     Route::get('/logout', 'Api\LoginController@logout');
    //  Route::post('/update', 'Api\User\UserController@updateProfile');
    //  Route::post('/changepassword', 'Api\User\UserController@changePassword');
    });
   });