<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class Banner extends Migrator
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
        // create the table
        $table = $this->table('banner',array('engine'=>'Innodb'));
        $table->addColumn('position', 'string',array('limit' => 50,'default'=>'','comment'=>'Banner名称，通常作为标识'))
              ->addColumn('description', 'string',array('limit' => 255,'comment'=>'Banner描述'))
              ->addColumn('status', 'integer',array('limit' => MysqlAdapter::INT_TINY,'default'=>1,'comment'=>'状态-1表示删除，1表示正常 0表示隐藏'))
              ->addColumn('create_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'创建时间'))
              ->addColumn('update_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'修改时间'))
              ->addIndex(array('position'), array('unique' => true))
              ->create();
    }

    public function up()
    {
    }

    public function down()
    {

    }
}
