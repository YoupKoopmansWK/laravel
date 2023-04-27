<?php

namespace Youpks\FrontendPresets\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FrontendPreset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youpks:frontend-preset
                            {preset?}
                            {auth?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Frontend preset choice';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $preset = $this->getPreset();
        $auth = $this->getAuth();

        Artisan::call('ui '. $preset .' '. $auth);
    }

    private function getPresetOptions(): array
    {
        return [
            'tailwindcss',
        ];
    }

    private function getPreset(): string
    {
        if($this->argument('preset') === null
            || !in_array($this->argument('preset'),
                $this->getPresetOptions(),
                true)
        ) {
            return $this->choice('Which preset would you like to use?', $this->getPresetOptions(), $this->getPresetOptions()[0]);
        }

        return $this->argument('preset');
    }

    private function getBoolean(string $answer): bool
    {
        if(in_array($answer, $this->getConfirmationOptions(true), true)) {
            return true;
        }

        if(in_array($answer, $this->getConfirmationOptions(false), true)) {
            return false;
        }

        return false;
    }

    private function getConfirmationOptions(bool $boolean): array
    {
        if($boolean) {
            return ['y', 'Y', 'yes', 'Yes'];
        }

        return ['n', 'N', 'no', 'No'];
    }

    private function getAuth(): string
    {
        if($this->argument('auth') === null
            || !in_array($this->argument('auth'),
                array_merge($this->getConfirmationOptions(true), $this->getConfirmationOptions(false))
                , true)
        ) {
            return $this->confirm('Would you like to install authentication scaffolding?', true)
                ? '--auth'
                : '';
        }

        return $this->getBoolean($this->argument('auth'))
            ? '--auth'
            : '';
    }
}
