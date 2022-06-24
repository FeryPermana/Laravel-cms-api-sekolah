<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function () {

        //dashboard
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        // permissions
        Route::resource('/permission', Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'], 'as' => 'admin']);

        //roles
        Route::resource('/role', Admin\RoleController::class, ['except' => ['show'], 'as' => 'admin']);

        //users
        Route::resource('/user', Admin\UserController::class, ['except' => ['show'], 'as' => 'admin']);

        //tags
        Route::resource('/tag', Admin\TagController::class, ['except' => 'show', 'as' => 'admin']);

        //categories
        Route::resource('/category', Admin\CategoryController::class, ['except' => 'show', 'as' => 'admin']);

        //posts
        Route::resource('/post', Admin\PostController::class, ['except' => 'show', 'as' => 'admin']);

        //event
        Route::resource('/event', Admin\EventController::class, ['except' => 'show' ,'as' => 'admin']);

        //photo
        Route::resource('/photo', Admin\PhotoController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);

        //video
        Route::resource('/video', Admin\VideoController::class, ['except' => 'show' ,'as' => 'admin']);

        //slider
        Route::resource('/slider', Admin\SliderController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
    });
});
