<?php
/**
 * author: yunshu
 * createTime: 18/2/5 23:17
 * description:
 */

namespace app\api\controller\v1;


class Test
{
    public function index()
    {
        return json([
            'code'  =>  0,
            'msg'   =>  'succ',
            'data'  =>  ['username'=>'yunshu','age'=>18]
        ]);
    }
}