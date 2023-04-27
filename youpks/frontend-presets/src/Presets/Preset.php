<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Laravel\Ui\Presets\Preset as UiPreset;
use Youpks\Support;

abstract class Preset extends UiPreset
{
    public static string $stubPath;

    /**
     * Get the suffix path.
     *
     * @param string|null $path
     * @return void
     */
    public static function setStubPath(string $path = null): void
    {
        self::$stubPath = Support\Path::root('stubs/').(isset($path) ? $path.'/' : null);
    }

    public static function getStubPath(): string
    {
        return self::$stubPath;
    }
}
