<?php
/**
 * author: yunshu
 * createTime: 18/2/21 14:18
 * description:
 */

namespace app\library\exception;


class WechatException extends ApiException
{
    protected $code = 999;
    protected $httpCode = 400;
    protected $message = 'wechat bad request';
}