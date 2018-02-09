<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:58
 * description:
 */

namespace app\api\model;


class Image extends Base
{
    protected $hidden = ['id','status', 'create_time', 'update_time', 'delete_time', 'from'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}