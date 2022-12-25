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
Route::get('phpmyinfo', function () {
    phpinfo();
});
Route::get('watch-tv', function () {
    return view('admins.tv.index');
});
Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home');

Route::get('/video',[App\Http\Controllers\Frontend\VideoController::class,'show'])->name('video.show');
Route::get('/videos',[App\Http\Controllers\Frontend\VideoController::class,'index'])->name('video.index');

Route::get('/news',[App\Http\Controllers\Frontend\PostController::class,'index'])->name('post.index');
Route::get('/news/show',[App\Http\Controllers\Frontend\PostController::class,'show'])->name('post.show');

Route::controller(App\Http\Controllers\Frontend\ContactUsController::class)->group(function(){
    Route::get('/contact-us','index')->name('contac_us.index');
    Route::post('/contact-us','store');
});

// Admin
Route::middleware('admin')->prefix('admin')->as('admin.')->group(function(){

    Route::controller(App\Http\Controllers\Admin\DashboardController::class)->group(function(){
        Route::get('dashboard', 'index')->name('dashboard.index');
    });
    // Route::namespace('App\Http\Controllers\Admin')->group(function(){
    //     Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');
    // });

    // Category
    Route::resource('category',App\Http\Controllers\Admin\CategoryController::class);
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('category-get-ajax','getAjax');
        Route::get('category-search','search');
    });


    // Tag
    Route::resource('tag',App\Http\Controllers\Admin\TagController::class);
    Route::controller(App\Http\Controllers\Admin\TagController::class)->group(function(){
        Route::get('tag-get-ajax','getAjax');
        Route::get('tag-search','search');
    });

    // Post
    Route::controller(App\Http\Controllers\Admin\PostController::class)->group(function(){
        Route::get('post-get-ajax','getAjax');
        Route::get('post-restore/{id}','restore');
        Route::delete('post-delete/{id}','destroy_forever');
        Route::post('post/{post}','update');
        Route::get('post-search','search');
        Route::get('post/delete','delete');
    });
    Route::resource('post',App\Http\Controllers\Admin\PostController::class);

    // Video
    Route::controller(App\Http\Controllers\Admin\VideoController::class)->group(function(){
        Route::get('video-get-ajax','getAjax');
        Route::get('video-restore/{id}','restore');
        Route::delete('video-delete/{id}','destroy_forever');
        Route::post('video/{video}','update');
        Route::get('video-search','search');
        Route::post('video-file-upload','fileUpload');
        Route::get('video/delete','delete')->name('video.index_delete');
    });
    Route::resource('video',App\Http\Controllers\Admin\VideoController::class);

    // Contact Us
    Route::controller(App\Http\Controllers\Admin\ContactUsController::class)->group(function(){
        Route::get('contact-get-ajax','getAjax');
        Route::get('contact-us','index')->name('contact_us.index');
        Route::get('contact-search','search');
        Route::delete('contact-us/{contact_us}','destroy');
    });
    // Ajax
    Route::controller(App\Http\Controllers\Admin\AjaxController::class)->group(function(){
        Route::get('slug-generate','slugGenerate');
        Route::get('ajax-category-select2','getCategorySelect2');
        Route::get('ajax-tag-select2','getTagSelect2');
    });

    // Route::get('ajax-category-select2','Admin\AjaxController@getCategorySelect2');
    // Route::get('ajax-venue-select2','Admin\AjaxController@getVenueSelect2');
    // Route::get('ajax-tag-select2','Admin\AjaxController@getTagSelect2');
});
// Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
//     Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard.index');
// });


// Login
Route::get('login',[App\Http\Controllers\Admin\UserController::class,'loginForm'])->name('admin.login')->middleware('guest');
Route::post('login',[App\Http\Controllers\Admin\UserController::class,'login'])->name('admin.login')->middleware('guest');
Route::get('logout',[App\Http\Controllers\Admin\UserController::class,'logout'])->name('admin.logout')->middleware('auth');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
