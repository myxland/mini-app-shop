<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\api\model;


class Theme extends Base
{
    protected $hidden = ['delete_time', 'update_time', 'topic_img_id', 'head_img_id'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function topicImage()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');   //在Image表里写$this->hasOne()
    }

    public function headImage()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    //定义多对多关系
    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }

    public function getListByIds($idArray)
    {
        return self::with(['topicImage', 'headImage'])->select($idArray);
    }

    public function getThemeProducts($id)
    {
        return self::with(['products', 'headImage', 'topicImage'])->where('id', $id)->select();
    }
}