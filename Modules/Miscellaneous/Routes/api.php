<?php

use Illuminate\Http\Request;
use Modules\Miscellaneous\Http\Controllers\Api\PartnerController;
use Modules\Miscellaneous\Http\Controllers\Api\ServicesController;
use Modules\Miscellaneous\Http\Controllers\Api\BannerController;
use Modules\Miscellaneous\Http\Controllers\Api\BlogController;
use Modules\Miscellaneous\Http\Controllers\Api\BlogCategoryController;

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

Route::middleware('auth:api')->get('/miscellaneous', function (Request $request) {
    return $request->user();
});

Route::get('/partners/get', [PartnerController::class, 'getPartners']);
Route::get('/services/get', [ServicesController::class, 'getServices']);
Route::get('/banner/get', [BannerController::class, 'getBanner']);

//Blog
Route::get('blog/get',[BlogController::class,'getAllBlog']);
Route::get('blog/single/{id}',[BlogController::class,'getSingle']);

//Blog Category
Route::get('blogCategory/get',[BlogCategoryController::class,'getAllBlogCategory']);
Route::get('blogCategory/single/{slug}',[BlogCategoryController::class,'getSingleBlogCategory']);

//Feature product
Route::get('feature/get',[BlogController::class,'getFeature']);

//latest product
Route::get('latest/get',[BlogController::class,'getLatest']);

//Blog by category
Route::get('blog/get-by-category/{slug}',[BlogCategoryController::class,'getBlogWithCategory']);

//similar blog
Route::get('blog/get-similar-blog/{slug}',[BlogController::class,'getSimilarBlog']);

//Blog by tag
Route::get('blog/get-blog-by-tag/{slug}',[BlogController::class,'getBlogByTag']);