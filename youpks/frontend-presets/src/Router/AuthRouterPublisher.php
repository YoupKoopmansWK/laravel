<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Router;

use Youpks\Support;
use SplFileInfo;

class AuthRouterPublisher
{
    public static function publish(string $stubPath): void
    {
        self::createAuthRoutesDirectory();
        self::copyAuthRoutesFiles($stubPath);
        self::createAuthRoutesMainFile($stubPath);
    }

    private static function createAuthRoutesDirectory(): void
    {
        Support\Directory::make(Support\Path::routes('auth'));
    }

    private static function copyAuthRoutesFiles(string $stubPath): void
    {
        Support\File::collection(Support\Path::routes('auth', $stubPath))->each(static fn (SplFileInfo $file) =>
            Support\File::copy(
                    $file,
                    Support\Path::routes('auth')
                )
            );
    }

    private static function createAuthRoutesMainFile(string $stubPath): void
    {
        Support\File::copy(
            Support\File::get(Support\Path::routes('auth.php', $stubPath)),
            Support\Path::routes()
        );
    }
}
