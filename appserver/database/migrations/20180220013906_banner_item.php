<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class BannerItem extends Migrator
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('banner_item',array('engine'=>'Innodb'));
        $table->addColumn('banner_id', 'integer', array('limit'=>MysqlAdapter::INT_REGULAR, 'signed'=>false, 'comment'=>'外键，关联banner表'))
              ->addColumn('img_id', 'integer', array('signed'=>false, 'comment'=>'外键，关联image表'))
              ->addColumn('keyword', 'integer',array('limit' => MysqlAdapter::INT_REGULAR,'signed'=>false,'comment'=>'执行关键字，根据不同的type含义不同(商品id号、专题号等）'))
              ->addColumn('type', 'integer',array('limit' => MysqlAdapter::INT_TINY,'signed'=>false, 'comment'=>'跳转类型，可能导向商品，可能导向专题，可能导向其他。0，无导向；1：导向商品;2:导向专题'))
              ->addColumn('status', 'integer',array('limit' => MysqlAdapter::INT_TINY,'default'=>1,'comment'=>'状态-1表示删除，1表示正常 0表示隐藏'))
              ->addColumn('create_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'创建时间'))
              ->addColumn('update_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'修改时间'))
              ->create();
    }
}
