<?php
use Modules\AboutUs\Http\Controllers\AboutUsController;
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

Route::prefix('cd-admin')->name('about.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    Route::get('get-about', [AboutUsController::class, 'index'])->name('index');
    // Route::get('show-about', [AboutUsController::class, 'show'])->name('show');
    Route::get('edit-about', [AboutUsController::class, 'edit'])->name('edit');
    Route::POST('update-about', [AboutUsController::class, 'update'])->name('update');

});
