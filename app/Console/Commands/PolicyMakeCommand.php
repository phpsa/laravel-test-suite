<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand as Command;

class PolicyMakeCommand extends Command
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Models\Policies";
    }

    protected function replaceModel($stub, $model)
    {
        $model = 'Models/' . $model;
        return parent::replaceModel($stub, $model);
    }
}
