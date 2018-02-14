<?php
/**
 * author: yunshu
 * createTime: 18/2/10 09:20
 * description:
 */

namespace app\library\exception;


class ProductException extends ApiException
{
    protected $code = 20000;
    protected $httpCode = 404;
    protected $message = 'product are not found';
}