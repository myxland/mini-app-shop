<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:37
 * description:
 */

namespace app\api\controller\v1;

use app\api\model\Theme as ThemeModel;
use app\api\controller\Base;
use app\api\validate\IdCollectionValidate;
use yunshu\exception\MissException;

class Theme extends Base
{
    /**
     * 获取指定id的banner信息
     * @url api/:ver/theme?ids=id1,id2,id3....
     * @http GET
     * @return array
     */
    public function getList()
    {
        (new IdCollectionValidate())->checkValidate();

        $ids = request()->get('ids');
        $idArray = explode(',', $ids);

        $list = ThemeModel::instance()->getListByIds($idArray);

        if (sizeof($list) == 0) {
            throw new MissException(get_error_message(EC_THEME_NOT_FOUND), EC_THEME_NOT_FOUND);
        }

        return api_json($list);
    }
}