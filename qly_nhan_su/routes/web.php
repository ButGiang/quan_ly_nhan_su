<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\MainController;



Route::get('/', [LoginController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login/check', [LoginController::class, 'check']);
Route::get('logout', [LoginController::class, 'logout']);

Route::get('getPass', [LoginController::class, 'getPass']);
Route::post('getPass/recoverPass', [LoginController::class, 'recoverPass']);

Route::get('updatePass/{email}/{token}', [LoginController::class, 'updatePass']);
Route::post('updatePass/{email}/{token}', [LoginController::class, 'post_updatePass']);

Route::middleware(['auth'])->group(function() {
    Route::get('/', [MainController::class, 'index'])->name('main');
    Route::get('main', [MainController::class, 'index']);
});