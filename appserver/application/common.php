<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function api_json($code, $message, $data=[], $httpCode=200)
{
    $data = [
        'code'      =>  $code,
        'message'   =>  $message,
        'data'      =>  $data,
    ];

    return json($data, $httpCode);
}

function get_error_message($word)
{
    $code = config('code');

    return isset($code[$word]) ? $code[$word] : '';
}