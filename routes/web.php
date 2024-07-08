<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;

Route::get('/', [AppController::class, 'index'])->name('index');

Route::group(['as' => 'vehicles.', 'controller' => VehicleController::class], function () {
    Route::get('/veiculos', 'index')->name('index');
    Route::get('/veiculos/{slug}', 'show')->name('show');
});

Route::group(['prefix' => 'conta', 'middleware' => 'auth'], function () {
    Route::resource('reservas', RentalController::class)->only(['index', 'store', 'update'])->names("rentals");
    Route::singleton('profile', ProfileController::class)->names('profile')->destroyable()->only('edit', 'update', 'destroy');
});

require __DIR__ . '/auth.php';
