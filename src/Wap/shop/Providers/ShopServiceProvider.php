<?php

namespace Roseinory\LaravelShop\Wap\Shop\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        //发布样式文件
        $this->registerPublish();
    }

    public function registerPublish(){
        //判断是否命令行中运行
        if($this->app->runningInConsole()){
            //                            [当前组件的配置文件路径 =》这个配置文件的要复制的目录,         文件标识
            //1、不填就是默认地址config_path的路径  发布配置文件名不会改变
            //2、不带后缀就是一个文件夹 rose-wechat 文件夹
            //3、如果带后缀就是一个文件 rose-wechat.php文件
            $this->publishes([__DIR__.'/../Resources/assets' => public_path('vendor/wap/shop/assets')], 'rose-wap-shop-assets');
            //执行发布配置 php artisan vendor:publish --provider="Roseinory\LaravelShop\Wap\Shop\Providers\ShopServiceProvider"
        }
    }

    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../Resources/views','wap.shop');
    }
    private function routeConfiguration()
    {
        return [
            'namespace'  => 'Roseinory\LaravelShop\Wap\Shop\Http\Controllers',
            'prefix'     => 'wap/shop',
            'middleware' => 'web',
        ];
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
            $this->loadRoutesFrom(__DIR__.'/../Routes/shop.php');
        });
    }
}
