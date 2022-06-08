<?php

use Modules\Miscellaneous\Http\Controllers\Backend\Blog\BlogController;
use Modules\Miscellaneous\Http\Controllers\Backend\Banner\BannerController;
use Modules\Miscellaneous\Http\Controllers\Backend\Services\ServicesController;
use Modules\Miscellaneous\Http\Controllers\Backend\Partner\PartnerController;
use Modules\Miscellaneous\Http\Controllers\Backend\Blog\BlogCategoryController;
use Modules\Miscellaneous\Http\Controllers\Backend\Tag\TagController;

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

Route::prefix('cd-admin')->name('blog.')->middleware(['auth', 'can:see_dashboard'])->group(function () {

    route::get('/view-blog', [BlogController::class, 'index'])->name('index');
    route::get('/add-blog', [BlogController::class, 'add'])->name('add');
    route::post('/store-blog', [BlogController::class, 'store'])->name('store');
    route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit');
    route::post('/update-blog', [BlogController::class, 'update'])->name('update');
    route::post('/delete-blog', [BlogController::class, 'delete'])->name('delete');
    route::post('/blog-status', [BlogController::class, 'blogStatus'])->name('blogStatus');
    route::post('/blog-feature', [BlogController::class, 'blogFeature'])->name('blogFeature');
    route::get('/view-single-blog/{id}', [BlogController::class, 'view'])->name('view');
});


Route::prefix('cd-admin')->name('blogcategory.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    Route::get('/view-blogcategory',[BlogCategoryController::class,'index'])->name('index');
    Route::get('/add-blogcategory',[BlogCategoryController::class,'add'])->name('add');
    Route::get('/view-single-blogcategory/{id}',[BlogCategoryController::class,'view'])->name('view');
    Route::post('/store-blogcategory',[BlogCategoryController::class,'store'])->name('store');
    Route::get('/edit-blogcategory/{id}',[BlogCategoryController::class,'edit'])->name('edit');
    Route::post('/update-blogcategory',[BlogCategoryController::class,'update'])->name('update');
    Route::post('/delete-blogcategory',[BlogCategoryController::class,'delete'])->name('delete');      
});

Route::prefix('cd-admin')->name('tag.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    Route::get('/view-tag',[TagController::class,'index'])->name('index');
    Route::get('/add-tag',[TagController::class,'add'])->name('add');
    Route::get('/view-single-tag/{id}',[TagController::class,'view'])->name('view');
    Route::post('/store-tag',[TagController::class,'store'])->name('store');
    Route::get('/edit-tag/{id}',[TagController::class,'edit'])->name('edit');
    Route::post('/update-tag',[TagController::class,'update'])->name('update');
    Route::post('/delete-tag',[TagController::class,'delete'])->name('delete');

});










/**
 * Banner Routes
 */

Route::prefix('cd-admin')->name('banner.')->middleware(['auth', 'can:see_dashboard'])->group(function () {

    route::get('/banner-index', [BannerController::class, 'index'])->name('index');
    route::post('/update-banner', [BannerController::class, 'update'])->name('update');
});

/**
 * Services Routes
 */

Route::prefix('cd-admin')->name('services.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    route::get('/services-index', [ServicesController::class, 'index'])->name('index');
    route::get('/add-services', [ServicesController::class, 'add'])->name('add');
    route::post('/store-services', [ServicesController::class, 'store'])->name('store');
    route::get('/edit-services/{id}', [ServicesController::class, 'edit'])->name('edit');
    route::post('/update-services', [ServicesController::class, 'update'])->name('update');
    route::post('/delete-services', [ServicesController::class, 'delete'])->name('delete');
});

/**
 * Partner Routes
 */

Route::prefix('cd-admin')->name('partners.')->middleware(['auth', 'can:see_dashboard'])->group(function () {
    route::get('/partner-index', [PartnerController::class, 'index'])->name('index');
    route::get('/add-partner', [PartnerController::class, 'add'])->name('add');
    route::post('/store-partner', [PartnerController::class, 'store'])->name('store');
    route::get('/edit-partner/{id}', [PartnerController::class, 'edit'])->name('edit');
    route::post('/update-partner', [PartnerController::class, 'update'])->name('update');
    route::post('/delete-partner', [PartnerController::class, 'delete'])->name('delete');
});
