<?php

use App\Http\Controllers\ShelterCatController;
use App\Http\Controllers\ShelterController;
use App\Http\Controllers\ShelterEmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('shelters')->name('shelters.')->group(function () {

    Route::get('', [ShelterController::class, 'index'])->name('index');
    Route::post('', [ShelterController::class, 'store'])->name('store');

    Route::prefix('{shelter}')->group(function () {

        Route::get('', [ShelterController::class, 'show'])->name('show');
        Route::put('', [ShelterController::class, 'update'])->name('update');
        Route::delete('', [ShelterController::class, 'destroy'])->name('destroy');

        Route::prefix('cats')->name('cats.')->group(function () {

            Route::get('', [ShelterCatController::class, 'index'])->name('index');
            Route::post('', [ShelterCatController::class, 'store'])->name('store');

            Route::get('{cat}', [ShelterCatController::class, 'show'])->name('show')->scopeBindings();
            Route::put('{cat}', [ShelterCatController::class, 'update'])->name('update');

            Route::delete('{cat}', [ShelterCatController::class, 'destroy'])->name('destroy')->scopeBindings();

        });

        Route::prefix('employees')->name('employees.')->group(function () {

            Route::get('', [ShelterEmployeeController::class, 'index'])->name('index');
            Route::post('', [ShelterEmployeeController::class, 'store'])->name('store');

            Route::get('{cat}', [ShelterEmployeeController::class, 'show'])->name('show')->scopeBindings();
            Route::put('{cat}', [ShelterEmployeeController::class, 'update'])->name('update');

            Route::delete('{cat}', [ShelterEmployeeController::class, 'destroy'])->name('destroy')->scopeBindings();

        });

    });
});
