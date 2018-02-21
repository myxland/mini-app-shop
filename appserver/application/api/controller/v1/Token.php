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
    private $userTokenSerivice;

    public function _initialize()
    {
        $this->userTokenSerivice = new UserToken();
    }

    public function getToken($code='')
    {
        (new TokenValidate())->checkValidate();

        $token = $this->userTokenSerivice->get($code);
    }
}