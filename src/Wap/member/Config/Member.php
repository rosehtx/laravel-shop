<?php
return[
    'wechat' => [
        'official_account' => [
            'default' => [
                'app_id' => env('WECHAT_OFFICIAL_ACCOUNT_APPID', 'rose-app-id'),         // AppID
                'secret' => env('WECHAT_OFFICIAL_ACCOUNT_SECRET', 'rose-app-secret'),    // AppSecret
                'token' => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'rose-token'),           // Token
                'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey

                /*
                 * OAuth 配置
                 *
                 * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
                 * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
                 */
                'oauth' => [
                    'scopes'   => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
                    'callback' => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
                ],
            ],
        ],
    ],
  'auth'=>[
      //事先动作，为了以后着想
      'controller'=>Roseinory\LaravelShop\Wap\Member\Http\Controller\AuthController::class,

      //当前使用的守卫，只是定义
      'guard' => 'member',
      //定义的守卫组
      'guards' => [
          'member' => [
              'driver' => 'session',
              'provider' => 'wechat_user',
          ],
      ],
      'providers' => [
          'wechat_user' => [
              'driver' => 'eloquent',
              'model' => Roseinory\LaravelShop\Wap\Member\Models\User::class,
          ],
      ],
  ]
];