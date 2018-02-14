<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:34
 * description:
 */

namespace app\common\model;


class Category extends Base
{
    protected $hidden = ['update_time', 'delete_time', 'status'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function products()
    {
        return $this->hasMany('Product', 'category_id', 'id');
    }

    public function img()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');
    }

    public function getProductsByCategoryId($id)
    {
        return self::with('products')->with('products.imgs')->find($id);
    }
}