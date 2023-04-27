<?php

use Youpks\Auth\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('register')
    ->controller(RegisterController::class)
    ->group(function () {
        Route::get('', 'showRegistrationForm')->name('.register');
        Route::post('', 'register');
    });
