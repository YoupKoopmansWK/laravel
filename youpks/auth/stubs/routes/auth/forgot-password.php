<?php

use Youpks\Auth\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->controller(ForgotPasswordController::class)
    ->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('.request');
        Route::post('email', 'sendResetLinkEmail')->name('.email');
    });
