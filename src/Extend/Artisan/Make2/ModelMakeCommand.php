<?php

namespace ShineYork\LaravelShop\Extend\Artisan\Make;

use Illuminate\Foundation\Console\ModelMakeCommand as Commad;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;


class ModelMakeCommand extends Commad
{

    use GeneratorCommand;

    protected $name = 'shop-make:model';

    protected function createMigration()
    {
        $path = explode('\Models\\', $this->argument('name'));

        $table = Str::snake(Str::pluralStudly(class_basename($path[1])));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('shop-make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path' => $path[0]
        ]);
    }
}
