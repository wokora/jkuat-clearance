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

Route::prefix('auth')->group(function(){

    Route::middleware('guest')->group(function(){

        Route::prefix('login')->name('login.')->group(function(){
            Route::view('/','student.auth.login')->name('index');
            Route::post('/', [\App\Http\Controllers\Student\Auth\LoginController::class, 'login']);
        });

        Route::prefix('register')->name('register.')->group(function(){
            Route::view('/','student.auth.register')->name('index');
            Route::post('/', [\App\Http\Controllers\Student\Auth\RegisterController::class, 'register']);
        });

        Route::prefix('reset-password')->name('reset-password.')->group(function(){
            Route::view('/','student.auth.reset-password')->name('index');
            Route::post('/', [\App\Http\Controllers\Student\Auth\PasswordController::class, 'reset'])->name('reset');
        });

    });

    Route::get('logout', [\App\Http\Controllers\Student\Auth\LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('auth:student')->group(function(){
    Route::view('/', 'student.dashboard')->name('index');
    Route::resource('application', \App\Http\Controllers\Student\Student\ApplicationController::class);
    Route::resource('Section', \App\Http\Controllers\Student\Student\SectionController::class);
});
