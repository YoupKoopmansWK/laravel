<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Traits;

use Youpks\FrontendPresets\Exceptions\FileException;
use Youpks\FrontendPresets\Exceptions\DirectoryException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use SplFileInfo;

trait FileSupport
{
    /**
     * Get file from path.
     *
     * @param string $path
     * @return SplFileInfo
     */
    public static function getFile(string $path): SplFileInfo
    {
        return new SplFileInfo($path);
    }

    /**
     * Get files from directory.
     *
     * @param string $path
     * @return Collection
     */
    public static function getFiles(string $path): Collection
    {
        return collect((new Filesystem)->files($path));
    }

    /**
     * Copy file to directory.
     *
     * @param SplFileInfo $file
     * @param string $directory
     * @param string|null $outputFileName
     * @return void
     *
     */
    public static function copyFile(SplFileInfo $file, string $directory, string $outputFileName = null): void
    {
        $fileName = $outputFileName ?? $file->getFilename();
        $path = "$directory/$fileName";

        if (! (new Filesystem)->exists($path)) {
            copy($file->getPathname(), $path);
        }
    }

    /**
     * Copy file to directory.
     *
     * @param SplFileInfo $file
     * @param string $directory
     * @return void
     *
     * @throws FileException
     */
    public static function deleteFile(SplFileInfo $file, string $directory): void
    {
        $path = $directory.'/'.$file->getFilename();

        tap(new Filesystem, static function ($filesystem) use ($path) {
            if ($filesystem->exists($path)) {
                $filesystem->delete($path);
            }
        });
    }

    /**
     * Make directory if not exists.
     *
     * @param string $directory
     * @return void
     *
     * @throws DirectoryException
     */
    public static function makeDirectory(string $directory): void
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
     *
     * @throws DirectoryException
     */
    public static function copyDirectory(string $oldPath, string $newPath): void
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
     *
     * @throws DirectoryException
     */
    public static function deleteDirectory(string $directory): void
    {
        tap(new Filesystem, static function ($filesystem) use ($directory) {
            if ($filesystem->isDirectory($directory)) {
                $filesystem->deleteDirectory($directory);
            }
        });
    }
}
