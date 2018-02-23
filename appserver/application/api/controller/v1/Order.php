<?php
/**
 * author: yunshu
 * createTime: 18/2/23 16:05
 * description:
 */

namespace app\api\controller\v1;

use app\common\service\Order as OrderService;
use app\common\service\Base as Service;
use app\api\controller\Base;
use app\common\service\Token as TokenService;
use app\common\validate\OrderPalceValidate;
use think\facade\Request;

class Order extends Base
{
    protected $beforeActionList = [
            'checkExclusiveScope' => ['only' => 'placeOrder'],
        ];

    public function placeOrder()
    {
        (new OrderPalceValidate())->checkValidate();

        $products = input('post.products/a');
        $token = Request::instance()->header('token');
        $uid = TokenService::getUidByToken($token);

//        $ret = Service::post($uid, $products)->send('Order.place');
        $ret = (new OrderService())->place($uid, $products);

        return api_json($ret, EC_OK, 'successful', 201);
    }
}