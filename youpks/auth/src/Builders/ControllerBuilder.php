<?php

declare(strict_types=1);

namespace Youpks\Auth\Builders;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;
use Youpks\FrontendPresets\Router\AuthRouterPublisher;
use Youpks\Support\Directory;
use Youpks\Support\File;
use Youpks\Support\Path;
use Laravel\Ui\Presets\Preset;

class ControllerBuilder extends Builder
{
    protected static function buildAuthControllers(): void
    {
        Directory::make(Path::controller('Auth'));

        File::collection(Path::stub('src/Controllers/Auth'))->each(static fn (SplFileInfo $file) =>
            File::copy(
                $file,
                Path::controller('Auth'),
                Str::replaceLast('.stub', '.php', $file->getFilename())
            )
        );
    }

    protected static function buildHomePageController(): void
    {
        $pageTitle = 'Home';

        Directory::make(Path::controller('Page'));

        file_put_contents(Path::controller("Page/{$pageTitle}PageController.php"), static::compilePageControllerStub($pageTitle));
    }

    protected static function compilePageControllerStub(string $title): array|false|string
    {
        return str_replace(
            [
                '{{namespace}}',
                '{{title}}',
                '{{PascalCaseTitle}}',
                '{{kebab-case-title}}',
            ],
            [
                Container::getInstance()->getNamespace(),
                $title,
                Str::ucfirst(Str::camel($title)),
                Str::kebab($title),
            ],
            file_get_contents(Path::stub('src/Controllers/Page/PageController.stub'))
        );
    }
}
