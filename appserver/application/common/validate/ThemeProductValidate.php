<?php
/**
 * author: yunshu
 * createTime: 18/2/10 09:10
 * description:
 */

namespace app\common\validate;


class ThemeProductValidate extends BaseValidate
{
    protected $rule = [
        'tid'  =>  'require|number',
        'pid'  =>  'require|number',
    ];
}