<?php
/**
 * author: yunshu
 * createTime: 18/2/6 12:19
 * description:
 */

namespace app\api\controller;

use app\common\service\Token as TokenService;
use app\library\enum\Scope;
use app\library\exception\ForbiddenException;
use app\library\exception\TokenException;
use think\Controller;
use think\facade\Request;

class Base extends Controller
{
    protected function checkUserScope()
    {
        $token = Request::instance()->header('token');
        $scope = TokenService::getValueByToken($token, 'scope');

        if (! $scope) {
            throw new TokenException();
        } elseif ($scope < Scope::USER) {
            throw new ForbiddenException();
        }

        return true;
    }
}