<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateResourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simplecms:generate
                            {controllerName : The name of controller}
                            {--schema= : Schema of migration}';

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
        $table_name = strtolower($this->argument('controllerName'));
        shell_exec("/usr/bin/php artisan make:controller ".$this->argument('controllerName'));
        if(count($this->option('schema'))!= 0)
            shell_exec("/usr/bin/php artisan make:migration:schema create_".$table_name."s_table --schema=\"".$this->option('schema')."\"");
        else
            shell_exec("/usr/bin/php artisan make:migration create_".$table_name."_table");
        shell_exec("/usr/bin/php artisan make:request ".$this->argument('controllerName'));
        shell_exec("/usr/bin/php artisan make:form Forms/".$this->argument('controllerName'));
        shell_exec("/usr/bin/php artisan migrate");
        $this->info("New resource generated successfully");
    }
}
