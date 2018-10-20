<?php

namespace App\Console\Commands\Cms;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:initialize {--seed} {--npm}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the CMS.';

    /**
     * @var bool
     */
    protected $continue = true;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Initializing application.');
        if (!file_exists(base_path('.env'))) {
            $this->askEnvConfiguration();
        }
        $this->continue === true ? $this->setup() : $this->revert();
    }

    /**
     * Rename .env.example to .env, ask for configuration
     */
    private function askEnvConfiguration(): void
    {
        $this->runProcess(['mv', '.env.example', '.env']);
        $this->call('key:generate');
        $this->continue = $this->confirm('Create database and configure your .env file, then hit Y to continue.');
    }

    /**
     * Setup the application
     */
    private function setup(): void
    {
        $this->migrateAndSeed();
        if ($this->option('npm')) {
            $this->npm();
        }
        $this->info('Done with initializing application.');
    }

    /**
     * Migrate and seed, clear the cache also
     */
    private function migrateAndSeed(): void
    {
        $this->call('migrate:refresh');
        if ($this->option('seed')) {
            $this->call('db:seed');
        }
        $this->call('cache:clear');
    }

    /**
     * Run npm update or install then generate assets
     */
    private function npm(): void
    {
        $command = is_dir(base_path('node_modules')) ? 'update' : 'install';
        $this->info('Running npm ' . $command);
        $this->runProcess(['npm', $command]);
        $this->info('Creating assets');
        $this->runProcess(['npm', 'run', 'production']);
    }

    /**
     * Rename file back
     */
    private function revert(): void
    {
        $this->runProcess(['mv', '.env', '.env.example']);
        $this->warn('Aborting, installation failure');
    }

    /**
     * @param $arguments
     *
     * @return int
     */
    private function runProcess($arguments): int
    {
        $process = new Process($arguments);
        $process->setTimeout(600); // 10 minutes
        return $process->run(function ($type, $buffer) {
            $this->warn('> '.$buffer);
        });
    }
}
