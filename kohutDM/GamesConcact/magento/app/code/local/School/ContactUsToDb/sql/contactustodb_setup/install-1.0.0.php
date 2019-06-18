<?php
/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */
$installer = $this;
$tablePosts = $installer->getTable('contactustodb/customerposts');

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($tablePosts)
    ->addColumn('post_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('telephone', Varien_Db_Ddl_Table::TYPE_TEXT, null)
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('answer_status', Varien_Db_Ddl_Table::TYPE_TEXT, '10', array(
        'nullable'  => false,
        'default' => 'no'
    ))
    ->addColumn('answer', Varien_Db_Ddl_Table::TYPE_TEXT, null);

$installer->getConnection()->createTable($table);

$installer->endSetup();