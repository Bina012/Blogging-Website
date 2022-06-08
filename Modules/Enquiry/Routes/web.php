<?php
use Modules\Enquiry\Http\Controllers\EnquiryController;
use Modules\Enquiry\Http\Controllers\MailController;

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

Route::prefix('cd-admin')->name('enquiry.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    Route::get('/enquiry-get', [EnquiryController::class, 'get'])->name('get');
    Route::post('/store-enquiry', [EnquiryController::class, 'store'])->name('store');
    Route::post('/delete-enquiry', [EnquiryController::class, 'delete'])->name('delete');
    Route::get('/enquiry-changestatus', [EnquiryController::class, 'changestatus'])->name('changestatus');
    

});
// Route::get('/send-email',[MailController::class,'sendMail']);

