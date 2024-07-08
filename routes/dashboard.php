<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Auth\PasswordController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\AdminController;

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('/admins', AdminController::class)->names("admins");

    Route::singleton('profile', ProfileController::class)->names('profile')->destroyable()->only(['edit', 'update', 'destroy']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
