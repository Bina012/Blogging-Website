<?php

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

//Backend Login/Logout
Route::get('cd-admin/login', 'Backend\AuthController@index')->name('login');
Route::post('cd-admin/loginSubmit', 'Backend\AuthController@login')->name('loginSubmit');
Route::get('cd-admin/logout', 'Backend\AuthController@logout')->name('logout');

Route::get('/login', 'Backend\AuthController@index')->name('user.login');


//Frontend Login/Logout
// Route::get('/login', 'Frontend\AuthController@index')->name('user.login');
// Route::post('/loginSubmit', 'Frontend\AuthController@login')->name('user.loginSubmit');
// Route::get('/logout', 'Frontend\AuthController@logout')->name('user.logout');
