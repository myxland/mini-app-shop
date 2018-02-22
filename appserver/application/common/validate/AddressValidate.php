<?php
/**
 * author: yunshu
 * createTime: 18/2/22 18:19
 * description:
 */

namespace app\common\validate;


class AddressValidate extends BaseValidate
{
    protected $rule = [
        'name'  =>  'require|isNotEmpty',
        'mobile'  =>  'require|isMobile',
        'province'  =>  'require|isNotEmpty',
        'city'  =>  'require|isNotEmpty',
        'country'  =>  'require|isNotEmpty',
        'detail'  =>  'require|isNotEmpty',
    ];
}