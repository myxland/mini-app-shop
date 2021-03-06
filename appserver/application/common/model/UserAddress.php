<?php
/**
 * author: yunshu
 * createTime: 18/2/22 23:52
 * description:
 */

namespace app\common\model;

class UserAddress extends Base
{
    protected $hidden = ['id', 'create_time', 'update_time', 'user_id'];
    protected $autoWriteTimestamp = true;

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}