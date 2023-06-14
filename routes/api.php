<?php

use App\Http\Controllers\ShelterCatController;
use App\Http\Controllers\ShelterController;
use Illuminate\Support\Facades\Route;

Route::prefix('shelters')->name('shelters.')->group(function () {

    Route::get('', [ShelterController::class, 'index'])->name('index');
    Route::post('', [ShelterController::class, 'store'])->name('store');

    Route::prefix('{shelter}')->group(function () {

        Route::get('', [ShelterController::class, 'show'])->name('show');
        Route::put('', [ShelterController::class, 'update'])->name('update');
        Route::delete('', [ShelterController::class, 'destroy'])->name('destroy');

    });
});
