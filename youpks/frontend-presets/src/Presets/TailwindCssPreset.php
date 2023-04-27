<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Youpks\Support;

class TailwindCssPreset extends Preset
{
    public static function install(bool $authOption = false): void
    {
        static::setStubPath('tailwind');

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
        Support\Directory::delete(public_path('build'));

        Support\File::delete(
            Support\File::get(public_path('hot')),
            public_path()
        );

        Support\Directory::make(resource_path('css'));

        Support\File::copy(
            Support\File::get(self::getStubPath().'resources/css/app.css'),
            resource_path('css')
        );
    }

    protected static function updateBootstrapping(): void
    {
        collect([
            'tailwind.config.js',
            'postcss.config.js',
            'vite.config.js',
        ])->each(static fn (string $file) => Support\File::copy(
                Support\File::get(self::getStubPath(). ($file)),
                base_path()
            )
        );
    }

    protected static function updateWelcomePage(): void
    {
        Support\File::delete(
            Support\File::get(resource_path('views/welcome.blade.php')),
            resource_path()
        );

        Support\File::copy(
            Support\File::get(self::getStubPath().'resources/views/welcome.blade.php'),
            resource_path('views')
        );
    }

    protected static function scaffoldAuthViews(): void
    {
        Support\Directory::copy(
            self::getStubPath().'resources/views',
            resource_path('views')
        );
    }
}
