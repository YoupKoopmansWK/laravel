<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FrontendPreset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'youpks:frontend-preset';

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
        $preset = $this->choice('Which preset would you like to use?', $this->getPresets(), $this->getPresets()[0]);
        $auth = $this->confirm('Would you like to install authentication scaffolding?', true);

        $this->call('ui', [
            'type' => $preset,
            $auth ? '--auth' : '',
        ]);
    }

    private function getPresets(): array
    {
        return [
            'tailwindcss',
        ];
    }
}
