<?php
/**
 * author: yunshu
 * createTime: 18/2/14 09:06
 * description:
 */

namespace app\api\controller\v1;

use app\api\controller\Base;
use app\common\model\Category as CategoryModel;
use app\common\validate\IdValidate;
use app\library\exception\CategoryNotFoundException;
use app\library\exception\MissException;

class Category extends Base
{
    /**
     * 查询分类
     * @url api/:version/category
     * @http GET
     * @return JSON data  array of category
     * @throws CategoryNotFoundException
     */
    public function getCategories()
    {
        $categories = CategoryModel::all([], 'img');

        if (! $categories) {
            throw new CategoryNotFoundException();
        }

        return api_json($categories);
    }

    /**
     * 获取分类下的产品
     * @url api/:version/category/:id/products
     * @http GET
     * @return JSON data  array of products
     * @throws MissException
     */
    public function getProductsByCategoryId($id)
    {
        (new IdValidate())->checkValidate();

        $products = CategoryModel::instance()->getProductsByCategoryId($id);

        if (! $products) {
            throw new MissException(EC_CATEGORY_PRODUCT_NOT_FOUND);
        }

        return api_json($products);
    }


}