<?php

namespace Roseinory\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;

use  Roseinory\LaravelShop\Data\Goods\Observers\CategoryObserver;
use  Roseinory\LaravelShop\Data\Goods\Models\Category;

class GoodsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'data.goods'
        );
        $this->loadMigrations();
    }

    public function loadMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

    public function boot()
    {
        Category::observe(CategoryObserver::class);
        $this->loadGoodsConfig();
    }
    public function loadGoodsConfig()
    {
        // 根据默认连接的信息去database.php配置分属于goods组件的连接信息
        //(就是在database.php复制一份mysql配置到goods的键值下面)
        config(
            Arr::dot(
                config('database.connections.'.config('data.goods.database.connection.type'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
        // 在把goods组件的单独信息 放到 database中的goods连接的信息
        config(
            Arr::dot(
                config('data.goods.database.'.config('data.goods.database.connection.name'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
    }
}
