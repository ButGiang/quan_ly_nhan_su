<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\StaffController;
use \App\Http\Controllers\MajorController;
use \App\Http\Controllers\UploadController;

Route::get('/', [AccountController::class, 'index']);

Route::get('login', [AccountController::class, 'index'])->name('login');
Route::post('login', [AccountController::class, 'post_login']);
Route::get('logout', [AccountController::class, 'logout']);

Route::get('getPass', [AccountController::class, 'getPass']);
Route::post('getPass', [AccountController::class, 'post_getPass']);

Route::get('updatePass/{email}/{token}', [AccountController::class, 'updatePass']);
Route::post('updatePass/{email}/{token}', [AccountController::class, 'post_updatePass']);

Route::middleware(['auth'])->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('main', [MainController::class, 'index']);
        
    Route::get('profile', [MainController::class, 'profile']);
    Route::post('profile', [MainController::class, 'post_profile']);

    Route::prefix('staff')->group(function() {
        Route::get('/list', [StaffController::class, 'index']);
        Route::get('/add', [StaffController::class, 'create']);
        Route::post('/add', [StaffController::class, 'post_create']);
        Route::delete('/delete', [StaffController::class, 'delete']);
    });
    
    Route::prefix('major')->group(function() {
        Route::get('/list', [MajorController::class, 'index']);
        Route::get('/add', [MajorController::class, 'create']);
        Route::post('/add', [MajorController::class, 'post_create']);
        Route::delete('/delete', [MajorController::class, 'delete']);
    });
});