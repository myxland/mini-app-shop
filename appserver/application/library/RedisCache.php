<?php
/**
 * author: yunshu
 * createTime: 18/2/22 18:40
 * description:
 */

namespace app\library;

use think\facade\Cache;

class RedisCache
{
    private static $instance;
    private $handler;

    private function __construct()
    {
        $cache = Cache::init();
        // 获取缓存对象句柄
        $this->handler = $cache->handler();
    }

    public static function instance()
    {
        if (! self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function hset($key, $arr, $expire=0)
    {
        foreach ($arr as $field=>$value) {
            $this->handler->hset($key, $field, $value);
        }

        if ($expire) {
            $this->handler->expire($key, $expire);
        }

        return true;
    }

    public function hget($key, $field)
    {
        if (! $this->has($key)) {
            return null;
        }

        return $this->handler->hget($key, $field);
    }

    public function has($key)
    {
        return $this->handler->exists($key);
    }
}