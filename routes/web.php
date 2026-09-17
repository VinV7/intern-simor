<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\v1\Admin\Department\DepartmentController;
use App\Http\Controllers\Web\v1\Admin\ActivitiesCategories\ActivitiesCategoriesController;
use App\Http\Controllers\Web\v1\Admin\User\UserController;

use App\Http\Controllers\Web\v1\fss\ActivityCategories\ActivityCategoriesController as FSSActCatController;
use App\Http\Controllers\Web\v1\fss\Departments\DepartmentsController as FSSDeptController;
use App\Http\Controllers\Web\v1\fss\User\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');


Route::prefix('departments')
    ->name('departments.')
    ->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [DepartmentController::class, 'edit'])->name('edit');
        Route::get('/{id}', [DepartmentController::class, 'show'])->name('show');
        Route::post('/', [DepartmentController::class, 'store'])->name('store');
        Route::put('/{id}', [DepartmentController::class, 'update'])->name('update');
        Route::delete('/{id}', [DepartmentController::class, 'destroy'])->name('destroy');
    });

Route::prefix('categories-activities')
    ->name('categories-activities.')
    ->group(function () {
        Route::get('/', [ActivitiesCategoriesController::class, 'index'])->name('index');
        Route::get('/create', [ActivitiesCategoriesController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [ActivitiesCategoriesController::class, 'edit'])->name('edit');
        Route::get('/{id}', [ActivitiesCategoriesController::class, 'show'])->name('show');
        Route::post('/', [ActivitiesCategoriesController::class, 'store'])->name('store');
        Route::put('/{id}', [ActivitiesCategoriesController::class, 'update'])->name('update');
        Route::delete('/{id}', [ActivitiesCategoriesController::class, 'destroy'])->name('destroy');
    });

Route::prefix('users')
    ->name('users.')
    ->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });


Route::prefix('fss')
    ->name('fss.')
    ->group(function () {
        Route::prefix('departments')
            ->name('departments.')
            ->group(function () {
                Route::get('/', [FSSDeptController::class, 'index'])->name('index');
                Route::get('/{id}', [FSSDeptController::class, 'show'])->name('show');
            });
        Route::prefix('activity-categories')
            ->name('activity-categories.')
            ->group(function () {
                Route::get('/', [FSSActCatController::class, 'index'])->name('index');
                Route::get('/{id}', [FSSActCatController::class, 'show'])->name('show');
            });
        Route::prefix('user')
            ->name('users.')
            ->group(function () {
                Route::get('/', [UsersController::class, 'index'])->name('index');
                Route::get('/{id}', [UsersController::class, 'show'])->name('show');
            });
    });