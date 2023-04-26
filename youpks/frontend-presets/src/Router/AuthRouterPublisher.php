<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Router;

use Youpks\FrontendPresets\Traits\FileSupport;
use SplFileInfo;

class AuthRouterPublisher
{
    use FileSupport;

    public static function publish(string $stubPath): void
    {
        self::createAuthRoutesDirectory();
        self::copyAuthRoutesFiles($stubPath);
        self::createAuthRoutesMainFile($stubPath);
    }

    private static function createAuthRoutesDirectory(): void
    {
        self::makeDirectory(routes_path('auth'));
    }

    private static function copyAuthRoutesFiles(string $stubPath): void
    {
        self::getFiles(routes_path('auth', $stubPath))->each(static fn (SplFileInfo $file) =>
            self::copyFile(
                $file,
                routes_path('auth')
            )
        );
    }

    private static function createAuthRoutesMainFile(string $stubPath): void
    {
        self::copyFile(
            self::getFile(routes_path('auth.php', $stubPath)),
            routes_path()
        );
    }
}
