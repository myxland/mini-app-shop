<?php
/**
 * author: yunshu
 * createTime: 18/2/6 18:57
 * description:
 */
/**
0   成功
999  未知错误
1 开头为通用错误
2 商品类错误
3 主题类错误
4 Banner类错误
5 类目类错误
6 用户类错误
8 订单类错误

10000 通用参数错误
10001 资源未找到
10002 未授权（令牌不合法）
10003 尝试非法操作（自己的令牌操作其他人数据）
10004 授权失败（第三方应用账号登陆失败）
10005 授权失败（服务器缓存异常）

20000 请求商品不存在

30000 请求主题不存在

40000 Banner不存在

50000 类目不存在

60000 用户不存在
60001 用户地址不存在

80000 订单不存在
80001 订单中的商品不存在，可能已被删除
80002 订单还未支付，却尝试发货
80003 订单已支付过
 * */

define('EC_OK', 0);
define('EC_UNKNOW_ERROR', 999);

define('EC_AUTH_CACHE_ERROR', 10005);

define('EC_THEME_NOT_FOUND', 30000);
define('EC_THEME_PRODUCT_EXIST', 30001);
define('EC_THEME_PRODUCT_NOT_FOUND', 30002);
define('EC_BANNER_NOT_FOUND', 40000);
define('EC_CATEGORY_NOT_FOUND', 50000);

return [
    EC_OK   =>  'return successfully!',   //成功
    EC_UNKNOW_ERROR =>  'unknow error!',   //未知错误
    EC_BANNER_NOT_FOUND=>'banner not found',   //banner找不到
    EC_THEME_NOT_FOUND=>'theme not found',
    EC_THEME_PRODUCT_EXIST=>'theme product exist',
    EC_THEME_PRODUCT_NOT_FOUND=>'theme product not found',
    EC_CATEGORY_NOT_FOUND => 'category not found',
    EC_AUTH_CACHE_ERROR=>'server cache exception',
];