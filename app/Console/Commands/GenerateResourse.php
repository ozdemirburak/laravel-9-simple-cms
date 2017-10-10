<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateResourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simplecms:generate
                            {controllerName : The name of controller - singular},
                            {table? : The name of table - plural}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to generate a new resource';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $table_name = strtolower($this->argument('table') ??
                      Str::snake(Str::plural($this->argument('controllerName'))));
        $form_name = $table_name;
        $form_name[0]=strtoupper($form_name[0]);
        Artisan::call("make:controller" , [ 'name' => "Admin/".$this->argument('controllerName').'Controller']);
        Artisan::call("make:migration" , ['name' => "create_".$table_name."_table"]);
        Artisan::call("make:request" , ['name' => "Admin/".$this->argument('controllerName').'Request']);
        Artisan::call("make:form" , ['name' => "Forms/Admin/".$form_name.'Form']);
        $this->info("New resource generated successfully");
    }
}
