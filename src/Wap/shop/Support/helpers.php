<?php
if (! function_exists('shop_asset')) {
    function shop_asset($path, $secure = null)
    {
        $path = "vendor/wap/shop/assets\\". $path;
        return asset($path, $secure);
    }
}
