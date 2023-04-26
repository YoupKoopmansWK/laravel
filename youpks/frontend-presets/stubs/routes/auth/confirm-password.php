<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('confirm')
    ->controller(ConfirmPasswordController::class)
    ->group(function () {
        Route::get('', 'showConfirmForm')->name('.confirm');
        Route::post('', 'confirm');
    });
