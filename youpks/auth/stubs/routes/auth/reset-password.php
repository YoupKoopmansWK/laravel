<?php

use Youpks\Auth\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('reset')
    ->controller(ResetPasswordController::class)
    ->group(function () {
        Route::get('{token}', 'showResetForm')->name('.reset');
        Route::post('', 'reset')->name('.update');
    });
