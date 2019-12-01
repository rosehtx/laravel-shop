<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/3
 * Time: 15:32
 */
namespace Roseinory\LaravelShop\Wap\Member\Http\Controller;

//use Roseinory\LaravelShop\Wap\Member\Http\Controller\Controller;

use Illuminate\Http\Request;
use Roseinory\LaravelShop\Wap\Member\Models\User;
use Illuminate\Support\Facades\Auth;
use Roseinory\LaravelShop\Wap\Member\Facades\Member;

class AuthController extends Controller{
    public function wechatStore(Request $request){
        $wechatuser = session('wechat.oauth_user.default');
        $user       = User::where('openid', $wechatuser->id)->first();
        if (!$user) {
            $user = User::create(
                [
                    'username'   => $wechatuser->name,
                    'openid'     => $wechatuser->id,
                    'image_head' => $wechatuser->avatar,
                ]
            );
        }
        //改变用户的状态为登录
//        Auth::login($user);
        Auth::guard('member')->login($user);
//        dd(Auth::guard('member')->user());
//        dd(Auth::guard('member')->check());
        dd(Member::guard()->check());
//        var_dump(Auth::check());
        return '通过';
//        return redirect()->route('wap.member.index');
    }
}