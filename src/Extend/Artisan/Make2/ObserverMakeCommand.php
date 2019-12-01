<?php

namespace ShineYork\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ObserverMakeCommand as Commad;

class ObserverMakeCommand extends Commad
{
    use GeneratorCommand;

    protected $name = 'make:observer';
}
