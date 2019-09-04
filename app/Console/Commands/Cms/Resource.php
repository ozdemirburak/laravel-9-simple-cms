<?php

namespace App\Console\Commands\Cms;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Resource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:resource {name : The name of the resource - singular} {--migrate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new resource in CMS, creates all the admin files needed and organizes routes.';

    /**
     * Resource title case
     *
     * @var string
     */
    private $rtc;

    /**
     * Resource snake case
     *
     * @var string
     */
    private $rsc;

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        [$this->rtc, $this->rsc] = [ucfirst($this->argument('name')), Str::snake($this->argument('name'))];
        $this->generateMigration();
        $this->generateModel();
        $this->generateDatatable();
        $this->generateController();
        $this->generateForm();
        $this->appendToAdminRouteFile();
        $this->appendToLanguageFile();
        $this->addToRouteServiceProvider();
        $this->addToNav();
        $this->migrate();
        $this->warn('New resource generated successfully');
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateMigration(): void
    {
        [$rscp, $now] = [Str::plural($this->rsc), now()];
        $result = File::put(
            $f = 'database/migrations/' . $now->format('Y_m_d') . '_000000_create_' . $rscp . '_table.php',
            $this->replaceStub('migration')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateDatatable(): void
    {
        $result = File::put(
            $f = 'app/Http/Controllers/Admin/DataTables/' . $this->rtc . 'DataTable.php',
            $this->replaceStub('DataTable')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateController(): void
    {
        $result = File::put(
            $f = 'app/Http/Controllers/Admin/' . $this->rtc . 'Controller.php',
            $this->replaceStub('Controller')
        );
        $this->printMessage($result, $f);
    }

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function generateModel(): void
    {
        $result = File::put(
            $f = 'app/Models/' . $this->rtc . '.php',
            $this->replaceStub('Model')
        );
        $this->printMessage($result, $f);
    }

    /**
     * Generate form
     */
    private function generateForm(): void
    {
        $result = File::copy(
            storage_path('stubs/form'),
            $f = 'resources/views/admin/forms/' . $this->rsc . '.blade.php'
        );
        $this->printMessage($result, $f);
    }

    /**
     * Append route
     */
    private function appendToAdminRouteFile(): void
    {
        $result = File::put(
            $f = 'routes/admin.php',
            trim(File::get($f)) . PHP_EOL . $this->replaceStub('route')
        );
        $this->printMessage($result, $f, 'Added route to:', 'Could not add route to', $f);
    }

    /**
     * Append route
     */
    private function appendToLanguageFile(): void
    {
        $result = File::put(
            $f = 'resources/lang/' . config('app.locale') . '/resources.php',
            trim(str_replace($char = '];' . PHP_EOL, '', File::get($f)), "\t\n\r,") .
            $this->replaceStub('language') . $char
        );
        $this->printMessage($result, $f, 'Added resource language key to:', 'Could not add language key to', $f);
    }

    /**
     * Append route parameters to RouteServiceProvider
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function addToRouteServiceProvider(): void
    {
        $space = '        '; // this is for alignment, see the RouteServiceProvider file for this
        $result = File::put(
            $f = 'app/Providers/RouteServiceProvider.php',
            str_replace(
                [
                    $m = $space . '/** GENERATOR_MODEL_BINDER **/',
                    $p = $space . '/** GENERATOR_PARAMETER_BINDER **/'
                ],
                [
                    rtrim($this->replaceStub('RSPModel')) . PHP_EOL . $m,
                    rtrim($this->replaceStub('RSPParameter')) . PHP_EOL . $p
                ],
                File::get($f)
            )
        );
        $this->printMessage($result, $f, 'Added model binding to:', 'Could not add model binding to', $f);
    }

    /**
     * Append the resource to nav.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function addToNav()
    {
        $tabs = "\t\t\t\t"; // this is for alignment
        $result = File::put(
            $f = 'resources/views/partials/admin/nav.blade.php',
            str_replace(
                $n = '<!--NAVIGATION_FLAG-->',
                rtrim($this->replaceStub('nav')) . PHP_EOL . $tabs . $n,
                $tabs . File::get($f)
            )
        );
        $this->printMessage($result, $f, 'Added model binding to:', 'Could not add model binding to', $f);
    }

    /**
     * @param        $result
     * @param        $filePath
     * @param string $sm => Success Message
     * @param string $wm => Warning Message
     */
    private function printMessage($result, $filePath, $sm = 'Created file:', $wm = 'Failed to create file:'): void
    {
        $result ? $this->info($sm . ' ' . $filePath) : $this->warn($wm . ' ' . $filePath);
    }

    /**
     * @param string $stub
     *
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function replaceStub($stub)
    {
        return str_replace(
            ['{{MODEL_NAME}}', '{{MODEL_NAME_SNAKECASE}}', '{{MODEL_NAME_PLURAL}}', '{{MODEL_NAME_PLURAL_LOWERCASE}}'],
            [$this->rtc, $this->rsc, $rtcp = Str::plural($this->rtc), Str::plural($this->rsc)],
            File::get(storage_path('stubs/' . $stub))
        );
    }

    /**
     * Migrate the database file
     */
    private function migrate()
    {
        if ($this->option('migrate')) {
            $this->info('Migrating the newly created resource.');
            $this->call('migrate');
        }
    }
}
