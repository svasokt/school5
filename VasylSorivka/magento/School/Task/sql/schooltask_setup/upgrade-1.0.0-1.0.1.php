<?php
$installer = $this;

$installer->startSetup();

$installer->getConnection()

    ->addColumn($installer->getTable('sales/order'),'base_cashback_discount_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'length' => '12,4',
        'nullable' => true,
        'comment' => 'Cashback Discount Tax Amount'
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/order'),'cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'base_cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote_address'),'base_cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote_address'),'cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/invoice'),'cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/invoice'),'base_cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/creditmemo'),'cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Cashback Discount Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/creditmemo'),'base_cashback_discount_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Cashback Discount Amount'
));

$installer->endSetup();

