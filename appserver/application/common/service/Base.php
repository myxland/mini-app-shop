<?php
/**
 * author: yunshu
 * createTime: 18/2/9 14:17
 * description:
 */

namespace app\common\service;

use think\Exception;

class Base
{
    private static $instance = [];
    private static $services = [];
    private $param;
    protected $model;
    protected $isClosed = false;

    public static function getInstance($class = __CLASS__)
    {
        if (! isset(self::$instance[$class])) {
            self::$instance[$class] = new $class();
        }
        return self::$instance[$class];
    }

    public function send($param = null)
    {
        list($model, $action) = explode('.', $param);
        if (!$model or ! $action) {
            throw new \Exception('参数不正确!');
        }

        $service = $model;
        if (! isset(self::$services[$model])) {
            self::$services[$model] = new $service;
        }
        $serviceObj = self::$services[$model];
        if ($serviceObj->isClosed) {
            throw new \Exception('该服务已经不能用');
        }

        if ( ! method_exists($serviceObj, $action)) {
            throw new \Exception('该服务没有提供该方法');
        }

        $ret = call_user_func_array([$serviceObj, $action], $this->param ? $this->param : array());

        return $ret;
    }

    public static function post()
    {
        return self::getInstance()->setParams(func_get_args());
    }

    public function setParams($param = array())
    {
        if (is_array($param)) {
            $this->param = $param;
        }

        return $this;
    }
}