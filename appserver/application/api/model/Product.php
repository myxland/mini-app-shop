<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\api\model;


class Product extends Base
{
    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}