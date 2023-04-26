<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')
    ->prefix('register')
    ->name('.register')
    ->controller(RegisteredUserController::class)
    ->group(function () {
        Route::get('', 'create');
        Route::post('', 'store');
    });
