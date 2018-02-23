<?php
/**
 * author: yunshu
 * createTime: 18/2/23 18:42
 * description:
 */

namespace app\common\model;


class Order extends Base
{
    protected $hidden = ['id', 'user_id', 'create_time', 'update_time'];
    protected $autoWriteTimestamp = true;

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}