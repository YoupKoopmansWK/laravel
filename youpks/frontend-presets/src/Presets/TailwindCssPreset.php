<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Illuminate\Support\Arr;
use Laravel\Ui\Presets\Preset;
use Youpks\FrontendPresets\Traits\FileSupport;

class TailwindCssPreset extends Preset
{
    use FileSupport;

    private static bool $authOption;

    public function __construct()
    {
        $this->setStubPath('tailwind/');
    }

    public static function install(bool $authOption = false): void
    {
        static::setAuthOption($authOption);

        static::updatePackages();
        static::updateStyles();
        static::updateBootstrapping();
        static::updateWelcomePage();

        if(self::$authOption) {
            static::scaffoldAuthViews();
        }

        static::removeNodeModules();
    }

    private static function setAuthOption(bool $authOption): void
    {
        self::$authOption = $authOption;
    }

    protected static function updatePackageArray(array $packages): array
    {
        return array_merge([
            'postcss' => '^8.4.23',
            'tailwindcss' => '^3.3.2',
        ], Arr::except($packages, [
            'bootstrap',
            'bootstrap-sass',
            'popper.js',
            'laravel-mix',
            'jquery',
        ]));
    }

    protected static function updateStyles(): void
    {
        self::deleteDirectory(public_path('build'));

        self::deleteFile(self::getFile(public_path('hot')), public_path());

        self::makeDirectory(resource_path('css'));

        self::copyFile(
            self::getFile(self::getStubPath().'resources/css/app.css'),
            resource_path('css/app.css')
        );
    }

    protected static function updateBootstrapping(): void
    {
        collect([
            'tailwind.config.js',
            'postcss.config.js',
            'vite.config.js',
        ])->each(static fn (string $file) =>
            self::copyFile(
                self::getFile(self::getStubPath(). ($file)),
                base_path($file)
            )
        );
    }

    protected static function updateWelcomePage(): void
    {
        self::deleteFile(
            self::getFile(resource_path('views/welcome.blade.php')),
            resource_path()
        );

        self::copyFile(
            self::getFile(self::getStubPath().'resources/views/welcome.blade.php'),
            resource_path('views/welcome.blade.php')
        );
    }

    protected static function scaffoldAuthViews(): void
    {
        self::copyDirectory(
            self::getStubPath().'resources/views',
            resource_path('views')
        );
    }
}
