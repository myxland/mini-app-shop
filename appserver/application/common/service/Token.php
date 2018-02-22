<?php
/**
 * author: yunshu
 * createTime: 18/2/22 21:43
 * description:
 */

namespace app\common\service;


use app\library\exception\TokenException;
use app\library\RedisCache;
use think\Exception;

class Token extends Base
{
    //生成token
    public static function genToken()
    {
        $randChar = get_rand_num(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_salt');

        return md5($randChar . $timestamp . $tokenSalt);
    }

    public static function getValueByToken($token, $field)
    {
        $cacheValue = RedisCache::instance()->has($token);

        if (! $cacheValue) {
            throw new TokenException();
        }

        $ret = RedisCache::instance()->hget($token, $field);

        if (! $ret) {
            throw new Exception('尝试获取的token变量不存在');
        }

        return $cacheValue;
    }

    public static function getUidByToken($token)
    {
        return self::getValueByToken($token, 'uid');
    }
}