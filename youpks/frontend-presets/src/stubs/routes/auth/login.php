<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthenticatedSessionController::class)
    ->group(function () {
        Route::middleware('guest')
            ->prefix('login')
            ->group(function () {
                Route::get('', 'create')->name('.login');
                Route::post('', 'store');
            });

        Route::post('logout', 'destroy')->name('.logout');
    });
