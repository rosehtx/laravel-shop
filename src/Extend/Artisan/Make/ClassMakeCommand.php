<?php

namespace  Roseinory\LaravelShop\Extend\Artisan\Make;

use Illuminate\Console\GeneratorCommand as Command;
use Illuminate\Support\Str;

class ClassMakeCommand extends Command
{
    use GeneratorCommand;

    protected $signature = 'shop-make:class {name}';

    protected $description = '这是给laravel-shop创建类的';

    protected $type = 'Class';

    protected $path = __DIR__.'/../../../';

    protected function getStub(){
        return __DIR__.'/stubs/Class.stub';
    }

    public function rootNamespace(){
        return 'Roseinory\LaravelShop';
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->path.'/'.str_replace('\\', '/', $name).'.php';
    }



}
