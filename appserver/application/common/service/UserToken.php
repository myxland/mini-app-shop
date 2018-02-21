<?php
/**
 * author: yunshu
 * createTime: 18/2/21 12:05
 * description:
 */

namespace app\common\service;


use app\common\model\User;
use app\library\exception\TokenException;
use app\library\exception\WechatException;
use think\Exception;

class UserToken extends Base
{
    protected $code;
    protected $appId;
    protected $secret;
    protected $loginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wechatAppId = config('wechat.appid');
        $this->wechatSecret = config('wechat.secret');
        $this->wechatLoginUrl = sprintf(config('wechat.login_url'), $this->wechatAppId, $this->wechatSecret, $this->code);
    }

    //获取token值
    public function get()
    {
        try {
            $response = curl_http_request($this->wechatLoginUrl, []);

            if (empty($response)) {
                throw new Exception('获取session_key及openid异常');
            }

            $responseArr = \GuzzleHttp\json_decode($response, true);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }

        if (array_key_exists('errcode', $responseArr)) {
            throw new WechatException($responseArr['errcode'], $responseArr['errmsg']);
        }

        return $this->grantToken($responseArr);
    }

    public function grantToken($wechatResponse)
    {
        $openid = $wechatResponse['openid'];
        $user = User::instance()->getByOpenID($openid);
        if ($user) {
            $uid = $user->id;
        } else {
            $uid = $this->createUser($openid);
        }

        $token = $this->cacheWechatResponse($wechatResponse);

        return $token;
    }

    public function cacheWechatResponse($wechatResponse)
    {
        $token = $this->genToken();
        $value = json_encode($wechatResponse);
        $expire = config('secure.token_expire_in');
        $ret = cache($token, $value, $expire);

        if (! $ret) {
            throw new TokenException(EC_AUTH_CACHE_ERROR);
        }

        return $token;
    }

    public function createUser($openid)
    {
        $user =  User::create([
            'openid'    =>  $openid,
        ]);

        return $user->id;
    }


}