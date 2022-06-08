<?php

use Illuminate\Http\Request;
use Modules\Setting\Http\Controllers\Api\SettingController;

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

Route::middleware('auth:api')->get('/setting', function (Request $request) {
    return $request->user();
});

// setting route
Route::get('get-setting', [SettingController::class, 'getSetting']);