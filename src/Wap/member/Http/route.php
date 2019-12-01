<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/1
 * Time: 22:15
 */
Route::get('/wechatstore',"AuthController@wechatStore")->middleware('wechat.oauth');