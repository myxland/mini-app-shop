<?php
/**
 * author: yunshu
 * createTime: 18/2/6 15:22
 * description:
 */

namespace app\api\validate;

class IdValidate extends BaseValidate
{
    protected $rule = [
        'id'  =>  'require|isPositiveInteger',
    ];
    protected $message = [
        'id.require' => 'id不能为空',
        'id.isPositiveInteger' => 'id格式不正确',
    ];
}