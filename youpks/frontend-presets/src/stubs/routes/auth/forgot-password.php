<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('forgot-password')
    ->name('.password')
    ->controller(PasswordResetLinkController::class)
    ->group(function () {
        Route::get('', 'create')->name('.request');
        Route::post('', 'store')->name('.email');
    });
