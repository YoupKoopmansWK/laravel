<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Router;

use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;
use SplFileInfo;

class AuthRouterPublisher
{
    public static function publish(): void
    {
        Path::setStub();

        self::createAuthRoutesDirectory();
        self::copyAuthRoutesFiles();
        self::createAuthRoutesMainFile();
    }

    private static function createAuthRoutesDirectory(): void
    {
        Directory::make(Path::routes('auth'));
    }

    private static function copyAuthRoutesFiles(): void
    {
        File::collection(Path::routes('auth', Path::stub()))->each(static fn (SplFileInfo $file) =>
            File::copy(
                    $file,
                    Path::routes('auth')
                )
            );
    }

    private static function createAuthRoutesMainFile(): void
    {
        File::copy(
            File::get(Path::routes('auth.php', Path::stub())),
            Path::routes()
        );
    }
}
