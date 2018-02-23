<?php
/**
 * author: yunshu
 * createTime: 18/2/23 17:06
 * description:
 */

namespace app\library\exception;

class OrderException extends ApiException
{
    protected $code = 80000;
    protected $httpCode = 404;
    protected $message = 'order are not found';
}