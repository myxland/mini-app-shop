<?php
/**
 * author: yunshu
 * createTime: 18/2/6 20:59
 * description:
 */

namespace app\api\model;


use think\Model;

class Base extends Model
{
    const FROM_LOCAL_IMAGE = 1;
    private static $instances = [];

    protected static function instance($class = __CLASS__)
    {
        if (! isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }

        return self::$instances[$class];
    }

    public function getImageUrl($value, $data)
    {
        $url = $value;
        if ($data['from'] == self::FROM_LOCAL_IMAGE) {   //本地
            $url = config('app.img_prefix') . $url;
        }

        return $url;
    }
}