<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:45
 * description:
 */

namespace app\common\model;


class ProductImage extends Base
{
    protected $hidden = ['id', 'img_id', 'product_id', 'order', 'create_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}