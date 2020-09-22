<?php

namespace xqus\LaravelFuzz\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fuzz:publish {--force : Overwrite any existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Laravel Fuzz resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'fuzz-config',
            '--force' => $this->option('force'),
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'fuzz-migrations',
            '--force' => $this->option('force'),
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'fuzz-assets',
            '--force' => true,
        ]);
    }
}
