<?php

declare(strict_types=1);

namespace Youpks\Support;

abstract class Path
{
    public static string $rootPath;

    public static string $stubPath;

    /**
     * Get the root path of the package.
     *
     * @param string|null $path
     * @return void
     */
    public static function setRoot(string $path = null): void
    {
        self::$rootPath = self::vendor($path);
    }

    /**
     * Get the root path of the package.
     *
     * @param string|null $path
     * @return string
     */
    public static function root(string $path = null): string
    {
        return self::$rootPath.(isset($path) ? '/'.$path : null);
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
            : self::base("routes/$directory");
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

    /**
     * Get the base path.
     *
     * @param string|null $path
     * @return string
     */
    public static function base(string $path = null): string
    {
        return app()->basePath($path);
    }

    /**
     * Get the app path.
     *
     * @param string|null $path
     * @return string
     */
    public static function app(string $path = null): string
    {
        return app()->path($path);
    }

    /**
     * Get the public path.
     *
     * @param string|null $path
     * @return string
     */
    public static function public(string $path = null): string
    {
        return app()->publicPath($path);
    }

    /**
     * Get the resource path.
     *
     * @param string|null $path
     * @return string
     */
    public static function resource(string $path = null): string
    {
        return app()->resourcePath($path);
    }

    /**
     * Get the database path.
     *
     * @param string|null $path
     * @return string
     */
    public static function database(string $path = null): string
    {
        return app()->databasePath($path);
    }

    /**
     * Get the vendor path.
     *
     * @param string|null $path
     * @return string
     */
    public static function vendor(string $path = null): string
    {
        return app()->basePath("vendor/$path");
    }

    /**
     * Get the vendor Controllers path.
     *
     * @param string|null $path
     * @return string
     */
    public static function controller(string $path = null): string
    {
        return self::root("src/Controllers/$path");
    }
}
