<?php
/**
 * author: yunshu
 * createTime: 18/2/10 12:45
 * description:
 */

namespace app\api\model;


class ProductProperty extends Base
{
    protected $hidden = ['id', 'delete_time', 'update_time', 'product_id'];
}