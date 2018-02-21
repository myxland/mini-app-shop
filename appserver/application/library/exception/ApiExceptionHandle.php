<?php
namespace app\library\exception;

use think\exception\Handle;
use think\facade\Log;

/**
 * author: yunshu
 * createTime: 18/2/6 17:16
 * description:
 */
class ApiExceptionHandle extends Handle
{
    public $code;
    public $httpCode = 500;
    public $msg;


    public function render(\Exception $e)
    {
        if ($e instanceof ApiException) { //自定义异常
            $this->httpCode = $e->getHttpCode();
            $this->msg      = $e->getMessage() ? $e->getMessage() : get_error_message($this->code);
            $this->code     = $e->getCode();
        } else {
            if (config('app_debug') == true) {
                return parent::render($e);
            }

            $this->report($e);

            $this->msg  = "Sorry, we make a mistake.";
            $this->code = EC_UNKNOW_ERROR;   //系统错误
        }

        return api_json([], $this->code, $this->msg, $this->httpCode);
    }
}