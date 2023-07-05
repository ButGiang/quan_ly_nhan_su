<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\MainController;
use \App\Http\Controllers\StaffController;


Route::get('/', [LoginController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'post_login']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('getPass', [LoginController::class, 'getPass']);
Route::post('getPass', [LoginController::class, 'post_getPass']);

Route::get('updatePass/{email}/{token}', [LoginController::class, 'updatePass']);
Route::post('updatePass/{email}/{token}', [LoginController::class, 'post_updatePass']);

Route::middleware(['auth'])->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('main', [MainController::class, 'index']);

    Route::prefix('staff')->group(function() {
        Route::get('/list', [StaffController::class, 'index']);
        Route::get('/add', [StaffController::class, 'create']);
        Route::post('/add', [StaffController::class, 'post_create']);
    });

});