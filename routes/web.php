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
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;

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
Route::get('/vacancy', [App\Http\Controllers\FrontController::class, 'vacancy'])->name('vacancy');



//Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/cms-dashboard', 'cms_module')->name('cms.dashboard');
    });
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menus', 'index')->name('menus.index');
        Route::get('/menus/create', 'create')->name('menus.create');
        Route::post('/menus/create', 'store')->name('menus.store');
        Route::get('/menus/edit/{menu}', 'edit')->name('menus.edit');
        Route::put('/menus/update/{menu}', 'update')->name('menus.update');
        Route::delete('/menus/delete/{menu}', 'delete')->name('menus.destroy');
        Route::get('/menus/{menu}/children', 'children')->name('menus.children.index');
        Route::post('/menus/updateorder', 'updateOrder')->name('menus.sortorder');
    });
    Route::resource('about-us', AboutUsController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('users', UserController::class);
    
    Route::controller(ProjectController::class)->group(function () {
        Route::get('/project-type', 'projectTypeIndex')->name('project.type.index');
        Route::get('/project-type/create', 'projectTypeCreate')->name('project.type.create');
        Route::post('/project-type/submit', 'projectTypeStore')->name('project.type.submit');
        Route::get('/project-type/{projecttype}/edit', 'projectTypeEdit')->name('project.type.edit');
        Route::put('/project-type/{projecttype}', 'projectTypeUpdate')->name('project.type.update');
        Route::delete('/project-type/{projecttype}', 'projectTypeDestroy')->name('project.type.destroy');
        Route::post('/projects/select-current-projects', 'saveCurrentProjects')->name('project.current.save');
    });
    Route::resource('projects', ProjectController::class);
    Route::delete('projects/images/{id}', [ProjectController::class,'imageDelete'])->name('project.image.delete');
    Route::resource('contactus', ContactUsController::class);
    Route::resource('vacancy', VacancyController::class);
    Route::get('services/{service}/edit', [ServiceController::class,'edit'])->name('services.edit');
    Route::get('/settings', [SettingsController::class,'index'])->name('settings.index');
    // Route::post('/settings', [SettingsController::class,'update'])->name('settings.update');
    Route::resource('/settings', SettingsController::class)->only(['index', 'update']);
});