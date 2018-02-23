<?php
/**
 * author: yunshu
 * createTime: 18/2/21 12:04
 * description:
 */

namespace app\common\model;


class User extends Base
{
    protected $autoWriteTimestamp = true;

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function getByOpenID($openid)
    {
        return self::where('openid', '=', $openid)->find();
    }

    public function address()
    {
        return $this->hasOne('UserAddress', 'user_id', 'id');
    }
}