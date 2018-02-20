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
     *
        如果你的迁移脚本只会有一下操作
        createTable（创建表）
        renameTable（重命名表）
        addColumn（添加字段）
        renameColumn（重命名字段）
        addIndex（添加索引）
        addForeignKey（添加外键）
        那么你只需要change方法就可以了，回滚的时候可以自动根据change里的操作来逆向操作，否则需要定义up和down两个方法，来标识迁移和回滚两个具体操作
        定义了up和down方法后就不要再定义change方法了；
        在change方法里操作数据表的时候，只能用create()或者是update()来完成；
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
}
