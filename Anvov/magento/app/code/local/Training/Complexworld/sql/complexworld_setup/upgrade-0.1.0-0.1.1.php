<?php

$installer = $this;
$installer->startSetup();
$installer->getConnection()
    ->addForeignKey(
        $this->getFkName('complexworld/iphonepost', 'entity_id', 'weblog/blogpost', 'blogpost_id'),
        'entity_id',
        $this->getTable('weblog/blogpost'), 'blogpost_id',
        Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
$installer->endSetup();
