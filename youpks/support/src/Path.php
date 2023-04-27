<?php

declare(strict_types=1);

namespace Youpks\Support;

abstract class Path
{
    /**
     * Get the root path of the package.
     *
     * @param string|null $directory
     * @return string
     */
    public static function root(string $directory = null): string
    {
        return base_path('vendor/youpks/frontend-presets/').$directory ?? '';
    }

    /**
     * Get the path to the routes directory.
     *
     * @param string $directory
     * @param string|null $stubPath
     * @return string
     */
    public static function routes(string $directory = '', string $stubPath = null): string
    {
        return isset($stubPath)
            ? "$stubPath/routes/$directory"
            : app()->basePath("routes/$directory");
    }
}