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
Route::name('cd-admin.')->middleware(['auth','can:see_dashboard'])->group(function (){
    Route::get('cd-admin/view-setting', 'Backend\SettingController@index')->name('setting');
    Route::post('cd-admin/update-setting', 'Backend\SettingController@update')->name('updatesetting');

});
