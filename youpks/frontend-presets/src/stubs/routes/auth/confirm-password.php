<?php

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('confirm-password')
    ->controller(ConfirmablePasswordController::class)
    ->group(function () {
        Route::get('', 'show')->name('.password.confirm');
        Route::post('', 'store');
    });
