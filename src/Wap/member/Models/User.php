<?php
/**
 * Created by PhpStorm.
 * User: xin Du
 * Date: 2019/8/3
 * Time: 17:05
 */
namespace Roseinory\LaravelShop\Wap\Member\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'shop_user';

    protected $fillable = [
        'username', 'openid', 'image_head',
    ];
}