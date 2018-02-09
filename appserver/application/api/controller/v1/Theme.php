<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:37
 * description:
 */

namespace app\api\controller\v1;


use app\api\controller\Base;
use app\api\validate\IdCollectionValidate;

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
        dump($ids);

    }
}