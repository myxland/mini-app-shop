<?php
/**
 * author: yunshu
 * createTime: 18/2/9 14:17
 * description:
 */

namespace app\common\service;


class Base
{
    //生成token
    public function genToken()
    {
        $randChar = get_rand_num(32);
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        $tokenSalt = config('secure.token_salt');

        return md5($randChar . $timestamp . $tokenSalt);
    }
}