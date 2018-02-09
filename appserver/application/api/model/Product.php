<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\api\model;


class Product extends Base
{
    protected $hidden = ['create_time', 'update_time', 'delete_time', 'status', 'summary', 'status', 'from', 'img_id', 'category_id', 'pivot'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    //获取器
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->getUrlAttr($value, $data);
    }
}