<?php

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('sales/order'),'base_insurancetax_tax_amount', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
        'length' => '12,4',
        'nullable' => true,
        'comment' => 'Base Insurancetax Tax Amount'
    ));
$installer->getConnection()->addColumn($installer->getTable('sales/order'),'insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'base_insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/quote'),'insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/invoice'),'insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/invoice'),'base_insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/creditmemo'),'insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Insurancetax Tax Amount'
));
$installer->getConnection()->addColumn($installer->getTable('sales/creditmemo'),'base_insurancetax_tax_amount', array(
    'type'      => Varien_Db_Ddl_Table::TYPE_DECIMAL,
    'length' => '12,4',
    'nullable' => true,
    'comment' => 'Base Insurancetax Tax Amount'
));

$installer->endSetup();
