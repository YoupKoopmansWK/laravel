<?php

use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('reset-password')
    ->name('.password')
    ->controller(NewPasswordController::class)
    ->group(function () {
        Route::get('{token}', 'create')->name('.reset');
        Route::post('', 'store')->name('.update');
    });
