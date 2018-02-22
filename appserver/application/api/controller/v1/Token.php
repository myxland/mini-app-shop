<?php
/**
 * author: yunshu
 * createTime: 18/2/21 11:57
 * description:
 */

namespace app\api\controller\v1;


use app\api\controller\Base;
use app\common\service\UserToken;
use app\common\validate\TokenValidate;

class Token extends Base
{
    public function getToken($code='')
    {
        (new TokenValidate())->checkValidate();

        $userTokenService = new UserToken($code);

        $token = $userTokenService->get();

        return api_json($token);
    }
}