<?php
/**
 * author: yunshu
 * createTime: 18/2/22 21:43
 * description:
 */

namespace app\common\service;


use app\library\enum\Scope;
use app\library\exception\TokenException;
use app\library\RedisCache;
use think\Exception;
use think\facade\Request;

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

        return $ret;
    }

    public static function getUidByToken($token)
    {
        return self::getValueByToken($token, 'uid');
    }

    public static function checkPrimaryScope()
    {
        $token = Request::instance()->header('token');
        $scope = self::getValueByToken($token, 'scope');

        if (! $scope) {
            throw new TokenException();
        } elseif ($scope < Scope::USER) {
            throw new ForbiddenException();
        }

        return true;
    }

    //只有用户本身有接口权限
    public static function checkExclusiveScope()
    {
        $token = Request::instance()->header('token');
        $scope = self::getValueByToken($token, 'scope');

        if (! $scope) {
            throw new TokenException();
        } elseif ($scope != Scope::USER) {
            throw new ForbiddenException();
        }

        return true;
    }
}