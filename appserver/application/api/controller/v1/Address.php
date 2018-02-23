<?php
/**
 * author: yunshu
 * createTime: 18/2/22 17:54
 * description:
 */

namespace app\api\controller\v1;

use app\api\controller\Base;
use app\common\model\User;
use app\common\service\Token as TokenService;
use app\common\validate\AddressValidate;
use app\library\exception\UserException;
use think\Exception;
use think\facade\Request;

class Address extends Base
{
    protected $beforeActionList = [
        'checkUserScope'    =>  ['only'=>'createOrUpdateAddress'],
    ];

    public function createOrUpdateAddress()
    {
        $addressValidate = new AddressValidate();
        $addressValidate->checkValidate();

        $token = Request::instance()->header('token');
        $uid = TokenService::getUidByToken($token);

        $user = User::get($uid);
        if (! $user) {
            throw new UserException();
        }

        $data = $addressValidate->getDataByRule(input('post.'));
        if ($user->address) {   //更新(使用模型)
            $user->address->save($data);
            return api_json([], EC_OK, 'successful', 202);
        } else {   //新增(利用关联关系)
            $user->address()->save($data);
            return api_json([], EC_OK, 'successful', 201);
        }
    }
}