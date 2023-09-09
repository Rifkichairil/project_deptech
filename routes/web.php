<?php

use App\Http\Controllers\AuthController;
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
    Route::get('/dashboard', function () {
        return view('welcome');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
