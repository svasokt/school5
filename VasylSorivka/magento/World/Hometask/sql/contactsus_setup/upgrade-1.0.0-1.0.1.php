<?php
/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */

$installer = $this;

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('hometask/contactsus'), 'status', array(
        'nullable'  => true,
        'length' => 255,
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'comment' => 'status'
    ));

$installer->endSetup();

