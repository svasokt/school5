<?php

$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('first/blogvovk'))
    ->addColumn('blogvovk_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Blogvovk ID')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Blogvovk Title')
    ->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ), 'Blogvovk Body')
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
    ), 'Blogvovk Date')
    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Timestamp')
    ->addForeignKey($this->getFkName('first/blogvovk', 'blogvovk_id', 'weblog/blogpost', 'blogpost_id'),
        'blogvovk_id', $this->getTable('weblog/blogpost'), 'blogpost_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
    ->setComment('Training first/blogvovk entity table');
$installer->getConnection()->createTable($table);

$installer->endSetup();