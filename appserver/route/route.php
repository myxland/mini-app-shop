<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('api/:ver/banner/:id', 'api/:ver.Banner/getBanner');

Route::get('api/:ver/theme', 'api/:ver.Theme/getList');

Route::get('api/:ver/theme/:id/product', 'api/:ver.Theme/getThemeProducts');

Route::post('api/:ver/theme/:tid/product/:pid', 'api/:ver.Theme/addThemeProduct');

return [

];
