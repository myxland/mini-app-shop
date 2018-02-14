<?php
/**
 * author: yunshu
 * createTime: 18/2/10 09:17
 * description:
 */

namespace app\library\exception;


class ThemeException extends ApiException
{
    protected $code = 30000;
    protected $httpCode = 404;
    protected $message = 'theme are not found';
}