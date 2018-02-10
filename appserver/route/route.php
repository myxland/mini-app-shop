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

Route::group('api/:ver/theme', function() {
    Route::get('', 'api/:ver.Theme/getList');
    Route::get(':id/product', 'api/:ver.Theme/getThemeProducts');
    Route::post(':tid/product/:pid', 'api/:ver.Theme/addThemeProduct');
    Route::delete(':tid/product/:pid', 'api/:ver.Theme/delThemeProduct');
});

Route::group('api/:ver/product', function() {
    Route::get(':id', 'api/:ver.Product/getOne',[],['id'=>'\d+']);
    Route::post('', 'api/:ver.Product/create');
});

return [

];
