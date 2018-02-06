<?php
/**
 * author: yunshu
 * createTime: 18/2/6 17:25
 * description:
 */

namespace yunshu\exception;


use think\Exception;

class ApiException extends Exception
{
    protected $code;
    protected $httpCode;
    protected $message;

    public function __construct($message=null, $code=null, $httpCode=null)
    {
        if (isset($message))
            $this->message = $message;
        if (isset($code))
            $this->code = $code;
        if (isset($httpCode))
            $this->httpCode = $httpCode;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }
}