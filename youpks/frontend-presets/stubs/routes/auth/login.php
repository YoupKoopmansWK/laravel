<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)
    ->group(function () {
        Route::prefix('login')
            ->group(function () {
                Route::get('', 'showLoginForm')->name('.login');
                Route::post('', 'login');
            });

        Route::post('logout', 'logout')->name('.logout');
    });
