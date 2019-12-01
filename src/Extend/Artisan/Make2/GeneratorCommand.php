<?php
namespace ShineYork\LaravelShop\Extend\Artisan\Make;

use Illuminate\Support\Str;

trait GeneratorCommand{

    protected $packagePath = __DIR__.'/../../..';

    protected $namespace = "ShineYork\\LaravelShop";

    protected function rootNamespace()
    {
        return $this->namespace;
    }

    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->packagePath.str_replace('\\', '/', $name).'.php';
    }
}
