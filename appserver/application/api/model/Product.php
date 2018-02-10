<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\api\model;


class Product extends Base
{
    protected $hidden = ['create_time', 'update_time', 'delete_time', 'status', 'status', 'from', 'img_id', 'category_id', 'pivot'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    //获取器
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->getImageUrl($value, $data);
    }

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('Product_property', 'product_id', 'id');
    }

    public function getOne($id)
    {
        return self::with(['imgs'=>function($query) {
            $query->with(['imgUrl'])->order('order', 'asc');
        }])->with('properties')->where('id', $id)->find();
    }
}