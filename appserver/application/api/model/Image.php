<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:58
 * description:
 */

namespace app\api\model;


class Image extends Base
{
    const FROM_LOCAL_IMAGE = 1;   //本地图片
    protected $hidden = ['id','status', 'create_time', 'update_time', 'delete_time', 'from'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    //获取器
    public function getUrlAttr($value, $data)
    {
        $url = $value;
        if ($data['from'] == self::FROM_LOCAL_IMAGE) {   //本地
            $url = config('app.img_prefix') . $url;
        }

        return $url;
    }
}