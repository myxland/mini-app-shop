<?php
/**
 * author: yunshu
 * createTime: 18/2/14 18:17
 * description:
 */

namespace app\api\behavior;

//行为(behavior):应用AOP的思想对请求进行全局过滤,相当于中间件的概念
//跨域资源共享 CORS 详解: http://www.ruanyifeng.com/blog/2016/04/cors.html

//跨域行为处理类
class CORS
{
    //appInit对应tags.php的app_init标签
    public function appInit($params)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token,Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: POST,GET');
        if (request()->isOptions()) {
            exit();
        }
    }
}