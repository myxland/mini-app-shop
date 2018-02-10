<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:09
 * description:
 */

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\controller\Base;
use app\api\validate\IdValidate;
use yunshu\exception\ProductException;

class Product extends Base
{
    /**
     * 获取产品
     * @url api/:ver/product/:pid
     * @http GET
     * @return product
     * @throws ProductException
     */
    public function getOne($id)
    {
        (new IdValidate())->checkValidate();

        $data = ProductModel::instance()->getOne($id);

        if (! $data) {
            throw new ProductException();
        }

        return json($data);
    }

    /**
     * 添加产品
     * @url api/:ver/product
     * @http POST
     * @return JSON data
     * @throws ProductException
     */
    public function create($id)
    {
        $data = ProductModel::instance()->getOne($id);

        if (! $data) {
            throw new ProductException();
        }

        return json($data);
    }
}