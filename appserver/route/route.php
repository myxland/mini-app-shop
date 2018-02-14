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

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');

Route::group('api/:version/theme', function() {
    Route::get('', 'api/:version.Theme/getList');
    Route::get(':id/product', 'api/:version.Theme/getThemeProducts');
    Route::post(':tid/product/:pid', 'api/:version.Theme/addThemeProduct');
    Route::delete(':tid/product/:pid', 'api/:version.Theme/delThemeProduct');
});

Route::group('api/:version/product', function() {
    Route::get(':id', 'api/:version.Product/getOne',[],['id'=>'\d+']);
    Route::get('latest', 'api/:version.Product/getLatest');
});

Route::group('api/:version/category', function() {
    Route::get('', 'api/:version.Category/getCategories');
    Route::get(':id/products', 'api/:version.Category/getProductsByCategoryId');
});


return [

];
