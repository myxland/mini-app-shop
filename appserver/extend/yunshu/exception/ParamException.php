<?php
/**
 * author: yunshu
 * createTime: 18/2/6 19:26
 * description:
 */

namespace yunshu\exception;


class ParamException extends ApiException
{
    protected $code = 10000;
    protected $httpCode = 400;
    protected $message = 'invalid parameters';
}