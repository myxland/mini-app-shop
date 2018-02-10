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
use app\api\validate\IdValidate;
use app\api\validate\ThemeProductValidate;
use yunshu\exception\MissException;

class Theme extends Base
{
    /**
     * 获取指定id的banner信息
     * @url api/:ver/theme?ids=id1,id2,id3....
     * @http GET
     * @return JSON data OR Exception
     */
    public function getList()
    {
        (new IdCollectionValidate())->checkValidate();

        $ids = request()->get('ids');
        $idArray = explode(',', $ids);

        $list = ThemeModel::instance()->getListByIds($idArray);

        if (sizeof($list) == 0) {
            throw new MissException(EC_THEME_NOT_FOUND);
        }

        return api_json($list);
    }

    /**
     * 获得指定主题的产品
     * @url api/:version/theme/:id
     * @http GET
     * @return JSON data OR Exception
     */
    public function getThemeProducts($id)
    {
        (new IdValidate())->checkValidate();

        $products = ThemeModel::instance()->getThemeProducts($id);

        if (sizeof($products) == 0) {
            throw new MissException(EC_THEME_NOT_FOUND);
        }

        return api_json($products);
    }

    /**
     * 获得主题产品
     * @url api/:ver/theme/:tid/product/:pid
     * @http POST
     * @return JSON data OR Exception
     */
    public function addThemeProduct($tid, $pid)
    {
        (new ThemeProductValidate())->checkValidate();

        $ret = ThemeModel::instance()->addThemeProduct($tid, $pid);

        return api_json([]);
    }
}