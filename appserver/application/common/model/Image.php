<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:58
 * description:
 */

namespace app\common\model;


class Image extends Base
{
    protected $hidden = ['id','status', 'create_time', 'update_time', 'from'];

    public function getUrlAttr($value, $data)
    {
       return $this->getImageUrl($value, $data);
    }

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }
}