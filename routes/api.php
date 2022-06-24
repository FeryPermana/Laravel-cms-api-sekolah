<?php

namespace App\Http\Controllers;
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

//posts
Route::get('/post', [Api\PostController::class, 'index']);
Route::get('/post/{id?}', [Api\PostController::class, 'show']);
Route::get('/homepage/post', [Api\PostController::class, 'PostHomePage']);

//events
Route::get('/event', [Api\EventController::class, 'index']);
Route::get('/event/{slug?}', [Api\EventController::class, 'show']);
Route::get('/homepage/event', [Api\EventController::class, 'EventHomePage']);

//slider
Route::get('/slider', [Api\SliderController::class, 'index']);

//tags
Route::get('/tag', [Api\TagController::class, 'index']);
Route::get('/tag/{slug?}', [Api\TagController::class, 'show']);

//category
Route::get('/category', [Api\CategoryController::class, 'index']);
Route::get('/category/{slug?}', [Api\CategoryController::class, 'show']);

//photo
Route::get('/photo', [Api\PhotoController::class, 'index']);
Route::get('/homepage/photo', [Api\PhotoController::class, 'PhotoHomepage']);

//video
Route::get('/video', [Api\VideoController::class, 'index']);
Route::get('/homepage/video', [Api\VideoController::class, 'VideoHomepage']);
