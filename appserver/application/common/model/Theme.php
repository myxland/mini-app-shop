<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\common\model;

use app\library\exception\ProductException;
use app\library\exception\ThemeException;

class Theme extends Base
{
    protected $hidden = ['delete_time', 'update_time', 'topic_img_id', 'head_img_id'];

    public static function instance($class = __CLASS__)
    {
        return parent::instance($class);
    }

    public function topicImage()
    {
        return $this->belongsTo('Image', 'topic_img_id', 'id');   //在Image表里写$this->hasOne()
    }

    public function headImage()
    {
        return $this->belongsTo('Image', 'head_img_id', 'id');
    }

    //定义多对多关系
    public function products()
    {
        return $this->belongsToMany('Product', 'theme_product', 'product_id', 'theme_id');
    }

    public function getListByIds($idArray)
    {
        return self::with(['topicImage', 'headImage'])->select($idArray);
    }

    public function getThemeProducts($id)
    {
        return self::with(['products', 'headImage', 'topicImage'])->where('id', $id)->select();
    }

    //向关联表"theme_product"插入数据
    public function addThemeProduct($tid, $pid)
    {
        $model = $this->checkRelationExist($tid, $pid);

        $theme_product = self::table('theme_product')->where('theme_id', $tid)
                                    ->where('product_id', $pid)->find();

        if ($theme_product) {
            throw new ThemeException(EC_THEME_PRODUCT_EXIST, get_error_message(EC_THEME_PRODUCT_EXIST), 409);
        }

        $model['theme']->products()->attach($pid);

        return true;
    }

    public function delThemeProduct($tid, $pid)
    {
        $model = $this->checkRelationExist($tid, $pid);

        $theme_product = self::table('theme_product')->where('theme_id', $tid)
                             ->where('product_id', $pid)->find();
        if (! $theme_product) {
            throw new ThemeException(EC_THEME_PRODUCT_NOT_FOUND, get_error_message(EC_THEME_PRODUCT_NOT_FOUND), 404);
        }

        $model['theme']->products()->detach($pid);

        return true;
    }

    public function checkRelationExist($tid, $pid)
    {
        $theme = self::get($tid);
        if (! $theme) {
            throw new ThemeException();
        }
        $product = self::get($pid);
        if (! $theme) {
            throw new ProductException();
        }

        return [
            'theme' =>  $theme,
            'product'   =>  $product
        ];
    }
}