<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\StaffController;
use \App\Http\Controllers\MajorController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\UploadController;
use \App\Http\Controllers\ContractController;
use \App\Http\Controllers\TimeKeepingController;

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
        Route::get('/edit/{id}', [StaffController::class, 'edit']);
        Route::post('/edit/{id}', [StaffController::class, 'post_edit']);
        Route::delete('/delete', [StaffController::class, 'delete']);
        Route::post('/search', [StaffController::class, 'search']);
    });
    
    Route::prefix('department')->group(function() {
        Route::get('/list', [DepartmentController::class, 'index']);
        Route::get('/add', [DepartmentController::class, 'create']);
        Route::post('/add', [DepartmentController::class, 'post_create']);
        Route::get('/edit/{id_phongban}', [DepartmentController::class, 'edit']);
        Route::post('/edit/{id_phongban}', [DepartmentController::class, 'post_edit']);
        Route::delete('/delete', [DepartmentController::class, 'delete']);
    });

    Route::prefix('major')->group(function() {
        Route::get('/list', [MajorController::class, 'index']);
        Route::get('/add', [MajorController::class, 'create']);
        Route::post('/add', [MajorController::class, 'post_create']);
        Route::get('/edit/{id_chuyennganh}', [MajorController::class, 'edit']);
        Route::post('/edit/{id_chuyennganh}', [MajorController::class, 'post_edit']);
        Route::delete('/delete', [MajorController::class, 'delete']);
    });

    Route::prefix('contract')->group(function() {
        Route::get('/list', [ContractController::class, 'index']);
        Route::get('/add', [ContractController::class, 'create']);
        Route::post('/add', [ContractController::class, 'post_create']);
        Route::get('/edit/{id_hopdong}', [ContractController::class, 'edit']);
        Route::post('/edit/{id_hopdong}', [ContractController::class, 'post_edit']);
        Route::delete('/delete', [ContractController::class, 'delete']);
        Route::post('/search', [ContractController::class, 'search']);
    });

    Route::get('timekeeping', [TimeKeepingController::class, 'index']);
});