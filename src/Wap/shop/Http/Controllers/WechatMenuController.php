<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/22
 * Time: 22:59
 */
namespace Roseinory\LaravelShop\Wap\Shop\Http\Controllers;

use Roseinory\LaravelShop\Wap\Shop\Http\Controllers\Controller;

class WechatMenuController extends  Controller{
    public function index(){
        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.soso.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url"  => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        return app('wechat.official_account')->menu->create($buttons);
    }
}
