<?php

namespace App\Console\Commands;

use File;
use Illuminate\Console\Command;

class GenerateResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:generate {resource : The name of the resource - singular} {--all : Generate all stuff} {--M|model : Generate model} {--c|controller : Generate controller} {--a|api : Generate API controller} {--m|migration : Generate migration} {--r|request : Generate request} {--f|form : Generate form} {--b|view : Generate views}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate a new resource.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        list($resource, $table) = [$r = ucfirst($this->argument('resource')), snake_case(str_plural($r))];

        $options = collect($this->options())->only([
            'model',
            'migration',
            'controller',
            'api',
            'request',
            'form',
            'view'
        ])->all();

        $generateAllStuff = in_array(true, $options, true) === false;

        if ($generateAllStuff || $this->option('model')) {
            $this->call('make:model', ['name' => $resource]);
        }
        if ($generateAllStuff || $this->option('controller')) {
            $this->call('make:controller', ['name' => 'Admin/'. $resource . 'Controller']);
        }
        if ($generateAllStuff || $this->option('api')) {
            $this->call('make:controller', ['name' => 'Api/DataTables/'. $resource . 'DataTable']);
        }
        if ($generateAllStuff || $this->option('migration')) {
            $this->call('make:migration', ['name' => 'create_' . $table . '_table']);
        }
        if ($generateAllStuff || $this->option('request')) {
            $this->call('make:request', ['name' => 'Admin/' . $resource . 'Request']);
        }
        if ($generateAllStuff || $this->option('form')) {
            $this->call('make:form', ['name' => 'Forms/Admin/' . $resource . 'Form']);
        }
        if ($generateAllStuff || $this->option('view')) {
            $this->createDirectory($table);
            $this->info('Views created successfully.');
        }
        if ($generateAllStuff) {
            $this->info('New resource generated successfully');
        }
    }

    /**
     * @param $table
     */
    private function createDirectory($table)
    {
        File::makeDirectory('resources/views/admin/' . $table);
        collect(['create', 'edit', 'index', 'show'])->each(function ($file) use ($table) {
            $filename = $file . '.blade.php';
            File::copy('resources/stubs/views/admin/' . $filename, 'resources/views/admin/' . $table . '/' . $filename);
        });
    }
}
