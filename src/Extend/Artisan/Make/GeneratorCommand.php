<?php

namespace Roseinory\LaravelShop\Extend\Artisan\Make;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait GeneratorCommand
{
    protected $packagePath = __DIR__."/../../..";

    protected function rootNamespace()
    {
        return 'Roseinory\LaravelShop';
    }

    protected function getPath($name)
    {
        // 进行命名空间的完善 自动添加前
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return  $this->packagePath.'/'.str_replace('\\', '/', $name).'.php';
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the class'],
            ['package', InputArgument::OPTIONAL, 'The package of the class'],
        ];
    }
}
