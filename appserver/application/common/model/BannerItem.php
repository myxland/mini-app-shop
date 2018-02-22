<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:55
 * description:
 */

namespace app\common\model;


class BannerItem extends Base
{
    protected $hidden = ['id', 'banner_id', 'img_id', 'status', 'create_time', 'update_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function img()
    {
        //外键img_id在banner_item表,使用belongsTo
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}