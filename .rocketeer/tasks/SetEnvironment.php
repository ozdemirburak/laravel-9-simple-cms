<?php

namespace Tasks;

use Rocketeer\Abstracts\AbstractTask;

class SetEnvironment extends AbstractTask
{
    /**
     * Description of the Task
     *
     * @var string
     */
    protected $description = 'Renames production environment file';

    /**
     * Executes the Task
     *
     * @return void
     */
    public function execute()
    {
        $this->explainer->line('Setting environment');
        return $this->runForCurrentRelease([
            'mv .env.production .env'
        ]);
    }
}