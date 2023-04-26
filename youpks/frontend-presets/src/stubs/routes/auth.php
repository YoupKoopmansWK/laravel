<?php

use Illuminate\Support\Facades\Route;

Route::name('auth')
    ->group(function () {
        require __DIR__.'/auth/confirm-password.php';
        require __DIR__.'/auth/forgot-password.php';
        require __DIR__.'/auth/login.php';
        require __DIR__.'/auth/register.php';
        require __DIR__.'/auth/reset-password.php';
    });
