<?php
/**
 * author: yunshu
 * createTime: 18/2/14 09:39
 * description:
 */

namespace app\library\exception;


class CategoryNotFoundException extends ApiException
{
    protected $code = EC_CATEGORY_NOT_FOUND;
    protected $httpCode = 404;
    protected $message;
}