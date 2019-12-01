<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/3
 * Time: 15:24
 */

namespace Roseinory\LaravelShop\Wap\Member\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class MemberServiceProvider extends ServiceProvider{

    protected $routeMiddleware = [
        'wechat.oauth' => \Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class,
    ];

    public function register()
    {
        foreach ($this->routeMiddleware as $key => $middleware) {
//          $this->app['router']->aliasMiddleware($key, $middleware);
            app('router')->aliasMiddleware($key, $middleware);
        }
        //自定义加载配置文件
        $this->mergeConfigFrom(__DIR__.'/../Config/Member.php','wap.member');
        //发布配置文件
        $this->registerPublish();
    }

    public function registerPublish(){
        //判断是否命令行中运行
        if($this->app->runningInConsole()){
            //                            [当前组件的配置文件路径 =》这个配置文件的要复制的目录,         文件标识
            //1、不填就是默认地址config_path的路径  发布配置文件名不会改变
            //2、不带后缀就是一个文件夹 rose-wechat 文件夹
            //3、如果带后缀就是一个文件 rose-wechat.php文件
            $this->publishes([__DIR__.'/../Config/Member.php' => config_path('rose-wechat.php')], 'rose-laravel-wechat');
            //执行发布配置 php artisan vendor:publish --provider="Roseinory\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        }
    }

    protected function loadMemberAuthConfig(){
        config(Arr::dot(config('wap.member.auth',[]),'auth.'));
        //重写easywechat配置，让用户生成自己组件的配置文件
        config(Arr::dot(config('wap.member.wechat',[]),'wechat.'));
    }

    public function loadMigrations()
    {
        //判断是否命令行中运行
        if($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations/2019_08_10_084752_create_shop_user_table.php');
        }
    }

    public function boot()
    {
        //
        $this->registerRoutes();

        $this->loadMemberAuthConfig();

        $this->loadMigrations();

        //给系统注册命令
        $this->commands([
                            \Roseinory\LaravelShop\Wap\Member\Console\Commands\InstallShopUser::class,
                        ]);

//        $this->loadViewsFrom(
//            __DIR__.'/../../resources/views', 'junit'
//        );
    }

    private function routeConfiguration()
    {
        return [
            'namespace'  => 'Roseinory\LaravelShop\Wap\Member\Http\Controller',
            'prefix'     => 'wap/member',
            'middleware' => 'web',
        ];
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/route.php');
        });
    }
}