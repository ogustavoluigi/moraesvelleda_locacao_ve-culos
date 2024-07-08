<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Auth\PasswordController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\AdminController;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('/usuarios', UserController::class)->names("users")->except(['create', 'store']);
    Route::put('/usuarios/{user}/password', [UserController::class, 'passwordUpdate'])->name('users.password.update');

    Route::resource('/admins', AdminController::class)->names("admins")->only(['index', 'create', 'store']);

    Route::singleton('profile', ProfileController::class)->names('profile')->destroyable()->only(['edit', 'update', 'destroy']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
