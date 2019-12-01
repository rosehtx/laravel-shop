<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/11
 * Time: 11:08
 */
namespace Roseinory\LaravelShop\Wap\Member;

use Illuminate\Support\Facades\Auth;

class Member{
    public function guard(){
//        return Auth::guard('member');
        return Auth::guard(config('wap.member.auth.guard'));
    }
}