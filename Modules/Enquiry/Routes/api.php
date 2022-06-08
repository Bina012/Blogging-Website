<?php

use Illuminate\Http\Request;
use Modules\Enquiry\Http\Controllers\Api\EnquiryController;
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

Route::middleware('auth:api')->get('/enquiry', function (Request $request) {
    return $request->user();
});
Route::get('enquiry/get',[EnquiryController::class,'getAllEnquiry']);
Route::post('enquiry/store',[EnquiryController::class,'storeEnquiry']);