<?php

declare(strict_types=1);

namespace Youpks\Support;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use SplFileInfo;

abstract class File
{
    /**
     * Get file from path.
     *
     * @param string $path
     * @return SplFileInfo
     */
    public static function get(string $path): SplFileInfo
    {
        return new SplFileInfo($path);
    }

    /**
     * Get files from directory.
     *
     * @param string $path
     * @return Collection
     */
    public static function collection(string $path): Collection
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
     */
    public static function copy(SplFileInfo $file, string $directory, string $outputFileName = null): void
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
     */
    public static function delete(SplFileInfo $file, string $directory): void
    {
        $path = $directory.'/'.$file->getFilename();

        tap(new Filesystem, static function ($filesystem) use ($path) {
            if ($filesystem->exists($path)) {
                $filesystem->delete($path);
            }
        });
    }
}
