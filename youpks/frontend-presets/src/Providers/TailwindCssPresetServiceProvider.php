<?php

declare(strict_types=1);

namespace Youpks\FrontendPresets\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Youpks\Auth\Builders\Builder;
use Youpks\FrontendPresets\Presets\AuthPreset;
use Youpks\FrontendPresets\Presets\TailwindCssPreset;

class TailwindCssPresetServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        UiCommand::macro('tailwindcss', static function ($command) {
            TailwindCssPreset::install($command->option('auth'));

            $command->info('Tailwind CSS scaffolding installed successfully.');

            Builder::build();
//            AuthPreset::install($command->option('auth'));

            if ($command->option('auth')) {
                $command->info('Tailwind CSS auth scaffolding installed successfully.');
            }

            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
