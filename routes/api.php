<?php

use App\Http\Controllers\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [HomeController::class, 'authenticate']);
Route::post('/logout', [HomeController::class, 'logout']);
Route::post('/change-password', [HomeController::class, 'changePassword']);

// home
Route::prefix('/home')->group(function ()
{
    Route::get('/slides', [HomeController::class, 'getSlides']);
    Route::get('/images_slides', [HomeController::class, 'getImagesSlides']);
    Route::get('/page2', [HomeController::class, 'getPage2']);
    Route::get('/page3', [HomeController::class, 'getPage3']);
    Route::get('/sub_page3', [HomeController::class, 'getSubpage3']);
    Route::get('/page4', [HomeController::class, 'getPage4']);
    Route::get('/services', [HomeController::class, 'getServices']);
    Route::get('/progress', [HomeController::class, 'getProgress']);
    Route::get('/page5', [HomeController::class, 'getPage5']);
    Route::get('/sub_page5', [HomeController::class, 'getSubpage5']);
    Route::get('/page6', [HomeController::class, 'getPage6']);
    Route::get('/sub_page6', [HomeController::class, 'getSubpage6']);
    Route::get('/page7', [HomeController::class, 'getPage7']);
    Route::get('/news', [HomeController::class, 'getNews']);
});