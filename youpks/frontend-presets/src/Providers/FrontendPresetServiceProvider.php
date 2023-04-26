<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Providers;

use Illuminate\Support\ServiceProvider;

class FrontendPresetServiceProvider extends ServiceProvider
{
    public const FRONTEND_PRESET_STUB_PATH = __DIR__.'/../stubs';

    public function boot(): void
    {

    }
}
