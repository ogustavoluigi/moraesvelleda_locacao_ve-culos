<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;

Route::get('/', [AppController::class, 'index'])->name('index');

Route::group(['prefix' => 'conta', 'middleware' => 'auth'], function () {
    Route::singleton('profile', ProfileController::class)->names('profile')->destroyable()->only('edit', 'update', 'destroy');
});

require __DIR__ . '/auth.php';
