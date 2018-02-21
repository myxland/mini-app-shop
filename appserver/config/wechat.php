<?php
/**
 * author: yunshu
 * createTime: 18/2/21 12:26
 * description:
 */
use think\facade\Env;

return [
    'appid'     => Env::get('miniapp.appid'),
    'secret'    => Env::get('miniapp.secret'),
    'login_url' => 'https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_code',
];