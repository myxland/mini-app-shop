<?php
/**
 * author: yunshu
 * createTime: 18/2/6 17:25
 * description:
 */

namespace app\library\exception;


use think\Exception;

class ApiException extends Exception
{
    protected $code;
    protected $httpCode;
    protected $message;

    public function __construct($code=null, $message=null, $httpCode=null)
    {
        if (isset($message))
            $this->message = $message ? $message : (isset($code) ? get_error_message($code) : $message);
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