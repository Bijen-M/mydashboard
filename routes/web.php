<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BannerController;

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
//Front Routes
Route::get('/', [FrontController::class, 'index'])->name('home');

Auth::routes();

// Frontend routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('no');
Route::get('/about-us', [App\Http\Controllers\FrontController::class, 'aboutUs'])->name('aboutus');



//Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/cms-dashboard', 'cms_module')->name('cms.dashboard');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menus', 'index')->name('menus');
        Route::post('/create-menu', 'store')->name('menus.store');
    });
    Route::controller(PostsController::class)->group(function () {
        // Route::get('/create', 'create')->name('post');
        Route::get('/posts', 'index')->name('posts.index');
        Route::get('/posts/create', 'postsCreate')->name('posts.create');
        Route::post('/posts/submit', 'postsSubmit')->name('posts.submit');
    });
    Route::resource('about-us', AboutUsController::class);
    Route::resource('banners', BannerController::class);
});