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
use app\library\exception\ParamException;
use app\library\exception\TokenException;
use think\Exception;

class Token extends Base
{
    public function getToken($code='')
    {
        (new TokenValidate())->checkValidate();

        $userTokenService = new UserToken($code);

        $token = $userTokenService->get();

        $ret = [
            'token' =>  $token,
        ];
        return api_json($ret);
    }

    public function verifyToken($token='')
    {
        if (! $token) {
            throw new ParamException();
        }

        $ret = UserToken::verifyToken($token);

        if (! $ret) {
            throw new TokenException(EC_AUTH_CACHE_ERROR, 'token失效');
        }

        return api_json(['isValid'=>$ret]);
    }
}