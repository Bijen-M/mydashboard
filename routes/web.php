<?php

use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;

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
Route::get('/services/{slug}', [App\Http\Controllers\FrontController::class, 'serviceDetail'])->name('service.detail');
Route::get('/projects', [App\Http\Controllers\FrontController::class, 'projectList'])->name('projects.list');
Route::get('/projects/{slug}', [App\Http\Controllers\FrontController::class, 'projectDetail'])->name('project.detail');
Route::get('/contact-us', [App\Http\Controllers\FrontController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-us', [App\Http\Controllers\FrontController::class, 'contactUsStore'])->name('contact.us.store');



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
    Route::resource('services', ServiceController::class);
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project-type', 'projectTypeIndex')->name('project.type.index');
        Route::get('/project-type/create', 'projectTypeCreate')->name('project.type.create');
        Route::post('/project-type/submit', 'projectTypeStore')->name('project.type.submit');
        Route::get('/project-type/{projecttype}/edit', 'projectTypeEdit')->name('project.type.edit');
        Route::post('/project-type/{projecttype}', 'projectTypeUpdate')->name('project.type.update');
        Route::delete('/project-type/{projecttype}', 'projectTypeDestroy')->name('project.type.destroy');
        Route::post('/projects/select-current-projects', 'saveCurrentProjects')->name('project.current.save');
    });
    Route::resource('projects', ProjectController::class);
    Route::resource('contactus', ContactUsController::class);
    Route::get('services/{service}/edit', [ServiceController::class,'edit'])->name('services.edit');
});