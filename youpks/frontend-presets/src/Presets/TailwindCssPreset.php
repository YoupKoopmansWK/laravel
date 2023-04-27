<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Youpks\FrontendPresets\Providers\FrontendPresetServiceProvider;
use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;
use Laravel\Ui\Presets\Preset;

class TailwindCssPreset extends Preset
{
    public static function install(bool $authOption = false): void
    {
        Path::setRoot(FrontendPresetServiceProvider::ROOT);
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
        Directory::delete(Path::public('build'));

        File::delete(
            File::get(Path::public('hot')),
            Path::public()
        );

        Directory::make(Path::resource('css'));

        File::copy(
            File::get(Path::stub('resources/css/app.css')),
            Path::resource('css')
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
                Path::base()
            )
        );
    }

    protected static function updateWelcomePage(): void
    {
        File::delete(
            File::get(Path::resource('views/welcome.blade.php')),
            Path::resource()
        );

        File::copy(
            File::get(Path::stub('resources/views/welcome.blade.php')),
            Path::resource('views')
        );
    }

    protected static function scaffoldAuthViews(): void
    {
        Directory::copy(
            Path::stub('resources/views'),
            Path::resource('views')
        );
    }
}
