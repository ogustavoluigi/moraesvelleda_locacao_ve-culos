<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;

Route::get('/', [AppController::class, 'index'])->name('index');

Route::group(['prefix' => 'veiculos', 'as' => 'vehicles.', 'controller' => VehicleController::class], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'show')->name('show');
});

Route::group(['prefix' => 'conta', 'middleware' => 'auth'], function () {
    Route::group(['prefix' => 'reservas', 'as' => 'rentals.', 'controller' => RentalController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
    });

    Route::group(['prefix' => 'perfil', 'as' => 'profile.', 'controller' => ProfileController::class], function () {
        Route::get('/editar', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });
});

require __DIR__ . '/auth.php';
