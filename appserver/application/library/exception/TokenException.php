<?php
/**
 * author: yunshu
 * createTime: 18/2/21 19:43
 * description:
 */

namespace app\library\exception;


class TokenException extends ApiException
{
    public $code = 10001;
    public $message = 'token已过期或者无效';
    public $httpCode = 401;
}