<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Traits;

use Youpks\FrontendPresets\Exceptions\FileException;
use Youpks\FrontendPresets\Exceptions\DirectoryException;
use Youpks\FrontendPresets\Providers\FrontendPresetServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use SplFileInfo;

trait FileSupport
{
    public static string $stubPath = '/'.FrontendPresetServiceProvider::FRONTEND_PRESET_STUB_PATH;

    /**
     * Get the suffix path.
     *
     * @param string|null $path
     * @return void
     */
    public function setStubPath(string $path = null): void
    {
        self::$stubPath .= (isset($path) ? '/'.$path.'/' : null);
    }

    public static function getStubPath(): string
    {
        return self::$stubPath;
    }

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
     * @return string
     *
     * @throws FileException
     */
    public static function copyFile(SplFileInfo $file, string $directory): void
    {
        $path = $directory.$file->getFilename();

        if (! (new Filesystem)->exists($path)) {
            copy($file->getRealPath(), $path);
        } else {
            throw new FileException("File already exists: [ $path ]");
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
        $path = $directory.$file->getFilename();

        tap(new Filesystem, static function ($filesystem) use ($path) {
            if ($filesystem->exists($path)) {
                $filesystem->delete($path);
            } else {
                throw new FileException("File not existing: [ $path ]");
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
            } else {
                throw new DirectoryException("Directory already exists: [ $directory ]");
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
            } else {
                throw new DirectoryException("Directory already exists: [ $newPath ]");
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
            } else {
                throw new DirectoryException("Directory not existing: [ $directory ]");
            }
        });
    }
}
