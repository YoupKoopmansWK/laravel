<?php

declare(strict_types=1);

namespace Youpks\Auth\Builders;

use Youpks\Auth\Providers\AuthServiceProvider;
use Youpks\Support\Path;

class Builder
{
    public static function build(): void
    {
        Path::setRoot(AuthServiceProvider::ROOT);
        Path::setStub();

        ControllerBuilder::buildAuthControllers();

        RouteBuilder::buildAuthRoutes();
        RouteBuilder::buildHomePageRoute();

        MigrationBuilder::buildMigrations();
    }
}
