<?php

declare(strict_types=1);

namespace Youpks\Support;

abstract class Path
{
    public static string $stubPath;

    /**
     * Get the root path of the package.
     *
     * @param string|null $directory
     * @return string
     */
    public static function root(string $directory = null): string
    {
        return app()->basePath('vendor/youpks/frontend-presets/').$directory ?? '';
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

    /**
     * Get the path to the routes directory.
     *
     * @param string|null $path
     * @return void
     */
    public static function setStub(string $path = null): void
    {
        self::$stubPath = self::root('stubs/').(isset($path) ? $path.'/' : null);
    }

    public static function stub(string $path = null): string
    {
        return self::$stubPath.(isset($path) ? '/'.$path : null);
    }
}
