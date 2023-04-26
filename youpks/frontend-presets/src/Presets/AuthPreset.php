<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Presets;

use Illuminate\Container\Container;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;
use Youpks\FrontendPresets\Router\AuthRouterPublisher;
use Youpks\FrontendPresets\Traits\FileSupport;

class AuthPreset extends Preset
{
    use FileSupport;

    public static function install(bool $authOption = false): void
    {
        static::setStubPath();

        if($authOption) {
            static::scaffoldAuthControllers();
            static::scaffoldHomePageController();
            static::scaffoldHomePageRoute();
            static::scaffoldAuthRoutes();
            static::scaffoldMigrations();
        }
    }

    protected static function scaffoldAuthControllers(): void
    {
        self::makeDirectory(app_path('Http/Controllers/Auth'));

        self::getFiles(base_path('vendor/laravel/ui/stubs/Auth'))->each(static fn (SplFileInfo $file) =>
            self::copyFile(
                $file,
                app_path('Http/Controllers/Auth'),
                Str::replaceLast('.stub', '.php', $file->getFilename())
            )
        );
    }

    protected static function scaffoldHomePageController(): void
    {
        $pageTitle = 'Home';

        self::makeDirectory(app_path('Http/Controllers/Page'));

        file_put_contents(app_path("Http/Controllers/Page/{$pageTitle}PageController.php"), static::compilePageControllerStub($pageTitle));
    }

    protected static function scaffoldHomePageRoute(): void
    {
        file_put_contents(
            routes_path('web.php'),
            "\n\nRoute::get('home', \App\Http\Controllers\Page\HomePageController::class)->name('home');",
            FILE_APPEND
        );
    }

    protected static function scaffoldAuthRoutes(): void
    {
        AuthRouterPublisher::publish(self::getStubPath());

        file_put_contents(
            routes_path('web.php'),
            "\n\nrequire __DIR__.'/auth.php';",
            FILE_APPEND
        );
    }

    protected static function scaffoldMigrations(): void
    {
        self::getFiles(base_path('vendor/laravel/ui/stubs/migrations'))->each(static fn (SplFileInfo $file) =>
            self::copyFile(
                $file,
                database_path('migrations')
            )
        );
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
            file_get_contents(self::getStubPath().'src/Controllers/Page/PageController.stub')
        );
    }
}
