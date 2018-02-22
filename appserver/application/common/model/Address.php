<?php
/**
 * author: yunshu
 * createTime: 18/2/22 17:55
 * description:
 */

namespace app\common\model;


class Address extends Base
{
    protected $hidden = ['id', 'user_id', 'img_id', 'create_time', 'update_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}