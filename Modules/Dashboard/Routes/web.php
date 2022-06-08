<?php
use Modules\Dashboard\Http\Controllers\Backend\DashboardController;
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

Route::middleware(['auth','can:see_dashboard'])->group(function() {
    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
});

Route::prefix('cd-admin')->name('cd-admin.')->middleware(['auth','can:see_dashboard'])->group(function (){
    Route::get('/', 'Backend\DashboardController@index')->name('dashboard');
});

Route::get('view-about', function () {
    return view('dashboard::about.view-about');
});

Route::get('view-dynamic-about', function () {
    return view('dashboard::about.view-dynamic-about');
});

Route::get('/',[DashboardController::class,'index'])->name('index');
