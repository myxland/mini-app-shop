<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:55
 * description:
 */

namespace app\api\model;


class BannerItem extends Base
{
    public function img()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}