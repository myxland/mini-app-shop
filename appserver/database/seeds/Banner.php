<?php

use think\migration\Seeder;

class Banner extends Seeder
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'position'    => 'index_top',
                'description' => '首页轮播图',
                'status'      => 1,
                'create_time' => time(),
                'update_time' => time(),
            ],
        ];
        $banner = $this->table('banner');
        $banner->insert($data)->save();
    }
}