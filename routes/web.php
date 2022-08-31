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

Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index']);

Route::get('/videos',[App\Http\Controllers\Frontend\VideoController::class,'index'])->name('video.index');
Route::get('/video/show',[App\Http\Controllers\Frontend\VideoController::class,'show'])->name('video.show');
