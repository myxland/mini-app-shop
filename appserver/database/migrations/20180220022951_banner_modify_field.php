<?php

use think\migration\Migrator;
use think\migration\db\Column;
use Phinx\Db\Adapter\MysqlAdapter;

class BannerModifyField extends Migrator
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
    public function up()
    {
        $table = $this->table('banner',array('engine'=>'Innodb'));
        $table->changeColumn('create_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'signed'=>false, 'comment'=>'创建时间'))
              ->changeColumn('update_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'signed'=>false, 'comment'=>'修改时间'))
              ->update();
    }

    //todo:   这里不能执行rollback,不知道为啥?
    public function down()
    {
        $table = $this->table('banner',array('engine'=>'Innodb'));
        $table->changeColumn('create_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'创建时间'))
              ->changeColumn('update_time', 'integer',array('limit' => MysqlAdapter::INT_REGULAR, 'comment'=>'修改时间'))
              ->update();
    }
}
