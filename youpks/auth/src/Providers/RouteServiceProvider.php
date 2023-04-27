<?php

namespace Youpks\Auth\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Youpks\Support\Path;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        Path::setRoot(AuthServiceProvider::ROOT);

        $this->routes(function () {
            Route::middleware('web')
                ->group(Path::root('routes/routes.php'));
        });
    }
}
