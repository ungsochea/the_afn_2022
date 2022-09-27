<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home');

Route::get('/videos',[App\Http\Controllers\Frontend\VideoController::class,'index'])->name('video.index');
Route::get('/video/show',[App\Http\Controllers\Frontend\VideoController::class,'show'])->name('video.show');

Route::get('/news',[App\Http\Controllers\Frontend\PostController::class,'index'])->name('post.index');
Route::get('/news/show',[App\Http\Controllers\Frontend\PostController::class,'show'])->name('post.show');


// Admin
Route::middleware('admin')->prefix('admin')->group(function(){

    Route::controller(App\Http\Controllers\Admin\DashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('admin.dashboard.index');
    });
    // Route::namespace('App\Http\Controllers\Admin')->group(function(){
    //     Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');
    // });

});
// Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
//     Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard.index');
// });


// Login
Route::get('login',[App\Http\Controllers\Admin\UserController::class,'loginForm'])->name('admin.login')->middleware('guest');
Route::post('login',[App\Http\Controllers\Admin\UserController::class,'login'])->name('admin.login')->middleware('guest');

