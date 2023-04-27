<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;
use Laravel\Ui\Presets\Preset;

class TailwindCssPreset extends Preset
{
    public static function install(bool $authOption = false): void
    {
        Path::setStub('tailwind');

        static::updateStyles();
        static::updateBootstrapping();
        static::updateWelcomePage();

        if($authOption) {
            static::scaffoldAuthViews();
        }

        static::removeNodeModules();
    }

    protected static function updateStyles(): void
    {
        Directory::delete(public_path('build'));

        File::delete(
            File::get(public_path('hot')),
            public_path()
        );

        Directory::make(resource_path('css'));

        File::copy(
            File::get(Path::stub('resources/css/app.css')),
            resource_path('css')
        );
    }

    protected static function updateBootstrapping(): void
    {
        collect([
            'tailwind.config.js',
            'postcss.config.js',
            'vite.config.js',
        ])->each(static fn (string $file) => File::copy(
                File::get(Path::stub($file)),
                base_path()
            )
        );
    }

    protected static function updateWelcomePage(): void
    {
        File::delete(
            File::get(resource_path('views/welcome.blade.php')),
            resource_path()
        );

        File::copy(
            File::get(Path::stub('resources/views/welcome.blade.php')),
            resource_path('views')
        );
    }

    protected static function scaffoldAuthViews(): void
    {
        Directory::copy(
            Path::stub('resources/views'),
            resource_path('views')
        );
    }
}
