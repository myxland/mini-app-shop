<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:09
 * description:
 */

namespace app\api\controller\v1;

use app\common\model\Product as ProductModel;
use app\api\controller\Base;
use app\common\validate\CountValidate;
use app\common\validate\IdValidate;
use app\library\exception\ProductException;

class Product extends Base
{
    /**
     * 获取最近新品
     * @url api/:ver/product/latest
     * @http GET
     * @param $count 限制次数
     * @return product
     * @throws ProductException
     */
    public function getLatest($count)
    {
        (new CountValidate())->checkValidate();

        $products = ProductModel::instance()->getLastest($count);

        if (! $products) {
            throw new ProductException();
        }

        return api_json($products);
    }
    
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

        return api_json($data);
    }

    /**
     * 获取分类下的产品
     * @url api/:version/product/by_category
     * @http GET
     * @return JSON data  array of products
     * @throws MissException
     */
    public function getAllByCategoryId($id)
    {
        (new IdValidate())->checkValidate();

        $products = ProductModel::instance()->getAllByCategoryId($id);

        if (! $products) {
            throw new ProductException();
        }

        $products = $products->hidden(['summary']);
        return api_json($products);
    }
}