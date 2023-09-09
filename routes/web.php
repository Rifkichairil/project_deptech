<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['guest'])->group(function(){
    Route::controller(AuthController::class)->group(function() {
        Route::get('/', 'login')->name('login');
        Route::post('/auth', 'auth')->name('auth');
        Route::get('/register', 'register')->name('register');
        Route::post('/store', 'store')->name('store');
    });
});

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(AdminController::class)->prefix('user-admin')->name('user-admin.')->group(function(){
        Route::get('/datatable', 'datatable')->name('datatable');
        Route::get('/', 'index')->name('index');

        Route::post('/store', 'store')->name('store');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
