<?php
/**
 * author: yunshu
 * createTime: 18/2/14 21:29
 * description:
 */

namespace app\common\validate;


/**
 * 最近新品返回数量验证器
 * Class CountValidate
 *
 * @package app\common\validate
 */
class CountValidate extends BaseValidate
{
    protected $rule = [
        'count' =>'isPositiveInteger|between:1,15'
    ];
}