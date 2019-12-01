<?php

namespace Roseinory\LaravelShop\Extend\Artisan\Make;

use Illuminate\Routing\Console\ControllerMakeCommand as Command;
use Symfony\Component\Console\Input\InputArgument;


class ControllerMakeCommand extends Command
{
    use GeneratorCommand;

    protected $name = 'shop-make:controller {name}';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\'.$this->getPackageInput().'\Http\Controllers';
    }

    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    protected function getPackageInput()
    {
        return trim($this->argument('package'));
    }
}
