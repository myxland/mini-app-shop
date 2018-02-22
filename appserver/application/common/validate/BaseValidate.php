<?php
/**
 * author: yunshu
 * createTime: 18/2/6 15:33
 * description:
 */

namespace app\common\validate;

use think\facade\Request;
use think\Validate;
use app\library\exception\ParamException;

class BaseValidate extends Validate
{
    public function checkValidate()
    {
        $request = Request::instance();
        $params = $request->param();

        if (! $this->batch()->check($params)) {
            $errorMsg = is_array($this->getError()) ? implode(',',$this->getError()) : $this->getError();

            throw new ParamException($errorMsg);
        }

        return true;
    }

    protected function isPositiveInteger($value, $rule='', $data='', $field='')
    {
        if (is_numeric($value) && is_int($value+0) && $value > 0) {
            return true;
        }

        return false;
    }

    protected function isNotEmpty($value, $rule='', $data='', $field='')
    {
        if (empty($value)) {
            return false;
        }

        return true;
    }

    protected function isMobile($value, $rule='', $data='', $field='')
    {
        $rule = '^1(3|4|5|7|8)\d{9}$^';
        $result = preg_match($rule, $value);

        if ($result) {
            return true;
        }

        return false;
    }

    protected function isPositiveIntegerAll($value, $rule='', $data='', $field='')
    {
        $idArray = explode(',', $value);
        if (empty($idArray)) {
            return false;
        }

        $arr = explode(',', $value);
        $flag = true;
        foreach ($arr as $item) {
           if ($this->isPositiveInteger($item) !== true) {
                $flag = false;
               break;
           }
        }

        return $flag;
    }

    public function getDataByRule($data)
    {
        $ret = array();
        if (array_key_exists('user_id', $data) || array_key_exists('uid', $data)) {
            throw new ParamException();
        }

        foreach ($this->rule as $k=>$v) {
            $ret[$k] = $data[$k];
        }

        return $ret;
    }
}