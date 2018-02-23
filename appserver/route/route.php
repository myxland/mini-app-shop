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
    Route::get('by_category', 'api/:version.Product/getAllByCategoryId');
});

Route::group('api/:version/category', function() {
    Route::get('', 'api/:version.Category/getCategories');
});

Route::group('api/:version/token', function() {
   Route::post('user', 'api/:version.Token/getToken');    //提高安全性,这里获取token使用post方式请求
   Route::post('verify', 'api/:version.Token/verifyToken');
});

Route::group('api/:version/address', function() {
    Route::post('', 'api/:version.Address/createOrUpdateAddress');
    Route::put('', 'api/:version.Address/createOrUpdateAddress');
});


//订单接口
Route::group('api/:version/order', function() {
    Route::post('', 'api/:version.Order/placeOrder');
});

return [

];
