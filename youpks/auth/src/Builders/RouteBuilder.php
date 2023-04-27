<?php

declare(strict_types=1);

namespace Youpks\Auth\Builders;

use Symfony\Component\Finder\SplFileInfo;
use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;

class RouteBuilder extends Builder
{
    protected static function buildAuthRoutes(): void
    {
        self::createAuthRoutesDirectory();
        self::copyAuthRoutesFiles();
        self::createAuthRoutesMainFile();

        file_put_contents(
            Path::root('routes/routes.php'),
            "\n\nrequire __DIR__.'/auth.php';",
            FILE_APPEND
        );
    }

    private static function createAuthRoutesDirectory(): void
    {
        Directory::make(Path::root('routes/auth'));
    }

    private static function copyAuthRoutesFiles(): void
    {
        File::collection(Path::routes('auth', Path::stub()))->each(static fn (SplFileInfo $file) =>
            File::copy(
                $file,
                Path::root('routes/auth')
            )
        );
    }

    private static function createAuthRoutesMainFile(): void
    {
        File::copy(
            File::get(Path::routes('auth.php', Path::stub())),
            Path::root('routes')
        );
    }
}
