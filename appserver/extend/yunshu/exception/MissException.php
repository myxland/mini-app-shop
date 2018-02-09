<?php
/**
 * author: yunshu
 * createTime: 18/2/6 22:23
 * description:
 */
namespace yunshu\exception;

class MissException extends ApiException
{
    protected $code = 10001;
    protected $httpCode = 404;
    protected $message = 'resources are not found';
}