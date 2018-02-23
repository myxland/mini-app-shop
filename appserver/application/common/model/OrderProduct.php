<?php
/**
 * author: yunshu
 * createTime: 18/2/23 22:40
 * description:
 */

namespace app\common\model;


class OrderProduct extends Base
{
    protected $hidden = ['id', 'create_time', 'update_time'];
    protected $autoWriteTimestamp = true;

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}