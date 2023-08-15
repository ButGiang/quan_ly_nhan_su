<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AccountController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\StaffController;
use \App\Http\Controllers\MajorController;
use \App\Http\Controllers\DepartmentController;


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

    Route::prefix('staff')->group(function() {
        Route::get('/list', [StaffController::class, 'index']);
        Route::get('/add', [StaffController::class, 'create']);
        Route::post('/add', [StaffController::class, 'post_create']);
        Route::get('/edit/{id}', [StaffController::class, 'edit']);
        Route::post('/edit/{id}', [StaffController::class, 'post_edit']);
        Route::delete('/delete', [StaffController::class, 'delete']);
        Route::post('/search', [StaffController::class, 'search']);

        Route::prefix('bank')->group(function() {
            Route::get('/', [StaffController::class, 'bank_list']);
            Route::get('/add', [StaffController::class, 'bank_add']);
            Route::post('/add', [StaffController::class, 'post_bank_add']);
            Route::get('/edit/{id_tknh}', [StaffController::class, 'bank_edit']);
            Route::post('/edit/{id_tknh}', [StaffController::class, 'post_bank_edit']);
            Route::delete('/delete', [StaffController::class, 'bank_delete']);
            Route::post('/search', [StaffController::class, 'bank_search']);
        });

        Route::prefix('insurance')->group(function() {
            Route::get('/', [StaffController::class, 'insurance_list']);
            Route::get('/add', [StaffController::class, 'insurance_add']);
            Route::post('/add', [StaffController::class, 'post_insurance_add']);
            Route::get('/edit/{id}', [StaffController::class, 'insurance_edit']);
            Route::post('/edit/{id}', [StaffController::class, 'post_insurance_edit']);
            Route::delete('/delete', [StaffController::class, 'insurance_delete']);
            Route::post('/search', [StaffController::class, 'insurance_search']);
        });

        Route::prefix('grown_process')->group(function() {
            Route::get('/', [StaffController::class, 'grown_process_list']);
            Route::get('/add', [StaffController::class, 'grown_process_add']);
            Route::post('/add', [StaffController::class, 'post_grown_process_add']);
            Route::get('/edit/{id}', [StaffController::class, 'grown_process_edit']);
            Route::post('/edit/{id}', [StaffController::class, 'post_grown_process_edit']);
            Route::delete('/delete', [StaffController::class, 'grown_process_delete']);
            Route::post('/search', [StaffController::class, 'grown_process_search']);
        });

        Route::prefix('achievement')->group(function() {
            Route::get('/', [StaffController::class, 'achievement_list']);
            Route::get('/add', [StaffController::class, 'achievement_add']);
            Route::post('/add', [StaffController::class, 'post_achievement_add']);
            Route::get('/edit/{id}', [StaffController::class, 'achievement_edit']);
            Route::post('/edit/{id}', [StaffController::class, 'post_achievement_edit']);
            Route::delete('/delete', [StaffController::class, 'achievement_delete']);
            Route::post('/search', [StaffController::class, 'achievement_search']);
        });
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

});