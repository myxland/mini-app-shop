<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:45
 * description:
 */

namespace app\common\model;


class ProductProperty extends Base
{
    protected $hidden = ['id', 'update_time', 'product_id', 'create_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}