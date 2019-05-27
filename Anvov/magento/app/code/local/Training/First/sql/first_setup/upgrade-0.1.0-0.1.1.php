<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->changeColumn($installer->getTable('first/blogvovk'), 'content', 'information', array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => false,
            'comment' => 'Blogvovk Body'
        )
    );
$installer->endSetup();
