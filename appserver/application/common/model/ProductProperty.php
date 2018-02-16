<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:45
 * description:
 */

namespace app\common\model;


class ProductProperty extends Base
{
    protected $hidden = ['id', 'update_time', 'product_id'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}