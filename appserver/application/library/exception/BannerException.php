<?php
/**
 * author: yunshu
 * createTime: 18/2/10 09:18
 * description:
 */

namespace app\library\exception;


class BannerException extends ApiException
{
    protected $code = 40000;
    protected $httpCode = 404;
    protected $message = 'banner not found';
}