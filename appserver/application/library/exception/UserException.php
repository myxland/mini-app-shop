<?php
/**
 * author: yunshu
 * createTime: 18/2/22 23:04
 * description:
 */

namespace app\library\exception;

class UserException extends ApiException
{
    protected $code = 60000;
    protected $httpCode = 404;
    protected $message = 'user not found';
}