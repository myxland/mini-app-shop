<?php
/**
 * author: yunshu
 * createTime: 18/2/6 15:33
 * description:
 */

namespace app\api\validate;

use think\facade\Request;
use think\Validate;
use yunshu\exception\ParamException;

class BaseValidate extends Validate
{
    public function checkValidate()
    {
        $request = Request::instance();
        $params = $request->param();

        if (! $this->check($params)) {
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

        return $field . '必须是正整数';
    }
}