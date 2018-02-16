<?php
/**
 * author: yunshu
 * createTime: 18/2/6 16:43
 * description:
 */

namespace app\common\model;


class Banner extends Base
{
    protected $hidden = ['status', 'create_time', 'update_time'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public function getBannerById($id)
    {
        return self::with(['items', 'items.img'])->where(['status'=>1])->find($id);
    }
}