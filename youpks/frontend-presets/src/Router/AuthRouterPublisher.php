<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Router;

use Youpks\FrontendPresets\Traits\FileSupport;
use SplFileInfo;

class AuthRouterPublisher
{
    use FileSupport;

    public static function publish(): void
    {
        self::createAuthRoutesDirectory();
        self::copyAuthRoutesFiles();
        self::createAuthRoutesMainFile();
    }

    private static function createAuthRoutesDirectory(): void
    {
        self::makeDirectory(routes_path('auth'));
    }

    private static function copyAuthRoutesFiles(): void
    {
        self::getFiles(routes_path('auth', self::getStubPath()))->each(static fn (SplFileInfo $file) =>
            self::copyFile(
                $file,
                routes_path('auth')
            )
        );
    }

    private static function createAuthRoutesMainFile(): void
    {
        self::copyFile(
            self::getFile(routes_path('auth.php', self::getStubPath())),
            routes_path()
        );
    }
}
