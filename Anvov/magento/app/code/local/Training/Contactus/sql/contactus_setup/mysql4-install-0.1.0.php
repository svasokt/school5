<?php
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()->newTable($installer->getTable('contactus/contactus'))
    ->addColumn('contactus_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ), 'Contactus ID')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Client Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => true,
    ), 'Client email')
    ->addColumn('telephone', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    ), 'Client Phone')
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    ), 'Client Comment')
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
    ), 'Admin answer')
    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
    ), 'Timestamp')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
    ), 'Timestamp')

    ->setComment('Training contactus/contactus table');
$installer->getConnection()->createTable($table);

$installer->endSetup();