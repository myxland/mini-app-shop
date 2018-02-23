<?php
/**
 * author: yunshu
 * createTime: 18/2/23 16:25
 * description:
 */

namespace app\common\validate;

use app\library\exception\ParamException;

class OrderPalceValidate extends BaseValidate
{
    protected $rule = [
        'products'  =>  'require|checkProducts',
    ];
    protected $singleRule = [
        'product_id'    =>  'require|isPositiveInteger',
        'count'         =>  'require|isPositiveInteger',
    ];

    protected function checkProducts($value, $rule='', $data='', $field='')
    {
        if (empty($value) || !is_array($value)) {
            throw new ParamException(null, '请输入必要参数');
        }

        foreach ($value as $item) {
            $this->checkProduct($item);
        }

        return true;
    }

    private function checkProduct($product)
    {
        $validator = new BaseValidate($this->singleRule);
        if (! $validator->check($product)) {
            throw new ParamException(null, $validator->getError());
        }

        return true;
    }
}