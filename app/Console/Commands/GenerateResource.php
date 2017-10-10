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
    protected $signature = 'cms:generate {resource : The name of the resource - singular}';

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
        $this->call('make:model', ['name' => $resource]);
        $this->call('make:controller', ['name' => 'Admin/'. $resource . 'Controller']);
        $this->call('make:controller', ['name' => 'Api/DataTables/'. $resource . 'DataTable']);
        $this->call('make:migration', ['name' => 'create_' . $table . '_table']);
        $this->call('make:request', ['name' => 'Admin/' . $resource . 'Request']);
        $this->call('make:form', ['name' => 'Forms/Admin/' . $resource . 'Form']);
        $this->createDirectory($table);
        $this->info('New resource generated successfully');
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
