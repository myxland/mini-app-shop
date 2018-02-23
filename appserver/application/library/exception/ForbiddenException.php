<?php
/**
 * author: yunshu
 * createTime: 18/2/23 11:54
 * description:
 */

namespace app\library\exception;


class ForbiddenException extends ApiException
{
    protected $code = 10001;
    protected $httpCode = 403;
    protected $message = 'forbidden';
}