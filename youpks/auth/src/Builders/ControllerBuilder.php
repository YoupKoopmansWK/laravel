<?php

declare(strict_types=1);

namespace Youpks\Auth\Builders;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;
use Youpks\FrontendPresets\Router\AuthRouterPublisher;
use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;
use Laravel\Ui\Presets\Preset;

class ControllerBuilder extends Builder
{
    protected static function buildAuthControllers(): void
    {
        Directory::make(Path::controller('Auth'));

        File::collection(Path::stub('src/Controllers/Auth'))->each(static fn (SplFileInfo $file) =>
            File::copy(
                $file,
                Path::controller('Auth'),
                Str::replaceLast('.stub', '.php', $file->getFilename())
            )
        );
    }
}
