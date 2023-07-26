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
use \App\Http\Controllers\RewardPunishmentController;
use \App\Http\Controllers\AdvanceSalaryController;
use \App\Http\Controllers\SalaryController;


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
        Route::prefix('bank')->group(function() {
            Route::get('/', [StaffController::class, 'bank_list']);
            Route::get('/add', [StaffController::class, 'bank_add']);
            Route::post('/add', [StaffController::class, 'post_bank_add']);
            Route::get('/edit/{id_tknh}', [StaffController::class, 'bank_edit']);
            Route::post('/edit/{id_tknh}', [StaffController::class, 'post_bank_edit']);
            Route::delete('/delete', [StaffController::class, 'bank_delete']);
            Route::post('/search', [StaffController::class, 'bank_search']);
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

    Route::prefix('extra')->group(function() {
        Route::get('/reward&punishment', [RewardPunishmentController::class, 'index']);
        Route::get('/add', [RewardPunishmentController::class, 'create']);
        Route::post('/add', [RewardPunishmentController::class, 'post_create']);
        Route::get('/edit/{id_thuongphat}', [RewardPunishmentController::class, 'edit']);
        Route::post('/edit/{id_thuongphat}', [RewardPunishmentController::class, 'post_edit']);
        Route::delete('/delete', [RewardPunishmentController::class, 'delete']);
        Route::post('/search', [RewardPunishmentController::class, 'search']);
    });

    Route::prefix('advanceSalary')->group(function() {
        Route::get('/list', [AdvanceSalaryController::class, 'index']);
        Route::get('/add', [AdvanceSalaryController::class, 'create']);
        Route::post('/add', [AdvanceSalaryController::class, 'post_create']);
        Route::get('/edit/{id_ungluong}', [AdvanceSalaryController::class, 'edit']);
        Route::post('/edit/{id_ungluong}', [AdvanceSalaryController::class, 'post_edit']);
        Route::post('/search', [AdvanceSalaryController::class, 'search']);
    });

    Route::prefix('salary')->group(function() {
        Route::prefix('formula')->group(function() {
            Route::get('/', [SalaryController::class, 'formula']);
            Route::get('/add', [SalaryController::class, 'formula_add']);
            Route::post('/add', [SalaryController::class, 'post_formula_add']);
            Route::get('/edit/{id_ctl}', [SalaryController::class, 'formula_edit']);
            Route::post('/edit/{id_ctl}', [SalaryController::class, 'post_formula_edit']);
            Route::delete('/delete', [SalaryController::class, 'formula_delete']);
        });

        Route::prefix('category')->group(function() {
            Route::get('/', [SalaryController::class, 'category']);
            Route::get('/add', [SalaryController::class, 'category_add']);
            Route::post('/add', [SalaryController::class, 'post_category_add']);
            Route::get('/edit/{id_dml}', [SalaryController::class, 'category_edit']);
            Route::post('/edit/{id_dml}', [SalaryController::class, 'post_category_edit']);
            Route::delete('/delete', [SalaryController::class, 'category_delete']);
        });

        Route::prefix('fixed')->group(function() {
            Route::get('/', [SalaryController::class, 'fixedSlr']);
            Route::get('/select', [SalaryController::class, 'fixedSlr_select']);
            Route::post('/select', [SalaryController::class, 'post_fixedSlr_select']);
            Route::post('/add', [SalaryController::class, 'post_fixedSlr_add']);
            Route::get('/edit/{id_lcd}', [SalaryController::class, 'fixedSlr_edit']);
            Route::post('/edit/{id_lcd}', [SalaryController::class, 'post_fixedSlr_edit']);
            Route::delete('/delete', [SalaryController::class, 'fixedSlr_delete']);
        });

        Route::prefix('monthly')->group(function() {
            Route::get('/', [SalaryController::class, 'monthlySlr']);
            Route::get('/select', [SalaryController::class, 'monthlySlr_select']);
            Route::post('/select', [SalaryController::class, 'post_monthlySlr_select']);
            Route::post('/add', [SalaryController::class, 'post_monthlySlr_add']);
            Route::get('/edit/{id_ltt}', [SalaryController::class, 'monthlySlr_edit']);
            Route::post('/edit/{id_ltt}', [SalaryController::class, 'post_monthlySlr_edit']);
            Route::delete('/delete', [SalaryController::class, 'monthlySlr_delete']);
        });

    });

    Route::get('dayoff', [MainController::class, 'dayoff']);
});