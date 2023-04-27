<?php

declare(strict_types=1);

namespace Youpks\Auth\Builders;

use Symfony\Component\Finder\SplFileInfo;
use Youpks\Support\File;
use Youpks\Support\Path;

class MigrationBuilder extends Builder
{
    protected static function buildMigrations(): void
    {
        File::collection(Path::base('vendor/laravel/ui/stubs/migrations'))->each(static fn (SplFileInfo $file) =>
            File::copy(
                $file,
                Path::database('migrations')
            )
        );
    }
}
