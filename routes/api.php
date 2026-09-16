<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\v1\fss\ActivityCategories\ActivityCategoriesController;
use App\Http\Controllers\Api\v1\fss\User\UsersController ;
use App\Http\Controllers\Api\v1\fss\Department\DepartmentsController;

// Route::prefix('departments')
//     ->name('departments.')
//     ->group(function () {
//         Route::get('/', [DepartmentController::class, 'index'])->name('index');
//         Route::get('/create', [DepartmentController::class, 'create'])->name('create');
//         Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('edit');
//         Route::get('/{id}', [DepartmentController::class, 'show'])->name('show');
//         Route::post('/', [DepartmentController::class, 'store'])->name('store');
//         Route::put('/{id}', [DepartmentController::class, 'update'])->name('update');
//         Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
//     });

// Route::prefix('activities-categories')
//     ->name('activities-categories.')
//     ->group(function () {
//         Route::get('/', [ActivitiesCategoriesController::class, 'index'])->name('index');
//         Route::get('/create', [ActivitiesCategoriesController::class, 'create'])->name('create');
//         Route::get('/{id}/edit', [ActivitiesCategoriesController::class, 'edit'])->name('edit');
//         Route::get('/{id}', [ActivitiesCategoriesController::class, 'show'])->name('show');
//         Route::post('/', [ActivitiesCategoriesController::class, 'store'])->name('store');
//         Route::put('/{id}', [ActivitiesCategoriesController::class, 'update'])->name('update');
//         Route::delete('/{id}', [ActivitiesCategoriesController::class, 'destroy'])->name('destroy');
//     });

// Route::prefix('users')
//     ->name('users.')
//     ->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');
//         Route::get('/create', [UserController::class, 'create'])->name('create');
//         Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
//         Route::get('/{id}', [UserController::class, 'show'])->name('show');
//         Route::post('/', [UserController::class, 'store'])->name('store');
//         Route::put('/{id}', [UserController::class, 'update'])->name('update');
//         Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
//     });

Route::get('/activity-category', [ActivityCategoriesController::class, 'index']);
Route::get('/activity-category/{id}', [ActivityCategoriesController::class, 'show']);

Route::get('/user/{id}', [UsersController::class, 'show']);
Route::get('/user',[UsersController::class, 'index']);

Route::get('/department/{id}', [DepartmentsController::class, 'show']);
Route::get('/department', [DepartmentsController::class, 'index']);