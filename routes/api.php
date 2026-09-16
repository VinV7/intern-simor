<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\Admin\Department\DepartmentController as APIDepartmentController;
use App\Http\Controllers\Api\v1\Admin\ActivitiesCategories\ActivitiesCategoriesController as APIActivityCategoriesController;
use App\Http\Controllers\Api\v1\Admin\User\UserController;

use App\Http\Controllers\Api\v1\fss\ActivityCategories\ActivityCategoriesController;
use App\Http\Controllers\Api\v1\fss\User\UsersController;
use App\Http\Controllers\Api\v1\fss\Department\DepartmentsController;

Route::prefix('departments')
    ->name('departments.')
    ->group(function () {
        Route::get('/', [APIDepartmentController::class, 'index'])->name('index');
        Route::get('/{id}', [APIDepartmentController::class, 'show'])->name('show');
        Route::post('/', [APIDepartmentController::class, 'store'])->name('store');
        Route::put('/{id}', [APIDepartmentController::class, 'update'])->name('update');
        Route::delete('/{id}', [APIDepartmentController::class, 'destroy'])->name('destroy');
    });

Route::prefix('activities-categories')
    ->name('activities-categories.')
    ->group(function () {
        Route::get('/', [APIActivityCategoriesController::class, 'index'])->name('index');
        Route::get('/{id}', [APIActivityCategoriesController::class, 'show'])->name('show');
        Route::post('/', [APIActivityCategoriesController::class, 'store'])->name('store');
        Route::put('/{id}', [APIActivityCategoriesController::class, 'update'])->name('update');
        Route::delete('/{id}', [APIActivityCategoriesController::class, 'destroy'])->name('destroy');
    });

Route::prefix('users')
    ->name('users.')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

Route::get('/activity-category', [ActivityCategoriesController::class, 'index']);
Route::get('/activity-category/{id}', [ActivityCategoriesController::class, 'show']);

Route::get('/user/{id}', [UsersController::class, 'show']);
Route::get('/user',[UsersController::class, 'index']);

Route::get('/department/{id}', [DepartmentsController::class, 'show']);
Route::get('/department', [DepartmentsController::class, 'index']);