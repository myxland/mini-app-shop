<?php
/**
 * author: yunshu
 * createTime: 18/2/6 15:22
 * description:
 */

namespace app\api\validate;

class IdPositiveIntegerValidate extends BaseValidate
{
    protected $rule = [
        'id'  =>  'require|isPositiveInteger',
    ];


}