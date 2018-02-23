<?php
/**
 * author: yunshu
 * createTime: 18/2/6 12:19
 * description:
 */

namespace app\api\controller;

use app\common\service\Token as TokenService;
use think\Controller;

class Base extends Controller
{
    protected function checkPrimaryScope()
    {
        return TokenService::checkPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        return TokenService::checkExclusiveScope();
    }
}