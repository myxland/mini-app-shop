<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:58
 * description:
 */

namespace app\api\model;


class Image extends Base
{
    protected $hidden = ['id','status', 'create_time', 'update_time', 'delete_time', 'from'];

    //获取器
    public function getUrlAttr($value, $data)
    {
        $url = $value;
        if ($data['from'] == 1) {   //本地
            $url = config('app.img_prefix') . $url;
        }

        return $url;
    }
}