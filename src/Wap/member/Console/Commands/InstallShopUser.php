<?php

namespace Roseinory\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallShopUser extends Command
{
    //命令的名称
    protected $signature = 'wap_member:install {name}';
    //命令的解释
    protected $description = 'wap底下member的安装命令';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        //
//        print_r('测试'.$this->arguments());
        $this->call('migrate');
        $this->call('vendor:publish',[
            '--provider' => 'Roseinory\LaravelShop\Wap\Member\Providers\MemberServiceProvider'
        ]);

    }
}
