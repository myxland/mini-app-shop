<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:45
 * description:
 */

namespace app\api\model;


class ProductImage extends Base
{
    protected $hidden = ['id', 'img_id', 'product_id', 'delete_time', 'order'];

    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}