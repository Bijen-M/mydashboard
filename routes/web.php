<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;

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
Route::get('/', [FrontController::class, 'index'])->name('homepage');

Auth::routes();

// Frontend routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard');
        // Route::post('/orders', 'store');
    });
});