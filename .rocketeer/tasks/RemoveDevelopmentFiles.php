<?php

namespace Tasks;

use Rocketeer\Abstracts\AbstractTask;

class RemoveDevelopmentFiles extends AbstractTask
{
    /**
     * Description of the Task
     *
     * @var string
     */
    protected $description = 'Removes the files after deployment';

    /**
     * Executes the Task
     *
     * @return void
     */
    public function execute()
    {
        $this->explainer->line('Removing development files');
        return $this->runForCurrentRelease([
            'rm artisan',
            'rm bower.json',
            'rm composer*',
            'rm gulpfile.js',
            'rm LICENSE',
            'rm package.json',
            'rm phpunit.xml',
            'rm README.md',
            'rm server.php'
        ]);
    }
}