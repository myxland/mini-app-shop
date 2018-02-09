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
    private static $instances = [];

    public static function instance($class = __CLASS__)
    {
        if (! isset(self::$instances[$class])) {
            self::$instances[$class] = new $class();
        }

        return self::$instances[$class];
    }
}