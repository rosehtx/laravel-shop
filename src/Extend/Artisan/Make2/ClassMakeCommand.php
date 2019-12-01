<?php

namespace ShineYork\LaravelShop\Extend\Artisan\Make;

use Illuminate\Console\GeneratorCommand as Commad;

class ClassMakeCommand extends Commad
{
    use GeneratorCommand;

    protected $signature = 'shop-make:class {name}';

    protected $description = '为laravel-shop快速创建一个类';

    protected $type = 'Class';

    protected function getStub()
    {
        return __DIR__.'/stubs/class.stub';
    }
}
