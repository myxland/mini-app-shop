<?php
/**
 * author: yunshu
 * createTime: 18/2/6 12:20
 * description:
 */

namespace app\api\controller\v1;

use app\api\controller\Base;
use app\api\model\Banner as BannerModel;
use app\api\validate\IdPositiveIntegerValidate;
use think\Exception;
use yunshu\exception\MissException;

class Banner extends Base
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @param int $id Banner Id
     * @return array $bannerList
     */
    public function getBanner($id)
    {
        $validate = new IdPositiveIntegerValidate();
        $validate->checkValidate();

        $banner = (new BannerModel())->getBannerById($id);
        if (! $banner) {
            throw new MissException('Banner不存在', 40000);
        }

        return api_json(EC_OK, get_error_message(EC_OK), $banner);
    }
}