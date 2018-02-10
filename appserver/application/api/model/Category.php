<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:34
 * description:
 */

namespace app\api\model;


class Category extends Base
{
    protected $hidden = ['update_time', 'delete_time', 'status'];

    public function products()
    {
        return $this->hasMany('Product', 'product_id', 'id');
    }
}