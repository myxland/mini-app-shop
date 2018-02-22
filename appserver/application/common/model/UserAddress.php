<?php
/**
 * author: yunshu
 * createTime: 18/2/22 23:52
 * description:
 */

namespace app\common\model;

class UserAddress extends Base
{
    protected $insert = ['create_time'];
    protected $update = ['update_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function setCreateTimeAttr()
    {
        return time();
    }

    public function setUpdateTimeAttr()
    {
        return time();
    }
}