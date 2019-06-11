<?php

$installer = $this;

$installer->startSetup();


$table = $installer->getConnection()

     ->newTable($installer->getTable('grid/posts'))

    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Id')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ), 'Items')
    ->addColumn('short_description', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
        'nullable'  => true,
    ), 'Short Description')
    ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => true,
    ), 'Description');

$installer->getConnection()->createTable($table);
die('test');

$installer->endSetup();