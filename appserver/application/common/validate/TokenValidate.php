<?php
/**
 * author: yunshu
 * createTime: 18/2/21 11:59
 * description:
 */

namespace app\common\validate;


class TokenValidate extends BaseValidate
{
    protected $rule = [
        'code'  => 'require|isNotEmpty',
    ];

    protected $message = [
        'code.isNotEmpty'  =>   'code不能为空',
    ];
}