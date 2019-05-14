<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addColumn($installer->getTable('weblog/blogpost'),'custom_value', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Title'
    ));
$installer->endSetup();
