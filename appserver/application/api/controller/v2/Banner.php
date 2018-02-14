<?php
/**
 * author: yunshu
 * createTime: 18/2/6 12:20
 * description:
 */

namespace app\api\controller\v2;

use app\api\controller\Base;
use app\common\model\Banner as BannerModel;
use app\common\validate\IdValidate;
use think\Exception;
use app\library\exception\MissException;

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
        (new IdValidate())->batch()->checkValidate();

        $banner = BannerModel::instance()->getBannerById($id);
        if (! $banner) {
            throw new MissException(get_error_message(EC_BANNER_NOT_FOUND), EC_BANNER_NOT_FOUND);
        }

        return api_json(EC_OK, get_error_message(EC_OK), $banner);
    }
}