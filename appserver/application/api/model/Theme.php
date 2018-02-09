<?php
/**
 * author: yunshu
 * createTime: 18/2/9 16:38
 * description:
 */

namespace app\api\model;


class Theme extends Base
{
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

    public function getListByIds($idArray)
    {
        return self::with(['topicImage', 'headImage'])->where('')->select($idArray);
    }
}