<?php

declare(strict_types=1);

namespace Youpks\Support;

use Illuminate\Filesystem\Filesystem;

abstract class Directory
{
    /**
     * Make directory if not exists.
     *
     * @param string $directory
     * @return void
     */
    public static function make(string $directory): void
    {
        tap(new Filesystem, static function ($filesystem) use ($directory) {
            if (! $filesystem->isDirectory($directory)) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });
    }

    /**
     * Copy directory if exists.
     *
     * @param string $oldPath
     * @param string $newPath
     * @return void
     */
    public static function copy(string $oldPath, string $newPath): void
    {
        tap(new Filesystem, static function ($filesystem) use ($oldPath, $newPath) {
            if ($filesystem->isDirectory($oldPath)) {
                $filesystem->copyDirectory($oldPath, $newPath);
            }
        });
    }

    /**
     * Delete directory if exists.
     *
     * @param string $directory
     * @return void
     */
    public static function delete(string $directory): void
    {
        tap(new Filesystem, static function ($filesystem) use ($directory) {
            if ($filesystem->isDirectory($directory)) {
                $filesystem->deleteDirectory($directory);
            }
        });
    }
}
