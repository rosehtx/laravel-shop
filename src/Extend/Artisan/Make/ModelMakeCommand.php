<?php

namespace Roseinory\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ModelMakeCommand as Commad;
use Illuminate\Support\Str;

class ModelMakeCommand extends Commad
{
    // trait 方法的优先级大于继承
    use GeneratorCommand;
    protected $path = __DIR__.'/../../../';

    protected $name = 'shop-make:model {name}';

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\\'.$this->getPackageInput().'\Models';
    }

    protected function getPackageInput()
    {
        return trim($this->argument('package'));
    }

    protected function createMigration()
    {
        $path = explode('\Models\\', $this->argument('name'));

        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('package'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('shop-make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path' => $this->getPackageInput()
        ]);
    }

//    public function rootNamespace(){
//        return 'Roseinory\LaravelShop';
//    }

//    protected function getPath($name)
//    {
//        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
//
//        return $this->path.'/'.str_replace('\\', '/', $name).'.php';
//    }
}
