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
                            {controllerName : The name of controller - singular},
                            {tableName : The name of table - plural}';

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
        $table_name = strtolower($this->argument('tableName'));
        $form_name = $this->argument('tableName');
        $form_name[0]=strtoupper($form_name[0]);
        shell_exec("/usr/bin/php artisan make:controller Admin/".$this->argument('controllerName').'Controller');
        shell_exec("/usr/bin/php artisan make:migration create_".$table_name."_table");
        shell_exec("/usr/bin/php artisan make:request Admin/".$this->argument('controllerName').'Request');
        shell_exec("/usr/bin/php artisan make:form Forms/Admin/".$form_name.'Form');
        shell_exec("/usr/bin/php artisan migrate");
        $this->info("New resource generated successfully");
    }
}
