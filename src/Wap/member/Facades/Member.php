<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/11
 * Time: 11:31
 */
namespace Roseinory\LaravelShop\Wap\Member\Facades;

use Illuminate\Support\Facades\Facade;

class Member extends Facade{
    public static function getFacadeAccessor(){
        return \Roseinory\LaravelShop\Wap\Member\Member::class;
    }
}