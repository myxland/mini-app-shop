<?php
/**
 * author: yunshu
 * createTime: 18/2/9 17:09
 * description:
 */

namespace app\common\validate;


class IdCollectionValidate extends BaseValidate
{
    protected $rule = [
        'ids'  =>  'require|isPositiveIntegerAll',
    ];

    protected $message = [
        'ids.require'               =>   'ids参数必须',
        'ids.isPositiveIntegerAll'   =>  'ids格式不正确',
    ];
}