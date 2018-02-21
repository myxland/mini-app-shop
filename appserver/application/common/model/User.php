<?php
/**
 * author: yunshu
 * createTime: 18/2/21 12:04
 * description:
 */

namespace app\common\model;


class User extends Base
{
    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function getByOpenID($openid)
    {
        return self::where('openid', '=', $openid)->find();
    }
}