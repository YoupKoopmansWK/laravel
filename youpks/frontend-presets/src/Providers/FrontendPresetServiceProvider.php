<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Providers;

use Illuminate\Support\ServiceProvider;
use Youpks\FrontendPresets\Console\Commands\FrontendPreset;

class FrontendPresetServiceProvider extends ServiceProvider
{
    public const ROOT = 'youpks/frontend-presets';
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FrontendPreset::class,
            ]);
        }
    }
    public function boot(): void
    {
    }
}
