<?php

namespace Tasks;

use Rocketeer\Abstracts\AbstractTask;

class ClearCache extends AbstractTask
{
    /**
     * Description of the Task
     *
     * @var string
     */
    protected $description = 'Clears bulk caches';

    /**
     * Executes the Task
     *
     * @return void
     */
    public function execute()
    {
        $this->explainer->line('Flushing expired password reset tokens, application cache');
        return $this->runForCurrentRelease([
            'php artisan auth:clear-resets',
            'php artisan cache:clear'
        ]);
    }
}