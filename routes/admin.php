<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
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
            Route::view('/','admin.auth.login')->name('index');
            Route::post('/', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login']);
        });

        Route::prefix('reset-password')->name('reset-password.')->group(function(){
            Route::view('/','admin.auth.reset-password')->name('index');
            Route::post('/', [\App\Http\Controllers\Admin\Auth\PasswordController::class, 'reset'])->name('reset');
        });

    });

    Route::get('logout', [\App\Http\Controllers\Admin\Auth\LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('auth:user')->group(function(){
    Route::view('/', 'admin.dashboard')->name('index');
    Route::resource('user', \App\Http\Controllers\Admin\User\UserController::class);
    Route::resource('student', \App\Http\Controllers\Admin\Student\StudentController::class);
    Route::resource('clearance', \App\Http\Controllers\Admin\Clearance\ClearanceController::class);
    Route::resource('clearance.user', \App\Http\Controllers\Admin\Clearance\ClearanceUserController::class);
    Route::resource('clearance.clearance-section', \App\Http\Controllers\Admin\Clearance\ClearanceSectionController::class);
    Route::resource('clearance.clearance-section.user', \App\Http\Controllers\Admin\Clearance\ClearanceSectionUserController::class);
    Route::resource('clearance-status', \App\Http\Controllers\Admin\Clearance\ClearanceStatusController::class);
    Route::resource('clearance-section-status', \App\Http\Controllers\Admin\Clearance\ClearanceSectionStatusController::class);
});


