<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/22
 * Time: 22:59
 */
namespace Roseinory\LaravelShop\Wap\Shop\Http\Controllers;

use Roseinory\LaravelShop\Wap\Shop\Http\Controllers\Controller;

class IndexController extends  Controller{
    public function index(){
        return view('wap.shop::index.index');
    }
}
