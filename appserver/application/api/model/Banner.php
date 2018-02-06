<?php
/**
 * author: yunshu
 * createTime: 18/2/6 16:43
 * description:
 */

namespace app\api\model;


class Banner extends Base
{
    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public function getBannerById($id)
    {
        return self::with(['items', 'items.img'])->find($id);
    }
}